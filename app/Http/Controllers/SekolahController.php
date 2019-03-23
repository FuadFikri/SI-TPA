<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SekolahService;
class SekolahController extends Controller
{
    protected $sekolahService;

    public function __construct(SekolahService $sekolahService){
        $this->sekolahService = $sekolahService;
    }

    public function index()
    {
        return $this->sekolahService->getAll();
    }

    public function create()
    {
        return view('sekolah.add');
    }

    public function store(Request $request)
    {
        $sekolah = $this->sekolahService->store($request);
        if ($sekolah) {
            return view('sekolah.index')->with('status', 'data berhasil disimpan');
        }
    }

    public function show($id)
    {
        return view('sekolah.show',compact($this->sekolahService->show($id)));
    }

    public function edit($id)
    {
        return view('sekolah.edit', compact($this->sekolahService->edit($id)));
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
        if ($sekolahUpdated) {
            return redirect()->route('sekolah.index')->with('status','data berhasil dihapus');
        }
    }
}
