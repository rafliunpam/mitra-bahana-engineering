<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUSerController extends Controller
{
    public function index()
    {
        return view('dashboard.users.index', [
            'users' => User::all(),           
            'employess' => Employee::where('user_id' == 0),
        ]);
    }


    public function status(User $user)
    {
        if($user->status == '0'){
            User::where('id', $user->id)
                ->update([
                    'status' => '1'
                ]);
                return redirect('/dashboard/users')->with ('success', 'Berhasil Mengaktifkan User');
            }
        elseif($user->status == '1'){
            User::where('id', $user->id)
                ->update([
                    'status' => '0'
                ]);
                return redirect('/dashboard/users')->with ('danger', 'Berhasil Menonaktifkan User!');
            }
    }

    Public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user' => $user,
        ]);
    }

    Public function update(Request $request, User $user)
    {
        $rules = [
            'level_user' => 'required',
        ];

        $validateData = $request->validate($rules);
        User::where('id', $user->id)
                ->update($validateData);
        return redirect('/dashboard/users')->with ('success', 'Berhasil Mengupdate Data User!');
    }

    Public function reset_password(Request $request, User $user)
    {
        $tgl_lahir = $user->employee->tanggal_lahir;
        $time = strtotime($tgl_lahir);
        $newformat = date('dmy',$time);

        $tl = ((int)$newformat);
        $format = ['mbe#'.$newformat];
        
        $ps = implode("",$format);
        $pass = ($ps);
        //mbe#011065
        
        $validateData['password'] = Hash::make($pass);
        User::where('id', $user->id)
                ->update($validateData);
        return redirect('/dashboard/users')->with ('success', 'Berhasil Mereset Password! password default adalah mbe#tanggal_lahir contoh : (mbe#140899)');
    }

    Public function password()
    {
        return view('dashboard.users.password', [
        ]);
    }

    public function authenticate(Request $request)
    {
        $user_id = Auth::user()->id;
        $creadentials = $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required',
        ]);

        $password_lama = $request->password_lama;

        if(Hash::check($password_lama, Auth::user()->password))
        {
            $validateData['password'] = Hash::make($request->password_baru);
            User::where('id', Auth::user()->id)
                ->update($validateData);
            return back()->with('success', 'Password Berhasil Diganti!');
        }
        else {
            return back()->with('danger', 'Password Lama Salah!');
        }
    }
}
