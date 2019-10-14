@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">
                {{--  <div class="card bg-gradient-default shadow">
                    
                </div>  --}}
            </div>
            <div class="col-xl-4">
                {{--  <div class="card shadow">
                   
                    
                </div>  --}}
            </div>
        </div>
        <div class="row mt-5">
            
        </div>

       
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush