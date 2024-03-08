<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function index()
    {
        // var_dump(auth()->user()->nama);
        $data['user'] = DB::table('users')->join('roles', 'users.role', '=', 'roles.id')->get();
        return view('user/index', $data);
    }

    function create()
    {
        $data['role'] = DB::table('roles')->get();
        return view('user/create', $data);
    }

    function store(Request $request)
    {
        User::create([
            'nama' => $request->nama_user,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);
        return redirect()->route('user.index');
    }

    function regis(Request $request)
    {
        User::create([
            'nama' => $request->nama_user,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 2
        ]);
        return redirect()->route('login');
    }

    function edit($id)
    {
        $user = new User();
        $data['role'] = DB::table('roles')->get();
        $data['user'] = $user->find(['id' => $id])->first();
        return view('user/create', $data);
    }

    function update(Request $request)
    {
        if ($request->password == NULL) {
            $data = [
                'nama' => $request->nama_user,
                'email' => $request->email,
                'role' => $request->role,
                'updated_at' => now(),
            ];
        } else {
            $data = [
                'nama' => $request->nama_user,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
                'updated_at' => now(),
            ];
        }

        DB::table('users')->where(['id' => $request->id])->update($data);
        return redirect()->route('user.index');
    }

    function destroy($id)
    {
        DB::table('users')->where(['id' => $id])->delete();
        return redirect()->route('user.index');
    }
}
