@extends('layouts.app', ['title' => __('Alokasi Hostname VM Management')])

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            
            </div>
        </div>
    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Alokasi Hostname VM') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                {{--  <a href="{{ route('alokasihostname.create') }}" class="btn btn-sm btn-primary">{{ __('Add Alokasi Hostname VM') }}</a>  --}}
                                <a href="{{ route('alokasihostname.create') }}" class="btn btn-sm btn-primary"><i class="ni ni-fat-add"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive" style="padding:25px">
                        <table class="table table-bordered text-center" id="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('ID') }}</th>
                                    <th scope="col">{{ __('Unit') }}</th>
                                    <th scope="col">{{ __('Hostname') }}</th>
                                    <th scope="col">{{ __('Description') }}</th>
                                    <th scope="col">{{ __('Alamat IP') }}</th>
                                    <th scope="col">{{ __('Label VM') }}</th>
                                    <th scope="col">{{ __('Sistem Operasi') }}</th>
                                    <th scope="col">{{ __('CPU') }}</th>
                                    <th scope="col">{{ __('Memory') }}</th>
                                    <th scope="col">{{ __('Disk') }}</th>
                                    <th scope="col">{{ __('Cluster Host') }}</th>
                                    <th scope="col">{{ __('Data Store') }}</th>
                                    <th scope="col">{{ __('No Tiket') }}</th>
                                    <th scope="col">{{ __('Keterangan') }}</th>
                                    <th scope="col">{{ __('PIC') }}</th>
                                    <th scope="col">{{ __('PIC OPD') }}</th>
                                    <th scope="col">{{ __('No Bast') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script type="text/javascript">
    
        $(function() {
            var table = $('#table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": '{{ url("export/alokasihostname") }}',
                    "type": "GET"
                },
                "columns": [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    {data: 'unit', name: 'unit'},
                    {data: 'hostname', name: 'hostname'},
                    {data: 'description', name: 'description'},
                    {data: 'ip', name: 'ip'},
                    {data: 'label_vm', name: 'label_vm'},
                    {data: 'sistem_operasi', name: 'sistem_operasi'},
                    {data: 'cpu', name: 'cpu'},
                    {data: 'memory', name: 'memory'},
                    {data: 'disk', name: 'disk'},
                    {data: 'cluster_host', name: 'cluster_host'},
                    {data: 'data_store', name: 'data_store'},
                    {data: 'no_tiket', name: 'no_tiket'},
                    {data: 'keterangan', name: 'keterangan'},
                    {data: 'pic', name: 'pic'},
                    {data: 'pic_opd', name: 'pic_opd'},
                    {data: 'no_bast', name: 'no_bast'},
                    {data: 'created_at', name: 'created_at' },
                    {data: 'action', name: 'action' },
                ],
            });
        });

        function deleteData(id){
            var table = $('#table').DataTable();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: 'Are you sure?',
                text: "You won't to delete Alakosi Hostname VM",
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                $.ajax({
                    url : "{{ url('alokasihostname') }}" + '/' + id,
                    type : "POST",
                    data : {'_method' : 'DELETE', '_token' : csrf_token},
                    success : function(data) {
                        // table.api().ajax.reload();            
                        $('#table').DataTable().ajax.reload(null, false);
                        swal({
                            title: 'Success!',
                            text: data.message,
                            type: 'success',
                            timer: '1500'
                        })
                    },
                    error : function () {
                        swal({
                            title: 'Oops...',
                            text: data.message,
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });
            });
        }
       

    </script>
@endpush
