<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Client;
use App\Models\Donesale;
use App\Models\Doneproyek;
use App\Models\User;
use App\Models\Status;
use App\Models\Billing;
use App\Models\Sale;
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
        $p = Donesale::where('status', '0')->count();
        if(auth()->guest() || auth()->user()->level_user == 'tim_proyek'){
            return view('dashboard.proyeks.index', [
                'p' => $p,
                'proyeks' => Proyek::where('status','!=', 'Solved')->where('user_id', auth()->user()->id)->get(),
                'donesales' => Donesale::all(),
                'statuses' => Status::all(),  
            ]);
        }      

        else{
            return view('dashboard.proyeks.index', [
                'p' => $p,
                'proyeks' => Proyek::where('status','!=', 'Solved')->get(),
                'donesales' => Donesale::all(),
                'statuses' => Status::all(),
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $q = DB::table('proyeks')->select(DB::raw('MAX(id) as id'));

        $id="";


        if($q->count()>0)
        {
            foreach($q->get()as $k)
            {
                $tmp = ((int)$k->id)+1;
                $id = sprintf("%s", $tmp);
            }
        }
        else{
            $id = "1";
        }
        

        return view('dashboard.proyeks.create',[
            'id' => $id,
            'donesales' => Donesale::all(),
            'users' => User::all(),
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
        $q = DB::table('proyeks')->select(DB::raw('MAX(RIGHT(id,3)) as id'));
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

        $ts = $request->donesale_id;
        $idsale = Donesale::where('id', $ts)->get('sale_id');
        $fidsale = preg_replace("/[^0-9]/","",$idsale);
        $get = Sale::where('id', $fidsale)->get('no_tiket_sales');
        $cng = preg_replace("/[^0-9]/","",$get);
        $nts = substr($cng,-3); 

        $now = date('ymdH');
        $format = ['MBE'.$now.$nts.$kp];
        $ntp = implode("",$format);

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

        //Nomor Tiket OTOMATIS
        //MBE2210-261340-002-001 (MBE'my'-'dhs'-"TS"-"ID_TP")
        //NTS : T-m-d-C-cln_id-S-id (P221013C2210006S001)


        $validateData = $request->validate([
            'donesale_id' => 'required',
            'title' => 'required|max:50',
            'user_id' => 'required',

        ]);
        $validateData['no_tiket_proyek'] = $ntp;

        if($request->file('file')){
            $validateData['file'] = $request->file('file')->store('SPK-files');
        }
        Proyek::create($validateData);
        //END Proyek

        //Create Billling
        // $validateBilling = $request->validate([
        //     'proyek_id' => 'required',
        //     'harga' => 'required',
        //     'ppn' => 'required',            
        // ]);
        // $validateBilling['sisa_pembayaran'] = $request->harga;
        // Billing::create($validateBilling);
        //End Billing

        return redirect('/dashboard/proyeks')->with ('success', 'Berhasil Membuat Tiket Proyek');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function show(Proyek $proyek)
    {
        return view ('dashboard.proyeks.show', [
            'proyek' => $proyek,
            'statuses' => Status::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyek $proyek)
    {
        $id_proyek = $proyek->id;
        $id_user = auth()->user()->id;

        if($proyek->user_id == $id_user){
            return view ('dashboard.proyeks.edit',[
                'id_user' => $id_user,
                'proyek' => $proyek,
                'statuses' =>$status = Status::where('proyek_id', $id_proyek)->get(),  
            ]);
        }

        elseif(auth()->guest() || auth()->user()->level_user !== 'tim_proyek'){
            return view ('dashboard.proyeks.edit',[
                'id_user' => $id_user,
                'proyek' => $proyek,
                'statuses' =>$status = Status::where('proyek_id', $id_proyek)->get(),  
            ]);
        }

        elseif(abort(403));
        
        
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
        //
    }

    public function req()
    {
        return view ('dashboard.proyeks.request',[
            'proyeks' => Proyek::all(),
            'donesales' => Donesale::all()
            
        ]);
    }

    public function status(Proyek $proyek)
    {
        $ntp = $proyek->no_tiket_proyek;
        if($proyek->status == 'Unprocessed'){
            Proyek::where('id', $proyek->id)
                ->update([
                    'status' => 'Process'
                ]);
            return redirect()->action('App\Http\Controllers\AdminProyekController@edit',['proyek' => $ntp])->with('success', 'Berhasil Proses Tiket Proyek');
            }
        elseif($proyek->status == 'Process'){
            Proyek::where('id', $proyek->id)
                ->update([
                    'status' => 'Success'
                ]);
            return redirect('/dashboard/proyeks')->with('success', 'Tiket Diselesaikan, Menunggu konfirmasi dari manajer');
            }
        elseif($proyek->status == 'Success'){
            Proyek::where('id', $proyek->id)
                ->update([
                    'status' => 'Process'
                ]);
            return redirect('/dashboard/proyeks')->with ('success', 'Tiket Selesai');
            }
    }

    public function acc()
    {
        $status = Status::select('status', 'proyek_id')
        ->groupByRaw('status, proyek_id')
        ->get();

        $proyek = Proyek::where('status','=','Success')->get();

        // $status = Status::where('status', 'Success')->get(['proyek_id', 'keterangan']);
        $c = Status::where('status', 'Success')->count();
        $no = '1';
        return view ('dashboard.proyeks.konfirmasi',[
            'no' => $no,
            'statuses' => $status,
            'proyeks' => $proyek 
        ]);   
    }

    public function doneproyek(Proyek $proyek)
    {
        
        if($proyek->status == 'Success'){
            Proyek::where('id', $proyek->id)
                ->update([
                    'status' => 'Solved'
                ]);
            }
        else{
            
        }
        
        $validateDataDone ['proyek_id'] = $proyek->id;

        Doneproyek::create($validateDataDone);
        return redirect('/dashboard/proyekAcc')->with ('Success', 'Berhasil Menyelesaikan Tiket Proyek');
    }

    public function laporan()
    {
        return view ('dashboard.proyeks.laporan',[
            'doneproyeks' => Doneproyek::all()
        ]);
    }

    public function print_laporan(Request $request)
    {
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;


        $q = DB::table('doneproyeks')->select(DB::raw('MAX(id) as id'));
        $maxid="";
            foreach($q->get()as $k)
            {
                $tmp = ((int)$k->id);
                $maxid = $tmp;
            }
        
        $w = DB::table('doneproyeks')->select(DB::raw('MIN(id) as id'));
        $minid="";
            foreach($w->get()as $e)
            {
                $tmp = ((int)$e->id);
                $minid = $tmp;
            }        
        $min = Doneproyek::where('id',$minid)->get('created_at');
        $max = Doneproyek::where('id',$maxid)->get('created_at');


        if($request->tanggal_awal == NULL){
            return view ('dashboard.proyeks.cetak_laporan',[
                'doneproyeks' => Doneproyek::all(),
                "title" => "Laporan Proyek",
                'tanggal_awal' => $min,
                'tanggal_akhir' => $max,
                'periode' => ''
            ]);
        }      

        else{
            return view('dashboard.proyeks.cetak_laporan', [
                'doneproyeks' => Doneproyek::whereBetween('created_at',[$tanggal_awal, $tanggal_akhir])->get(),
                "title" => "Laporan Proyek",
                'tanggal_awal' => $tanggal_awal,
                'tanggal_akhir' => $tanggal_akhir,
                'periode' => 'true'
            ]);
        }
    }
}
