<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SekolahService;
use App\Sekolah;
use Illuminate\Support\Facades\Gate;
class SekolahController extends Controller
{
    protected $sekolahService;

    public function __construct(SekolahService $sekolahService){
        $this->sekolahService = $sekolahService;
        $this->middleware(function($request, $next){
            if(Gate::allows('manage-data-master')) return $next($request);  
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

    public function index()
    {
        $daftar_sekolah = Sekolah::where('id', '>' ,0 )
                                ->orderBy('created_at','desc')
                                ->paginate(5);
        return view('sekolah.index', compact('daftar_sekolah'));
    }

    public function create()
    {
        return view('sekolah.add');
    }

    public function store(Request $request)
    {
        $sekolah = $this->sekolahService->store($request);
        if ($sekolah) {
            return redirect()->route('sekolah.index')->with('status', 'data berhasil disimpan');
        }
    }

    public function edit($id)
    {
        $sekolah = $this->sekolahService->edit($id);
        return view('sekolah.edit', compact('sekolah'));
    }

    public function update(Request $request, $id)
    {
        $sekolahUpdated = $this->sekolahService->update($request, $id);
        if ($sekolahUpdated) {
            return redirect()->route('sekolah.index')->with('status','data berhasil diperbaharui');
        }
    }

    public function destroy($id)
    {
        $sekolahDeleted = $this->sekolahService->delete($id);
        if ($sekolahDeleted) {
            return redirect()->route('sekolah.index')->with('status','data berhasil dihapus');
        }
    }
}
