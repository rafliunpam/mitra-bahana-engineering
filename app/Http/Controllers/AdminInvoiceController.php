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


class AdminInvoiceController extends Controller
{
    public function index()
    {
        $status = Status::where('status','Done')->orderBy('count', 'desc')
                            ->select(DB::raw('count(*) as count, proyek_id'))
                            ->groupBy('proyek_id')
                            ->get();
        $status0 = Status::where('status','!=','Done')->orderBy('count', 'desc')
        ->select(DB::raw('count(*) as count, proyek_id'))
        ->groupBy('proyek_id')
        ->get();





        $proyek = Proyek::join('statuses', 'proyeks.id', '=', 'statuses.proyek_id')
        ->get();


        return view ('dashboard.invoices.index',[
            // 'proyeks' => Proyek::where('status', 'Process')->get(),
            'statuses' => $status,
            'statuses0' => $status0
        ]);
    }

    public function detail(Proyek $proyek)
    {
        $id_proyek = $proyek->id;
        return view ('dashboard.invoices.edit',[
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
        return $id;

        $id_proyek = $proyek->id;
        return view ('dashboard.invoices.upload',[
            'proyek' => $proyek,
            'statuses' =>$status = Status::where('proyek_id', $id_proyek)->where('status', 'Done')->get(), 
        ]);
    }

    public function store(Request $request)
    {
        return $request;
    }
}
