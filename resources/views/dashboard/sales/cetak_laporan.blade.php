@extends('dashboard.layouts.laporan')


@section('container')
<div class="breadcrumbs">
                <div class="">
                    <div class="page-header">
                        <div class="page-title mt-3 mb-3">
                        <h3><img src="/AdminSufee/images/logo2.png" alt="" class="mb-3">Mitra bahana Enginerring</h3>
                        </div>
                        <span class="float-right">{{ date('d/M/Y') }}</span>
                    </div>
                </div>
            </div>

            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header text-lg-center"">
                                    <h3><strong class="card-title text-center"
                                        >Laporan Sales Solved</strong
                                    ></h3>
                                </div>
                                @if($periode !== '')
                                <div class="mt-2 ml-3">
                                    <label class="" > <b> Periode Tanggal : </b>
                                            <?= date ('d/M/Y', strtotime($tanggal_awal)); ?>
                                            -
                                            <?= date ('d/M/Y', strtotime($tanggal_akhir)); ?>                       
                                        </label>
                                </div>
                                @else
                                
                                <div class="mt-2 ml-3">
                                    <label class="" > <b> Periode Tanggal : </b>
                                    @foreach($tanggal_awal as $tanggal_awal)
                                            <?= date ('d/M/Y', strtotime($tanggal_awal->created_at)); ?>
                                    @endforeach
                                            -
                                    @foreach($tanggal_akhir as $tanggal_akhir)
                                            <?= date ('d/M/Y', strtotime($tanggal_akhir->created_at)); ?>
                                    @endforeach                     
                                        </label>
                                </div>
                                
                                @endif
                                <div class="card-body">
                                <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>No Tiket Sales</th>
                                                <th>Tim Sales</th>
                                                <th>Client</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($donesales as $done)
                                            <tr>
                                              <td>{{ $loop->iteration }}</td>
                                              <td>{{ $done->sale->no_tiket_sales }}</td>
                                              <td>{{ $done->sale->user->employee->name }}</td>
                                              <td>{{ $done->sale->client->company_name }}</td>
                                              <td><?= date ('d/M/Y H:i', strtotime($done['created_at'])); ?></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .animated -->
            </div>
            <!-- .content -->
        </div>
        <script type="text/javascript">
            window.print();
        </script>
@endsection