<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use DB;

class AdminClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.clients.index', [
            'clients' => Client::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ci = DB::table('clients')->select(DB::raw('MAX(RIGHT(id,3)) as id'));
        $client_id="";
        
        if($ci->count()>0)
        {
            foreach($ci->get()as $c)
            {
                $tmp = ((int)$c->id)+1;
                $client_id = sprintf("%03s", $tmp);
            }
        }
        else{
            $client_id = "001";
        }

        return view('dashboard.clients.create', [
            'client_id' => $client_id,
            'clients' => Client::all()
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
        $validateData = $request->validate([
            'kode_client' => 'required|unique:clients',
            'company_name' => 'required|max:255',
            'alamat' => 'required',
            'contact_person' => 'required',
            'jabatan_cp' => 'required',
            'kota' => 'required',
            'no_tlp' => 'required',
        ]);

        Client::create($validateData);
        return redirect('/dashboard/clients')->with ('success', 'Berhasil Menambah Data Client!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('dashboard.clients.show', [
            'client' => $client,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('dashboard.clients.edit', [
            'client' => $client,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $rules = [
            'company_name' => 'required|max:255',
            'alamat' => 'required',
            'contact_person' => 'required',
            'jabatan_cp' => 'required',
            'kota' => 'required',
            'no_tlp' => 'required',
        ];

        $validateData = $request->validate($rules);
        Client::where('id', $client->id)
                ->update($validateData);
        return redirect('/dashboard/clients')->with ('success', 'Berhasil Mengupdate Data Client!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        Client::destroy($client->id);
        return redirect('/dashboard/clients')->with ('success', 'Berhasil Menghapus Client');
    }
}
