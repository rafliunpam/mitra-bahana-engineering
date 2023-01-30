<?php

namespace App\Http\Controllers;
use App\Models\Proyek;
use App\Models\Client;
use App\Models\User;
use App\Models\Tiket;
use Illuminate\Http\Request;
use DB;

class AdminTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('dashboard.tikets.index',[
            'tikets' => Tiket::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $it = DB::table('tikets')->select(DB::raw('MAX(RIGHT(id,3)) as id'));
        $nk="";

// it = id tiket
// iu = id user
// ip = id proyek

        if($it->count()>0)
        {
            foreach($it->get()as $k)
            {
                $tmp = ((int)$k->id)+1;
                $nk = sprintf("%03s", $tmp);
            }
        }
        else{
            $nk = "001";
        }

        return view ('dashboard.tikets.create',[
            'nk' => $nk,
            'tikets' => Tiket::all(),
            'proyeks' => Proyek::all(),
            'clients' => Proyek::all(),
            'users' => Proyek::all(),
            
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
        $validateDataTiket = $request->validate([

      
        ]);
        $validateDataTahapan = $request->validate([
            'proyek_id' => 'required|unique:proyeks',
            'tiket_id' => 'required',
            'proses' => 'required',
            'status' => 'nullable',
            'file' => 'nullable|mimes:pdf|max:2048',
            'created_at' => 'nullable'
      
        ]);

        $validateDataTiket['proyek_id'] = proyek()->id;
        $validateDataTiket['client_id'] = proyek()->id;
        $validateDataTiket['user_id'] = proyek()->id;
        $validateDataTiket['tahapan_id'] = tahapan()->id;

        $validateDataTahapan['proyek_id'] = proyek()->id;
        $validateDataTahapan['tiket_id'] = tiket()->id;


        Tiket::create($validateDataTiket);
        Tahapan::create($validateDataTahapan);
        return redirect('/dashboard/proyeks')->with ('success', 'Berhasil Membuat Category!');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function show(Tiket $tiket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function edit(Tiket $tiket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tiket $tiket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tiket $tiket)
    {
        //
    }


}
