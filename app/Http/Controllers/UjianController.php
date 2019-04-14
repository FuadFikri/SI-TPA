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
use Illuminate\Support\Facades\Gate;
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
        $this->middleware(function($request, $next){
            if(Gate::allows('manage-data-master')) return $next($request);  
            abort(403, 'Anda tidak memiliki cukup hak akses');});
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

   

}
