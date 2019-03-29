<?php

namespace App\Http\Controllers;
use App\Services\UjianService;
use App\Services\SantriService;
use App\Services\MateriService;
use App\Ujian;
use Illuminate\Http\Request;

class UjianController extends Controller
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
    public function index()
    {
        $daftar_ujian = Ujian::where('id', '>' ,0 )
                                ->orderBy('created_at','desc')
                                ->paginate(5);
        return view('ujian.index',compact('daftar_ujian'));
    }

    public function create()
    {
        return view('ujian.add');
    }

    public function store(Request $request)
    {
        $newUjian = $this->ujianService->store($request);
        if($newUjian){
            return redirect()->route('ujian.index')->with('status','data berhasil ditambahkan');
        }
    }
    public function show($id)
    {
        $ujian = $this->ujianService->showDetail($id);
        return view('ujian.show',compact('ujian'));
    }
    public function edit($id)
    {
        $ujian = $this->ujianService->edit($id);
        return view('ujian.edit',compact('ujian'));
    }
    public function update(Request $request, $id)
    {
        $ujianUpdated = $this->ujianService->update($request, $id);
        if($ujianUpdated){
            return redirect()->route('ujian.index')->with('status','data berhasil diperbaharui');
        }
    }
    public function destroy($id)
    {
        $ujian = $this->ujianService->delete($id);
        if($ujian){
            return redirect()->route('ujian.index')->with('status','data berhasil dihapus');
        }
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
        // $ujian = $this->ujianService->showDetail($ujian_id);
        $daftar_santri =  $this->santriService->getAll();
        return view('ustadz.daftar-santri',compact('daftar_santri','ujian_id'));
    }

    public function getSelectedSantri(Request $request)
    {
        // $ujian = $this->ujianService->showDetail($request->ujian_id);
        $santri = $this->santriService->showDetail($request->santri_id);
        return  $this->materiService->getMateriUjianByKelas($santri->kelas_id);
    }
    
    public function storeNilaiTes()
    {

    }

}
