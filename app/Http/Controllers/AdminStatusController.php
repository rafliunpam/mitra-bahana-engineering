<?php

namespace App\Http\Controllers;
use App\Models\Status;
use App\Models\Proyek;
use Illuminate\Http\Request;
use App\Models\Billing;
use Illuminate\Routing\Redirector;

class AdminStatusController extends Controller
{
    public function edit(Status $status)
    {
        $id_user = auth()->user()->nik;
        $nik = $status->proyek->user->nik;

        if($nik == $id_user){
            return view ('dashboard.proyeks.statuses.edit', [
                'status' => $status,
            ]);
        }

        elseif(auth()->guest() || auth()->user()->level_user !== 'tim_proyek'){
            return view ('dashboard.proyeks.statuses.edit', [
                'status' => $status,
            ]);
        }

        else(abort(304));

        // $ntp = implode("",$np);


    }

    public function update(Status $status, Request $request)
    {
        
        $pi = $status->proyek_id;
        $np = Proyek::where('id', $pi)->get('no_tiket_proyek');
        foreach($np as $n)
            {
                $ntp = ((String)$n->no_tiket_proyek);
            }
        

        $rules = [
            'file' => 'required|max:2048',
        ];
        $validateData = $request->validate($rules);

        if($request->file('file')){
            $validateData['file'] = $request->file('file')->store('Tim-Proyek');
        }
        if($status->status == 'Process'){
            Status::where('id', $status->id)
                ->update([
                    'status' => 'Success'
                ]);
            }
        Status::where('id', $status->id)
                ->update($validateData);
                return redirect()->action('App\Http\Controllers\AdminProyekController@edit',['proyek' => $ntp])->with ('success', 'Berhasil Mengupdate Tiket Sales');
    }

    public function status(Status $status)
    {
        $sts = $status->proyek->no_tiket_proyek;

        if($status->status == 'Unprocessed'){
            Status::where('id', $status->id)
                ->update([
                    'status' => 'Process'
                ]);
            }
        elseif($status->status == 'Process'){
            Status::where('id', $status->id)
                ->update([
                    'status' => 'Success'
                ]);
            }
        elseif($status->status == 'Success'){
            Status::where('id', $status->id)
                ->update([
                    'status' => 'Process'
                ]);

            // $validateData ['status_id'] = $status->id;
            // $validateData ['no_billing'] = "{$status->proyek_id}{$status->tahapan}";
            // Billing::create($validateData);

            return redirect()->action('App\Http\Controllers\AdminStatusController@acc',['proyek' => $sts])->with('success', 'Berhasil Proses Tiket Proyek');
            }
        return back()->with ('Success', 'Berhasil Konfirmasi Tikes Sales');
    }

    public function donests(Status $status)
    {
        $sts = $status->proyek->no_tiket_proyek;
        if($status->status == 'Success'){
            Status::where('id', $status->id)
                ->update([
                    'status' => 'Done'
                ]);
            }
            return redirect()->action('App\Http\Controllers\AdminStatusController@acc',['proyek' => $sts])->with('success', 'Berhasil Acc BAST');

    }

    public function acc(Proyek $proyek)
    {
        $id_proyek = $proyek->id;
        return view ('dashboard.proyeks.statuses.konfirmasi',[
            'statuses' =>$status = Status::where('proyek_id', $id_proyek)->get(),
            'proyek' => $proyek,  
        ]);   
    }
}
