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
                                <br>
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for unit">
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('alokasihostname.create') }}" class="btn btn-sm btn-primary">{{ __('Add Alokasi Hostname VM') }}</a>
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

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Unit') }}</th>
                                    <th scope="col">{{ __('Hostname') }}</th>
                                    <th scope="col">{{ __('Description') }}</th>
                                    <th scope="col">{{ __('Alamat IP') }}</th>
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
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alokasihostname as $row)
                                    <tr>
                                        <td>{{ $row->unit }}</td>
                                        <td>{{ $row->hostname }}</td>
                                        <td>{{ $row->description }}</td>
                                        <td>{{ $row->ip }}</td>
                                        <td>{{ $row->sistem_operasi }}</td>
                                        <td>{{ $row->cpu }}</td>
                                        <td>{{ $row->memory }}</td>
                                        <td>{{ $row->disk }}</td>
                                        <td>{{ $row->cluster_host }}</td>
                                        <td>{{ $row->data_store }}</td>
                                        <td>{{ $row->no_tiket }}</td>
                                        <td>{{ $row->keterangan }}</td>
                                        <td>{{ $row->pic }}</td>
                                        <td>{{ $row->pic_opd }}</td>
                                        <td>{{ $row->no_bast }}</td>
                                        <td>{{ $row->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <form action="{{ route('alokasihostname.destroy', $row->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        
                                                        <a class="dropdown-item" href="{{ route('alokasihostname.edit', $row->id) }}">{{ __('Edit') }}</a>
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $alokasihostname->links() }}
                        </nav>
                    </div> --}}
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection

<script>
    function myFunction() {
      // Declare variables
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
    
      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    </script>