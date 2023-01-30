<?php

namespace App\Http\Controllers;
use App\Models\Billing;
use App\Models\Status;
use App\Models\Invoice;
use App\Models\Proyek;
use Illuminate\Http\Request;
use DB;
use Riskihajar\Terbilang\Facades\Terbilang;

class AdminBillingController extends Controller
{
    public function index()
    {
        $status = Status::where('status','Done')->where('billing','Done')->orderBy('count', 'desc')
                            ->select(DB::raw('count(*) as count, proyek_id'))
                            ->groupBy('proyek_id')
                            ->get();


        // $users = DB::table('proyeks')
        //     ->leftJoin('statuses', 'proyeks.id', '=', 'statuses.proyek_id')
        //     ->get();

        // $status = Status::where('status', 'Done')->get(['proyek_id', 'status'])->groupBy('proyek_id');
        // return $status;
        // $status = Status::where('status', 'Done')->get(['proyek_id', 'keterangan']);
        // return $status->groupBy('proyek_id');
        // $status = Status::all()->groupBy('proyek_id', 'status');
        $bidang = Status::orderBy('proyek_id', 'desc')->get();
        $proyek = Proyek::all();

                $billing = BIlling::leftJoin('statuses', 'billings.id', '=', 'statuses.proyek_id')->get();
        

        // $status = Status::where('status', 'Done')->get('proyek_id');
        return view ('dashboard.billings.index',[
            'billings' =>Billing::where('persentase','<', '100')->get(),
            'statuses' => $status
        ]);
    }

    public function create(Billing $billing)
    {
        $q = DB::table('invoices')->select(DB::raw('MAX(RIGHT(id,3)) as id'));
        $st = ((int)$billing->sisa_pembayaran);
        $p = $billing->persentase;
        $maxp = ('100')-$p;

        if($q->count()>0)
        {
            foreach($q->get()as $k)
            {
                $tmp = ((int)$k->id)+1;
                $ki = sprintf("%03s", $tmp);
            }
        }
        else{
            $ki = "001";
        }
        //Nomor Invoice
        $pi = $billing->proyek_id;
        $proyek_id = sprintf("%03s", $pi);
        $now = date('y');
 
        $format = [$proyek_id."/".$ki."/"."MBE"."/".$now];
        $ni = implode("",$format);

        return view ('dashboard.billings.create2',[
            'proyeks' => Proyek::all(),
            'st' => $st,
            'maxp' => $maxp,
            'ni' => $ni,
            'billing' => $billing,
            'statuses' => Status::where('proyek_id', $billing->proyek_id)->where('status', 'Done')->where('billing', '0')->get(),
        ]);
    }

    public function store(Request $request)
    {
        //pembayran
        $billing = Billing::where('id',$request->billing_id)->get('harga');
        foreach ($billing as $key => $tg) {
            $format = [$tg->harga];
            $total = implode("",$format);
        }

        $data = $request->all();

        //Penjumlahan harga
        $hr = $request->harga_pembayaran;
        $jml_pembayaran = array_sum($hr);
        $sisa_harga = ($total-$jml_pembayaran);


        //Penjumlahan persentase
        $pp = $request->persentase_pembayaran;
        $jml_persentase = array_sum($pp);
        $total_persen=($total/100)*$jml_persentase;


            foreach ($data['status_id'] as $item => $value) {
                $data2 = array(
                    'billing_id' => $data['billing_id'],
                    'no_invoice' => $data['no_invoice'],
                    'status_id' => $data['status_id'][$item],
                    'persentase_pembayaran' => $data['persentase_pembayaran'][$item],
                    'harga_pembayaran' => $data['harga_pembayaran'][$item]
                );

                Invoice::create($data2);

                Status::where('id', $data['status_id'][$item])
                ->update([
                    'billing' => "1",
                ]);

                Billing::where('id', $request->billing_id)
                ->update([
                    'persentase' => $jml_persentase,
                    'sisa_pembayaran' => $sisa_harga,
                ]);
            }
        return redirect('/dashboard/billings')->with ('success', 'Berhasil Membuat Tiket Proyek');
    }

    public function detail(Billing $billing)
    {
        return view ('dashboard.billings.detail',[
            'billing' => $billing,
            'invoices' => Invoice::where('billing_id', $billing->id)->get(),
            'statuses' => Status::where('proyek_id', $billing->proyek_id)->get()
        ]);
        
    }

    public function invoice(Invoice $invoice)
    {
        return view ('dashboard.billings.invoice',[
            "title" => "Invoice Proyek",
            'invoices' => Invoice::where('no_invoice', $invoice->no_invoice)->get()
            

        ]);
    }

    public function getStatus($proyek_id)
    {
        $data = Status::where('proyek_id',$proyek_id)->where('status', 'Done')->get();
        \Log::info($data);
        return response()->json(['data' => $data]);
    }

    public function penyebut()
    {
        $tmp = "Rp. 189.350.000";
        $number = preg_replace("/[^0-9]/","",$tmp);
        $suffix = " Rupiah";
        $prefix = "Senilai ";
        $terbilang = Terbilang::make($number, $suffix, $prefix);
        $ubah_kalimat = strtolower($terbilang);
        $new_kalimat = ucwords($ubah_kalimat);

        return $new_kalimat;
    }

    public function auto_field($harga)
    {
        $number = preg_replace("/[^0-9]/","",$harga);
        $suffix = " Rupiah";
        $prefix = "Senilai ";
        $terbilang = Terbilang::make($number, $suffix, $prefix);
        $ubah_kalimat = strtolower($terbilang);
        $new_kalimat = ucwords($ubah_kalimat);

        $data = $new_kalimat;
        \Log::info($data);
        return response()->json(['data' => $data]);
    }
}
