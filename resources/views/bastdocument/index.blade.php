@extends('layouts.app', ['title' => __('Bast Cloud Document Management')])

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
                                <h3 class="mb-0">{{ __('Bast Cloud Document Atas Nama') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('bastdocument.create') }}" class="btn btn-sm btn-primary">{{ __('Add Bast Document') }}</a>
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
                            <table class="table table-bordered text-center" id="table-bast">
                            <thead class="thead-light text-center" >
                                <tr>
                                    <th scope="col">{{ __('No') }}</th>
                                    <th scope="col">{{ __('Nama') }}</th>
                                    <th scope="col">{{ __('NIP') }}</th>
                                    <th scope="col">{{ __('Jabatan') }}</th>
                                    <th scope="col">{{ __('Unit') }}</th>
                                    <th scope="col">{{ __('Sewa') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col">{{ __('Export') }}</th>
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
            var table = $('#table-bast').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url("export/bast") }}'
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    {data: 'nama', name: 'nama'},
                    {data: 'nip', name: 'nip'},
                    {data: 'jabatan', name: 'jabatan'},
                    {data: 'unit', name: 'unit'},
                    {data: 'sewa', name: 'sewa'},
                    {data: 'created_at', name: 'created_at' },
                    {data: 'pdf', name: 'pdf' },
                    {data: 'action', name: 'action' },
                ],
            });
        });

        function deleteData(id){
            var table = $('#table-bast').DataTable();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: 'Are you sure?',
                text: "You won't to delete This Bast Document!",
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                $.ajax({
                    url : "{{ url('bastdocument') }}" + '/' + id,
                    type : "POST",
                    data : {'_method' : 'DELETE', '_token' : csrf_token},
                    success : function(data) {
                        // table.api().ajax.reload();            
                        $('#table-bast').DataTable().ajax.reload(null, false);
                        swal({
                            title: 'Success!',
                            text: data.message,
                            type: 'success',
                            timer: '1500'
                        })
                    },
                    error : function (data) {
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