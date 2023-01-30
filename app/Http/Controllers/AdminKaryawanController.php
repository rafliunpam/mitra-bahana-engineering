<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class AdminKaryawanController extends Controller
{
    
    public function index()
    {
        return view('dashboard.karyawan.index', [
            'users' => User::all(),
            'employees' => Employee::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.karyawan.create', [
            'users' => User::all()
        ]);
    }
    
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required',
            'nik' => 'required|unique:users',
            'email' => 'required|unique:users',
            'no_tlp' => 'required',
            'level_user' => 'required',
            'jabatan' => 'required',            
            
        ]);

        $validateData['password'] = bcrypt('123456');
        User::create($validateData);
        return redirect('/dashboard/karyawan')->with ('success', 'Berhasil Membuat User!');
    }

    public function edit(User $user)
    {
        return view('dashboard.karyawan.edit',[
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'nik' => 'required',
            'email' => 'required',
            'no_tlp' => 'required',
            'level_user' => 'required',
            'jabatan' => 'required', 
        ]);
        User::where('id', $user->id)
                ->update($validateData);
        return redirect('/dashboard/karyawan')->with ('success', 'Berhasil Mengupdate Data User!');
    }

    public function status(User $user)
    {
        if($user->status == '0'){
            User::where('id', $user->id)
                ->update([
                    'status' => '1'
                ]);
                return redirect('/dashboard/karyawan')->with ('success', 'Berhasil Mengaktifkan User');
            }
        elseif($user->status == '1'){
            User::where('id', $user->id)
                ->update([
                    'status' => '0'
                ]);
                return redirect('/dashboard/karyawan')->with ('danger', 'Berhasil Menonaktifkan User!');
            }
    }
}
