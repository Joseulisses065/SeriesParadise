<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use LDAP\Result;
use PhpParser\Node\Stmt\TryCatch;

use function Laravel\Prompts\password;

class UserController extends Controller
{
public function index(){
    $msg = session('msg');
    return view('user.index')->with('msg',$msg);
}



public function edit(){
  return view('user.edit');
}


public function store(UserRequest $request){
    $password =$request->all()['password'];
    $request->all()['password'] = password_hash($password,PASSWORD_BCRYPT);
    try {
        User::create($request->all());
        return to_route('user.index')->with('msg','Usuario criado com sucesso');
    } catch (\Throwable $th) {
        return to_route('user.edit')->withErrors(['error'=>'Usuario ou senha invalidos']);
    }

}


public function show(UserRequest $request){
$credentials = $request->only('email','password');
    $loged = Auth::attempt($credentials);
    if($loged){
        return to_route('midias.create',auth()->user()->id)->with('msg','Login efetuado com sucesso');

    }else{
        return to_route('user.index')->withErrors(['error'=>'Usuario ou senha incorreto']);
    }

}

public function destroy(){
    Auth::logout();
    return to_route('user.index');
}
}