@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
        <div class="row">
            
        {{-- <div class="card bg-gradient-default shadow">
            
        </div> --}}
        {{-- <div class="row mt-5">
            
        </div> --}}
    </div>
    <br><br><br><br>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <br>
                <div class="card shadow">
                    <div class="card">
                        <br>
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Grafik Alokasi Hostname VM') }}</h3>
                        </div>
                        <br>
                        <div class="panel-body">
                            <canvas id="canvas" height="300" width="600"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <br>
                <div class="card shadow">
                    <div class="card">
                        <br>
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('List Bast Document Lewat Tanggal Sewa') }} </h3>
                        </div>
                        <br>
                        <div class="panel-body">
                            <div class="table-responsive" style="padding:20px">
                                <table class="table table-bordered text-center" id="table-bast">
                                    <thead class="thead-light text-center" >
                                        <tr>
                                            <th scope="col">{{ __('No') }}</th>
                                            <th scope="col">{{ __('Nama') }}</th>
                                            <th scope="col">{{ __('NIP') }}</th>
                                            <th scope="col">{{ __('Jabatan') }}</th>
                                            <th scope="col">{{ __('Unit') }}</th>
                                            <th scope="col">{{ __('Sewa') }}</th>
                                            <th scope="col">{{ __('Start Date') }}</th>
                                            <th scope="col">{{ __('End Date') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tenggat as $item)
                                            <tr>
                                                <td>{{$no++}}</td>    
                                                <td>{{$item->nama}}</td>
                                                <td>{{$item->nip}}</td>
                                                <td>{{$item->jabatan}}</td>
                                                <td>{{$item->unit}}</td>
                                                <td>{{$item->sewa}}</td>
                                                <td>{{$item->start_date}}</td>
                                                <td>{{$item->end_date}}</td>
                                            </tr>    
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br><br>
    </div>

    
    
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

	<script>
        var url = "{{url('chart')}}";
        var Unit = new Array();
        var Labels = new Array();
        var Qty = new Array();
        $(document).ready(function(){
          $.get(url, function(response){
            response.forEach(function(data){
                Unit.push(data.unit);
                Qty.push(data.qty);     
            });
            var ctx = document.getElementById("canvas").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels:Unit,
                      datasets: [{
                          label: 'Alokasi Hostname VM',
                          data: Qty,
                          borderWidth: 1
                      }]
                  },
                  options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:true
                              }
                          }]
                      }
                  }
              });
          });
        });
    </script>
@endpush

