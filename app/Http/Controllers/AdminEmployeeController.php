<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.employees.index', [
            'users' => User::all(),
            'employees' => Employee::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ei = DB::table('employees')->select(DB::raw('MAX(RIGHT(id,3)) as id'));
        $employee_id="";
        
        if($ei->count()>0)
        {
            foreach($ei->get()as $c)
            {
                $tmp = ((int)$c->id)+1;
                $employee_id = sprintf("%03s", $tmp);
            }
        }
        else{
            $employee_id = "001";
        }
        return view('dashboard.employees.create', [
            'employees' => Employee::all(),
            'employee_id' => $employee_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ei = DB::table('employees')->select(DB::raw('MAX(RIGHT(id,3)) as id'));
        $employee_id="";
        
        if($ei->count()>0)
        {
            foreach($ei->get()as $c)
            {
                $tmp = ((int)$c->id)+1;
                $employee_id = sprintf("%03s", $tmp);
            }
        }
        else{
            $employee_id = "001";
        }

        //NIK : YM-YT-MT-ID (20221014080001)
        $now =Carbon::now();
        $tm = $now->year . $now->month;

        $tgl_lahir = $request->tanggal_lahir;
        $time = strtotime($tgl_lahir);
        $newformat = date('dm',$time);


        $tl = ((int)$newformat);
        $id = $employee_id;
        
        $format = [$tm.$newformat.$id];
        $nik = implode("",$format);
        
        
        

        // $validateData['name'] = $request->name;
        // $validateData['email'] = $request->email;
        // $validateData['jenis_kelamin'] = $request->jenis_kelamin;
        // $validateData['tempat_lahir'] = $request->tempat_lahir;
        // $validateData['tanggal_lahir'] = $request->tanggal_lahir;
        // $validateData['agama'] = $request->agama;
        // $validateData['no_tlp'] = $request->no_tlp;
        // $validateData['pendidikan'] = $request->pendidikan;
        // $validateData['jabatan'] = $request->jabatan;
        // $validateData['alamat_ktp'] = $request->alamat_ktp;
        // $validateData['alamat_domisili'] = $request->alamat_domisili;
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'no_tlp' => 'required',
            'pendidikan' => 'required',
            'jabatan' => 'required',
            'alamat_ktp' => 'required',
            'alamat_domisili' => 'required',
            'file_pendukung' => 'nullable',
        ]);
        $validateData['nik'] = $nik;
        Employee::create($validateData);
        return redirect('/dashboard/employees')->with ('success', 'Berhasil Membuat Data Karyawan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('dashboard.employees.show', [
            'employee' => $employee,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('dashboard.employees.edit', [
            'employee' => $employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'no_tlp' => 'required',
            'pendidikan' => 'required',
            'jabatan' => 'required',
            'alamat_ktp' => 'required',
            'alamat_domisili' => 'required',
            'file_pendukung' => 'nullable',
        ];

        $validateData = $request->validate($rules);
        Employee::where('id', $employee->id)
                ->update($validateData);
        return redirect('/dashboard/employees')->with ('success', 'Berhasil Mengupdate Data Karyawan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }

    public function create_user(Employee $employee)
    {
        return view('dashboard.users.create', [
            'employee' => $employee,
            'employees' => Employee::all(),  
        ]);
    }
    
    public function store_user(Employee $employee, Request $request)
    {

        $id_tgl = Employee::where('id', $request->employee_id)->get();
        foreach ($id_tgl as $key => $employee) {
            $tgl_lahir = $employee->tanggal_lahir;
            $time = strtotime($tgl_lahir);
            $newformat = date('dmy', $time);
            $tl = ((int)$newformat );
            $format = ['mbe#'.$newformat];
            $ps = implode("",$format);
            $pass= ($ps);
            //mbe$140899

            $validateData['employee_id'] = $employee->id;
            $validateData['nik'] = $employee->nik;
            $validateData['password'] = Hash::make($pass);
            $validateData['level_user'] = $request->level_user;

            if($employee->user == '0'){
                Employee::where('id', $employee->id)
                    ->update([
                        'user' => '1'
                    ]);
                }
            if($employee->user == '1'){
                return redirect('/dashboard/users')->with ('error', 'NIK tersebut sudah terdaftar dalam user !');
            }
    
            User::create($validateData);
            return redirect('/dashboard/users')->with ('success', 'Berhasil Membuat User !');
        }



        // return $id;
        // $tgl_lahir = $employee->tanggal_lahir;
        // $time = strtotime($tgl_lahir);
        // $newformat = date('dmy',$time);

        // $tl = ((int)$newformat);
        // $format = ['mbe#'.$newformat];
        
        // $ps = implode("",$format);
        // $pass = ($ps);
        // //mbe#011065

        // $validateData['employee_id'] = $employee->id;
        // $validateData['nik'] = $employee->nik;
        // $validateData['password'] = Hash::make($pass);
        // $validateData['level_user'] = $request->level_user;

        // if($employee->user == '0'){
        //     Employee::where('id', $employee->id)
        //         ->update([
        //             'user' => '1'
        //         ]);
        //     }
        // if($employee->user == '1'){
        //     return redirect('/dashboard/employees')->with ('error', 'NIK tersebut sudah terdaftar dalam user !');
        // }

        // User::create($validateData);
        // return redirect('/dashboard/employees')->with ('success', 'Berhasil Membuat User !');
    }
}
