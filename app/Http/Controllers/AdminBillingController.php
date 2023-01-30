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

class AdminBillingController extends Controller
{
    
    public function index()
    {
        $status = Status::where('status','Done')->orderBy('count', 'desc')
                            ->select(DB::raw('count(*) as count, proyek_id'))
                            ->groupByRaw('proyek_id')
                            ->get();

        $billing = Status::where('billing_id','=',Null)->orderBy('count', 'desc')
        ->select(DB::raw('count(*) as count, proyek_id'))
        ->groupBy('proyek_id')
        ->get();


        $salah = Status::where('status', 'Done')->select('proyek_id')
                ->orderBy('count', 'desc')
                ->select(DB::raw('count(*) as count, proyek_id'))
                ->groupByRaw('proyek_id')
                ->get();

        $proyek = Status::where('status', '=', 'Done')->where('billing_id','=',Null)->select('proyek_id')
        ->orderBy('count', 'desc')
        ->select(DB::raw('count(*) as count, proyek_id'))
        ->groupByRaw('proyek_id')
        ->get();

        return view ('dashboard.billings.index',[
            // 'proyeks' => Proyek::where('status', 'Process')->get(),
            'statuses' => $proyek,
        ]);
    }

    public function detail(Proyek $proyek)
    {
        $id_proyek = $proyek->id;
        return view ('dashboard.billings.edit',[
            'proyek' => $proyek,
            'statuses' =>$status = Status::where('proyek_id', $id_proyek)->get(),  
        ]);
    }

    public function upload(Proyek $proyek)
    {
        $q = DB::table('billings')->select(DB::raw('MAX(id) as id'));

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


        $id_proyek = $proyek->id;
        return view ('dashboard.billings.upload',[
            'id' => $id,
            'proyek' => $proyek,
            'statuses' =>$status = Status::where('proyek_id', $id_proyek)->where('billing_id','=', NULL)->get(), 
        ]);
    }

    public function store(Request $request)
    {

        if($request->file('file')){
            $validateData['file'] = $request->file('file')->store('Invoice-files');
        }
        Billing::create($validateData);

        Status::whereIn('id', $request->status_id)
        ->update([
            'billing_id' => $request->billing_id,
            'status' => 'Solved'
        ]);

        $q = Status::where('proyek_id', $request->proyek_id)->get();
        foreach ($q as $key => $value) {
        }
            if ($value->status == 'Solved') {
                Proyek::where('id', $request->proyek_id)
                ->update([
                    'status' => 'Success',
                ]);

                return redirect('/dashboard/invoices')->with ('success', 'Berhasil Upload Invoice & Tiket Selesai');
            }
            else{
                return redirect('/dashboard/invoices')->with ('success', 'Berhasil Upload Invoice');
            }

        


    }
}
