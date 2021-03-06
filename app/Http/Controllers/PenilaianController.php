<?php

namespace App\Http\Controllers;
use App\Services\UjianService;
use App\Services\SantriService;
use App\Services\MateriService;
use App\Ujian;
use App\Tes;
use App\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;


class PenilaianController extends Controller
{
    protected $ujianService, $santriService, $materiService;
    public function __construct(UjianService $ujianService,
                                SantriService $santriService,
                                MateriService $materiService)
    {
        $this->ujianService = $ujianService;
        $this->santriService = $santriService;
        $this->materiService = $materiService;
        
    }

     //  user = ustadz/ah

    // menampilkan daftar ujian
    public function getUjian()
    {
        $daftar_ujian = $this->ujianService->getAll();
        return view('ustadz.daftar-ujian',compact('daftar_ujian'));
    }

    // menampilkan daftar santri
    public function getAllSantri(Request $request)
    {
        $ujian_id = $request->get('ujian_id');
        $daftar_santri =  $this->santriService->getAllSantriAktif();
        return view('ustadz.daftar-santri',compact('daftar_santri','ujian_id'));
    }

    // menampilkan halaman santri + daftar materi yang akan diujikan
    public function getSelectedSantri(Request $request)
    {
        $ujian = $this->ujianService->showDetail($request->ujian_id);
        $santri = $this->santriService->showDetail($request->santri_id);
        $daftar_materi = $ujian->materis;
        $materi_sudah_dites = Tes::with('materi')->where('santri_id',$santri->id)->get();
        return view('ustadz.penilaian',compact('daftar_materi','santri','ujian','materi_sudah_dites'));
    }
    
    public function storeNilaiTes(Request $request)
    {
        // todondan nama penguji
        try {
            $penilaian = Tes::where('santri_id',$request->santri_id)
                            ->where('materi_id',$request->materi_id)
                            ->where('ujian_id',$request->ujian_id)->firstOrFail();
            $penilaian->nilai = $request->nilai;
            $penilaian->deskripsi = $request->deskripsi;
            $penilaian->penguji = 'Ustadz' . Auth::user()->name;
            $penilaian->save();

        } catch (\Throwable $th) {
            $penilaian = Tes::create([
                'santri_id'=> $request->santri_id,
                'materi_id'=> $request->materi_id,
                'ujian_id'=> $request->ujian_id,
                'nilai'=> $request->nilai,
                'deskripsi'=> $request->deskripsi,
                'penguji'=> 'Ustadz' . Auth::user()->name
            ]);
        }
        return redirect()->route('ustadz')->with('status','Nilai berhasil disimpan');
        
    }

    public function hasilUjianPerMateri(Request $request)
    {
        $hasil = Materi::with('santri_sudah_ujian')->where('id',$request->materi)->first();
        return view('ujian.hasil-per-materi',compact('hasil'));
    }

    public function cetak_raport(){
        $ujian = Ujian::find(1);
        $santris = $ujian->peserta_ujian;
        // return $santris;
        $results = DB::table('santris')
                ->join('tes',       'santris.id','=','tes.santri_id')
                ->join('materis',   'materis.id','=','tes.materi_id')
                ->join('kelas',     'kelas.id','=','santris.kelas_id')
                ->select('santris.id','materis.judul','materis.parameter_kelulusan','tes.nilai','tes.deskripsi','tes.penguji')
                ->where('tes.ujian_id','=','1')
                ->orderBy('santris.id','asc')
                ->distinct()
                ->get();
        return view('ujian.cetak-raport',compact('santris','results'));
    }
    //
}
