<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Client;
use App\Models\Donesale;
use App\Models\User;
use App\Models\Status;
use Illuminate\Http\Request;
use DB;


class AdminProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.proyeks.index', [
            'proyeks' => Proyek::all(),
            'donesales' => Donesale::all(),
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Donesale $donesale)
    {
        return $donesale;
        // $q = DB::table('proyeks')->select(DB::raw('MAX(RIGHT(id,3)) as id'));
        // $kp="";


        // if($q->count()>0)
        // {
        //     foreach($q->get()as $k)
        //     {
        //         $tmp = ((int)$k->id)+1;
        //         $kp = sprintf("%03s", $tmp);
        //     }
        // }
        // else{
        //     $kp = "001";
        // }

        // return view('dashboard.proyeks.create',[
        //     'kp' => $kp,
        //     'proyek' => Proyek::all(),
        //     'clients' => Client::all(),
        //     'users' => User::all(),
        //     'donesales' => Donesale::all(),
        //     'donesale' => $donesale
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);
        
        $validateData = $request->validate([
            'no_tiket_proyek' => 'required|unique:proyeks',
            'donesale_id' => 'required|unique:proyeks',
            'title' => 'nullable',
            'user_id' => 'nullable',
            'status_id' => 'nullable',
            'created_at' => 'nullable',
            'updated_at' => 'nullable',
            'file' => 'nullable|mimes:pdf|max:2048'
            
            
        ]);
        


        if($request->file('file')){
            $validateData['file'] = $request->file('file')->store('SPK-files');
        }
        Proyek::create($validateData);
        return redirect('/dashboard/proyeks')->with ('success', 'Berhasil Membuat Category!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function show(Donesale $donesale)
    {
        return $donesale;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function edit(Donesale $donesale, Proyek $proyek)
    {
        return '$donesale';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyek $proyek)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyek $proyek)
    {
        Proyek::destroy($proyek->id);
        return redirect('/dashboard/proyeks')->with ('success', 'Berhasil Menghapus Tiket');
    }

    public function req()
    {
        return view ('dashboard.proyeks.request',[
            'donesales' => Donesale::all()
        ]);
    }
}
