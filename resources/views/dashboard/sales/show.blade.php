@extends('dashboard.layouts.main')


@section('container')
<div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
            <h1 class= "md-3" > No. Tiket : {{ $sale->no_tiket_sales }}</h1>
            
            <a href="/dashboard/sales" class="btn btn-success"><span data-feather="arrow-left" class="align-text-bottom"></span>Back To All</a>
<div class="container">
        <div class="row my-3">
        <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Tahapan</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><input for="proses" id="proses"type="text" name="" value="{{ $sale->status }}" class="form-control" />
                    </td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Tambah</button></td>
                </tr>
            </table>

            </div>
        </div>
      </div>
    </div>
@endsection