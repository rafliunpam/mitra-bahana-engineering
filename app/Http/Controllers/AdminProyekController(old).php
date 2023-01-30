<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Client;
use App\Models\Donesale;
use App\Models\Doneproyek;
use App\Models\User;
use App\Models\Status;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use DB;

class AdminProyekController extends Controller
{
    public function req()
    {
        return view ('dashboard.proyeks.request',[
            'proyeks' => Proyek::all(),
            'donesales' => Donesale::all()
            
        ]);
    }

    // public function process(Donesale $donesale)
    // {
    //     // return $donesale;

    //     $validateData ['donesale_id'] = $donesale->id;
    //     Proyek::create($validateData);

    //     if($donesale->status == '0'){
    //         donesale::where('id', $donesale->id)
    //             ->update([
    //                 'status' => '1'
    //             ]);
    //         }

    //     return redirect('/dashboard/proyekReq')->with ('success', 'Berhasil Memproses Tiket!');

    // }

    public function create()
    {

        $q = DB::table('proyeks')->select(DB::raw('MAX(RIGHT(id,3)) as id'));
        $d = DB::table('proyeks')->select(DB::raw('id'));
        $kp="";


        if($q->count()>0)
        {
            foreach($q->get()as $k)
            {
                $tmp = ((int)$k->id)+1;
                $kp = sprintf("%03s", $tmp);
            }
        }
        else{
            $kp = "001";
        }
        
        if($d->count()>0)
        {
            foreach ($d->get() as $i)
            {
                $id = ((int)$i->id)+1;
            }
        }
        else{
            $id ="1";
        }

        return view('dashboard.proyeks.create',[
            'kp' => $kp,
            'id' => $id,
            'donesale' => Donesale::all(),
            'users' => User::all(),
        ]);
    }
    
    public function store(Request $request, Donesale $donesale)
    {
        //Create Status Proyek
        $request->validate([
            'proyek_id' => 'required',
            'addMoreInputFields.*.tahapan' => 'required',
            'addMoreInputFields.*.keterangan' => 'required'
        ]);
        foreach ($request->addMoreInputFields as $key => $value)
        {
        $value ['proyek_id'] = $request->proyek_id;
        Status::create($value);
        }
        //END Status Proyek

        //Update Donesale Status
        donesale::where('id', $request->donesale_id)
        ->update([
            'status' => '1'
        ]);
        //End Donesale

        //Create Proyek
        $validateData = $request->validate([
            'no_tiket_proyek' => 'required',
            'title' => 'required|max:50',
            'user_id' => 'required',
            'donesale_id' => 'required',
        ]);

        if($request->file('file')){
            $validateData['file'] = $request->file('file')->store('SPK-files');
        }
        Proyek::create($validateData);
        return redirect('/dashboard/proyekReq')->with ('success', 'Berhasil Membuat Tiket Proyek');
        //END Proyek
    }

    public function index()
    {
        return view('dashboard.proyeks.index', [
            'proyeks' => Proyek::all(),
        ]);
    }

    public function show(Proyek $proyek)
    {
  
        return view ('dashboard.proyeks.show', [
            'proyek' => $proyek,
            'statuses' => Status::all()
        ]);
    }

    public function edit(Proyek $proyek)
    {
        return view ('dashboard.proyeks.edit', [
            'proyek' => $proyek,
            'statuses' => Status::all()
        ]);
    }


    public function status(Proyek $proyek)
    {
        if($proyek->status == 'Unprocessed'){
            Proyek::where('id', $proyek->id)
                ->update([
                    'status' => 'Process'
                ]);
            }
        elseif($proyek->status == 'Process'){
            Proyek::where('id', $proyek->id)
                ->update([
                    'status' => 'Success'
                ]);
            }
        elseif($proyek->status == 'Success'){
            Proyek::where('id', $proyek->id)
                ->update([
                    'keterangan' => 'Done'
                ]);
            return redirect('/dashboard/proyeks')->with ('Success', 'Tiket Dilesaikan, menunggu konfirmasi dari manajer');
            }
        return redirect('/dashboard/proyeks')->with ('Success', 'Berhasil Konfirmasi Tikes Sales');
    }

    public function acc()
    {
        
        return view ('dashboard.proyeks.konfirmasi',[
            'statuses' => Status::all(),
            'proyeks' => Proyek::all(),  
        ]);   

        // if(auth()->guest() || auth()->user()->status_user !== 'tim_proyek'){
        //     return view ('dashboard.proyeks.konfirmasi',[
        //         'clients' => Client::all(),
        //         'users' => User::all(),
        //         'proyeks' => Proyek::all(),
        //         'doneproyeks' => DoneProyek::all(),    
        //     ]);
        // }

        // else{
        //     return view ('dashboard.proyeks.konfirmasi',[
        //         'clients' => Client::all(),
        //         'users' => User::all(),
        //         'proyeks' => Proyek::where('user_id', auth()->user()->id)->get(),
        //         'doneproyeks' => DoneProyek::all(),       
        //     ]);
        // }
    }

    public function doneproyek(Proyek $proyek)
    {
        
        if($proyek->status == 'Success'){
            Proyek::where('id', $proyek->id)
                ->update([
                    'status' => 'Done'
                ]);
            }
        else{
            
        }
        
        $validateDataDone ['proyek_id'] = $proyek->id;

        Doneproyek::create($validateDataDone);
        return redirect('/dashboard/proyekAcc')->with ('Success', 'Berhasil Menyelesaikan Tiket Proyek');
    }

    public function priview(Proyek $proyek)
    {
        return view ('dashboard.proyeks.priview', [
            'proyek' => $proyek,
            'statuses' => Status::all()
        ]);
    }

    public function laporan()
    {
        return view ('dashboard.proyeks.laporan',[
            'doneproyeks' => Doneproyek::all()
        ]);
    }
}
