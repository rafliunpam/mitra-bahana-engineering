<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\User;
use App\Models\Donesale;
use App\Models\Sale;
use App\Models\Cancle;
use Illuminate\Http\Request;
use DB;

class AdminSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->guest() || auth()->user()->level_user == 'tim_sales'){
            return view ('dashboard.sales.index',[
                'clients' => Client::all(),
                'users' => User::all(),
                'sales' => Sale::where('user_id', auth()->user()->id)->where('status', '!=', 'Solved')->get(),
                'donesale' => Donesale::all(),     
            ]);
        }

        else{
            return view ('dashboard.sales.index',[
                'clients' => Client::all(),
                'users' => User::all(),
                'sales' => Sale::where('status', '!=', 'Solved')->get(),
                'donesales' => Donesale::all(), 
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
        $ci = DB::table('sales')->select(DB::raw('MAX(RIGHT(id,3)) as id'));
        $sales_id="";
        
        if($ci->count()>0)
        {
            foreach($ci->get()as $c)
            {
                $tmp = ((int)$c->id)+1;
                $sales_id = sprintf("%03s", $tmp);
            }
        }
        else{
            $sales_id = "001";
        }

        

        return view ('dashboard.sales.create',[
            'sales_id' => $sales_id,
            'sales' => Sale::all(),
            'clients' => Client::all(),
            'users' => User::all()
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
        //Nomor Tiket OTOMATIS
        //NTS : T-m-d-C-cln_id-S-id (T221013C2210006S001)

        $ci = DB::table('sales')->select(DB::raw('MAX(RIGHT(id,3)) as id'));
        $sales_id="";
        
        if($ci->count()>0)
        {
            foreach($ci->get()as $c)
            {
                $tmp = ((int)$c->id)+1;
                $sales_id = sprintf("%03s", $tmp);
            }
        }
        else{
            $sales_id = "001";
        }
        


        $now=date('ymd');

        $cl = $request->client_id;
        $get = Client::where('id', $cl)->get('kode_client');
        $cln = preg_replace("/[^0-9]/","",$get);
        $format = [$now.$cln.$sales_id];
        $nts = implode("",$format);

        $validateDataTiket = $request->validate([
            'client_id' => 'required',
            'user_id' => 'required',
            'file' => 'nullable' 
        ]);
        $validateDataTiket['no_tiket_sales'] = $nts;

        Sale::create($validateDataTiket);
        return redirect('/dashboard/sales')->with ('success', 'Berhasil Membuat Tiket Sales');

        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        // return $sale;
        return view('dashboard.sales.show', [
            'sale' => $sale,
            'clients' => Client::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        return view('dashboard.sales.edit', [
            'sale' => $sale,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        $validateData['no_tiket_sales'] = $sale->no_tiket_sales;
        $validateData['user_id'] = $sale->user_id;
        $validateData['client_id'] = $sale->client_id;
        $validateData ['status'] = $sale->status;
        $validateData ['keterangan'] = $request->keterangan;

        if($request->file('file')){
            $validateData['file'] = $request->file('file')->store('Tim-Sales');
        }

        Sale::where('id', $sale->id)
                ->update($validateData);
        return redirect('/dashboard/sales')->with ('success', 'Berhasil Mengupdate Tiket Sales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        Sale::destroy($sale->id);
        return redirect('/dashboard/sales')->with ('success', 'Berhasil Menghapus Tiket');
    }

    public function edit_ts(Sale $sale)
    {
        return view('dashboard.sales.edit', [
            'sale' => $sale,
        ]);
    }

    public function req_cancle(Request $request,Sale $sale)
    {
        $keterangan = $request->keterangan;

        if($sale->status !== 'Pending'){
            Sale::where('id', $sale->id)
                ->update([
                    'status' => 'Pending',
                    'keterangan' => $keterangan,
                ]);
                return redirect('/dashboard/sales')->with ('success', 'Berhasil membatalkan tiket. Silahkan Tunggu konfirmasi');
            }
            
        elseif($sale->status == 'Pending'){
            Sale::where('id', $sale->id)
            ->update([
                'status' => 'Process',
                'keterangan' => 'Refused in canceling ticket'
            ]);
            return redirect('/dashboard/sales')->with ('success', 'Berhasil menolak pembatalan tiket');
        }
    }

    public function acc_cancle(Sale $sale)
    {
        if($sale->status == 'Pending'){
            Sale::where('id', $sale->id)
                ->update([
                    'status' => 'Cancle',
                ]);
        }
        $validateDataCancle['sale_id'] = $sale->id;

        Cancle::create($validateDataCancle);
        return redirect('/dashboard/sales')->with ('Success', 'Berhasil Membatalkan Tiket Sales');

    }

    public function status(Sale $sale)
    {
        if($sale->status == 'Unprocessed'){
            Sale::where('id', $sale->id)
                ->update([
                    'status' => 'Process'
                ]);
                return redirect('/dashboard/sales')->with ('success', 'Berhasil Proses Tikes Sales');
            }
        elseif($sale->status == 'Process'){
            Sale::where('id', $sale->id)
                ->update([
                    'status' => 'Success'
                ]);
                return redirect('/dashboard/sales')->with ('success', 'Berhasil Selesaikan Tikes Sales (Silahkan tunggu konfirmasi dari Manajaer Sales');
            }
        elseif($sale->status == 'Success'){
            Sale::where('id', $sale->id)
                ->update([
                    'status' => 'Process'
                ]);
            return redirect('/dashboard/saleAcc')->with ('success', 'Berhasil Menolak Tiket Sales');
            }
    }


    public function acc()
    {
        if(auth()->guest() || auth()->user()->status_user !== 'tim_sales'){
            return view ('dashboard.sales.konfirmasi',[
                'clients' => Client::all(),
                'users' => User::all(),
                'sales' => Sale::all(),
                'donesales' => Donesale::all(),    
            ]);
        }

        else{
            return view ('dashboard.sales.konfirmasi',[
                'clients' => Client::all(),
                'users' => User::all(),
                'sales' => Sale::where('user_id', auth()->user()->id)->get(),
                'donesale' => Donesale::all(),       
            ]);
        }
    }

    public function donesale(Sale $sale)
    {
        if($sale->status == 'Success'){
            Sale::where('id', $sale->id)
                ->update([
                    'status' => 'Solved'
                ]);
            }
        else{
            
        }
        
        $validateDataDone ['sale_id'] = $sale->id;

        Donesale::create($validateDataDone);
        return redirect('/dashboard/saleAcc')->with ('success', 'Berhasil Menyelesaikan Tiket Sales');
    }

    public function laporan()
    {
        return view ('dashboard.sales.laporan',[
            'donesales' => Donesale::all()
        ]);
    }

    public function print_laporan(Request $request)
    {
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;


        $q = DB::table('donesales')->select(DB::raw('MAX(id) as id'));
        $maxid="";
            foreach($q->get()as $k)
            {
                $tmp = ((int)$k->id);
                $maxid = $tmp;
            }
        
        $w = DB::table('donesales')->select(DB::raw('MIN(id) as id'));
        $minid="";
            foreach($w->get()as $e)
            {
                $tmp = ((int)$e->id);
                $minid = $tmp;
            }        
        $min = DoneSale::where('id',$minid)->get('created_at');
        $max = DoneSale::where('id',$maxid)->get('created_at');


        if($request->tanggal_awal == NULL){
            return view ('dashboard.sales.cetak_laporan',[
                'donesales' => DoneSale::all(),
                "title" => "Laporan Proyek",
                'tanggal_awal' => $min,
                'tanggal_akhir' => $max,
                'periode' => ''
            ]);
        }      

        else{
            return view('dashboard.sales.cetak_laporan', [
                'donesales' => DoneSale::whereBetween('created_at',[$tanggal_awal, $tanggal_akhir])->get(),
                "title" => "Laporan Proyek",
                'tanggal_awal' => $tanggal_awal,
                'tanggal_akhir' => $tanggal_akhir,
                'periode' => 'true'
            ]);
        }
    }
}
