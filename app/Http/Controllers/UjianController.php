<?php

namespace App\Http\Controllers;
use App\Services\UjianService;
use App\Ujian;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    protected $ujianService;
    public function __construct(UjianService $ujianService)
    {
        $this->ujianService = $ujianService;
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
        //
    }
}
