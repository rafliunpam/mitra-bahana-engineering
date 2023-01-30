<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyek;
use App\Models\Status;

class TrackController extends Controller
{
    public function index(Request $request)
    {
        $proyeks = Proyek::where('no_tiket_proyek', $request->notik)->get('id');
        $id ='';
        $id = preg_replace("/[^0-9]/","",$proyeks);
        
        return view('tracks', [
            'title' => 'Track Ticket',
            'active' => 'track',
            'id'    => $id,
            'proyeks' => Proyek::where('no_tiket_proyek', $request->notik)->get(),
            'statuses' => Status::all()
        ]);

        if($id !== NULL){
            return view('tracks', [
                'title' => 'Track Ticket',
                'active' => 'track',
                'proyeks' => Proyek::where('no_tiket_proyek', $request->notik)->get(),
                'statuses' => Status::all()
            ]);
        }
        else{
            return view('tracks', [
                'title' => 'Track Ticket',
                'active' => 'track',
                'proyeks' => '',
                'statuses' => ''
            ]);
        }


        $status = '';
        if($request->notik !== NULL){
            return view('tracks', [
                'title' => 'Track Ticket',
                'active' => 'track',
                'request' => $request->notik,
                'proyeks' => $proyeks,
                'statuses' => Status::all()
            ]);
        }

        else{
            return view('tracks', [
                'title' => 'Track Ticket',
                'active' => 'track',
                'request' => $request->notik,
                'proyeks' => $proyeks,
                'statuses' => Status::all()
            ]);
        }


    }
    
    // public function notik(Request $request)
    // {
    //     return $request;
    //     return view('tracks', [
    //         'title' => 'Track Ticket',
    //         'active' => 'track',
    //         'request' => $request->notik,
    //         'proyeks' => Proyek::where('no_tiket_proyek', $request->notik)->get(),
    //         'statuses' => Status::all()
    //     ]);

    // }

    // public function getData(Proyek $proyek)
    // {
    //     $status = Status::where('proyek_id','=',$proyek->id)->get();
    //     return $status;
    // }

    
}
