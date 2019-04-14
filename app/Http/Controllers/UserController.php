<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\User;
use Illuminate\Support\Facades\Gate;
class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
        $this->middleware(function($request, $next){
            if(Gate::allows('manage-data-master')) return $next($request);  
            abort(403, 'Anda tidak memiliki cukup hak akses');});
    }
    public function index()
    {
        $daftar_user = User::where('id', '>' ,0 )
                        ->orderBy('name','asc')
                        ->paginate(5);
        return view('user.index', compact('daftar_user'));
    }

    public function create()
    {
        return view('user.add');
    }

    public function store(Request $request)
    {
        $newUser = $this->userService->store($request);
        if($newUser){
            return redirect()->route('user.index')->with('status','data berhasil ditambahkan');
        }
    }

    public function show($id)
    {
        $user = $this->userService->showDetail($id);
        return view('santri.show',compact('user'));
    }

    public function edit($id)
    {
        $user = $this->userService->edit($id);
        return view('user.edit',compact('user'));
    }
    public function update(Request $request, $id)
    {
        $userUpdated = $this->userService->update($request, $id);
        if($userUpdated){
            return redirect()->route('user.index')->with('status','data berhasil diperbaharui');
        }
    }

    public function destroy($id)
    {
        $user = $this->userService->delete($id);
        if($user){
            return redirect()->route('user.index')->with('status','data berhasil dihapus');
        }
    }
}
