<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SantriService;
class SantriController extends Controller
{
    
    protected $santriService;

    public function __construct(SantriService $santriService)
    {
        $this->santriService = $santriService;
    }
    public function index()
    {
        $santris = $this->santriService->getPaginate(10);
        return view('santri.index', ['santris'=>$santris]);
    }

    public function create()
    {
        return view('santri.add');
    }

    public function store(Request $request)
    {
        $this->santriService->store($request);
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
