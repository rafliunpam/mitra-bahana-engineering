<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Proyek;
class AdminStatusController extends Controller
{
    public function show (Proyek $proyek)
    {
        return view ('dashboard.statuses.create',[
            'proyek' => $proyek
        ]);
    }

    public function store (Request $request)
    {
        $validateData = $request->validate([
            'proyek_id' => 'required',
        ]);
            $request->validate([
            'addMoreInputFields.*.status' => 'required'
        ]);
     
        foreach ($request->addMoreInputFields as $key => $value) {
        $value ['proyek_id'] = $request->proyek_id;
        Status::create($value);
        }
        
        return redirect('/dashboard/proyeks')->with ('success', 'Berhasil Membuat Tahapan!');
    }
}
