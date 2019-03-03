<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SantriService;
use App\Services\SekolahService;
use App\Services\KelasService;
class SantriController extends Controller
{
    
    protected $santriService;
    protected $sekolahService;
    protected $kelasService;

    public function __construct(SantriService $santriService, 
                                SekolahService $sekolahService,
                                KelasService $kelasService )
    {
        $this->santriService = $santriService;
        $this->sekolahService = $sekolahService;
        $this->kelasService = $kelasService;
    }
    public function index()
    {
        $daftar_santri = $this->santriService->getPaginate(10);
        return view('santri.index', compact('daftar_santri'));
    }

    public function create()
    {
        $daftar_sekolah = $this->sekolahService->getAll();
        $daftar_kelas = $this->kelasService->getAll();
        return view('santri.add',compact('daftar_sekolah','daftar_kelas'));
    }

    public function store(Request $request)
    {
        $newSantri = $this->santriService->store($request);
        if($newSantri)echo "success";
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function get_import()
    {
        return view('santri.import');
    }
}
