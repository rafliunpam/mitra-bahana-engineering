@extends('layouts.main')
@section('container')
<section id="tracks" class="contact">
<!-- <header class="section-header">
    <p>Lacak Tiket</p>
  </header> -->

  <div class="container" data-aos="fade-up">

  <div class="row gy-12 justify-content-center ">

<h1 class="mb-3 text-center mt-5" >{{ $title }}</h1>

@if(session()->has('success'))
      <div class="alert alert-success col-lg-10" role="alert">
        {{ session('success') }}
      </div>

      @endif

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/tracks/{{ request('notik') }}"  method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Masukan Nomor Tiket" name="notik" value="{{ request('notik') }}" required>
            <button class="btn btn-danger" type="submit" >Lacak Tiket</button>
        </div>
        </form>
    </div>

  @csrf
  @foreach ($proyeks as $proyek)
    <table class="table table-striped table-sm">
        <thead>
            <tr>
            <th scope="col">No Tiket Proyek</th>
            <th scope="col">Client</th>
            </tr>
        </thead>
        <tbody>    
        <tr>
            <td>
            <input type="text" class="form-control bg-white" id="no_tiket_proyek" name="no_tiket_proyek" value="{{ $proyek->no_tiket_proyek }}" readonly>
            </td>
            <td>
            <input type="text" class="form-control bg-white" id="client" name="client" value="{{ $proyek->donesale->sale->client->company_name}}" readonly>
            </td>
            <td>
            <tr></tr>
        </tr>
 
        </tbody>
        </table>

        <div class="table-responsive col-lg-12">
            
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">Tahapan</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col" class="text-center">Status</th>
                  <th scope="col" class="text-center">Tanggal</th>
    
                </tr>
              </thead>
              <tbody>
              @foreach ($statuses as $status)
              @if($status->proyek_id == "{$proyek->id}")
                <tr>
                    <td>{{ $status->tahapan }}</td>
                    <td>{{ $status->keterangan }}</td>
                    <td class="text-center">
                    @if($status->status == "Unprocessed")
                    <label class="badge bg-danger" type="text"> {{ $status->status }} </label>
                    @elseif($status->status == "Process")
                    <label class="badge bg-warning" type="text"> {{ $status->status }} </label>
                    @elseif($status->status == "Success")
                    <label class="badge bg-success" type="text"> {{ $status->status }}</label>
                    @elseif($status->status == "Done")
                    <label class="badge bg-primary" type="text"> {{ $status->status }}</label>
                    @endif
                    </td>
                    <td class="text-center">
                    {{ $status->updated_at }}
                    </td>
                </tr>
                </tbody>
                @endif
              @endforeach
              @endforeach
        </table>
      </div>
</div>

</diV>
</div>

</section>

@endsection