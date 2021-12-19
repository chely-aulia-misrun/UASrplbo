<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function update(Request $request){
        $data = User::find($request->id);
        $data->password = Hash::make($request->password);
        return response('sukses');
    }
}
