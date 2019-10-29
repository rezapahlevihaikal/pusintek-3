@extends('layouts.app', ['title' => __('Sistem Operasi Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Upload Files Scan Bast')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Upload Files') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('bastdocument.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        @if($scan == 'gadagambar')
                          <form method="post" action="{{ route('bast.upload.store') }}" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" value="{{$id_bast}}" name="no_bast">
                              
                              <div class="pl-lg-4">
                                  <div class="form-group{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                                      <label class="form-control-label" for="input-gambar">{{ __('Bast Document Scan') }}</label>
                                      <br><label for="">file max:2MB</label>
                                      <input type="file" name="gambar" id="input-gambar" class="form-control form-control-alternative{{ $errors->has('gambar') ? ' is-invalid' : '' }}" >

                                      @if ($errors->has('gambar'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('gambar') }}</strong>
                                          </span>
                                          
                                      @endif
                                  </div>

                                  <div class="text-center">
                                      <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                  </div>
                              </div>
                          </form>
                        @else
                          <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">
                              Edit Document Scan
                          </button>
                          <br> <br> <br>
                          <embed
                            src="{{ route('show.bast',$id_bast) }}"
                            style="width:600px; height:800px;"
                            frameborder="0">                          
                         
                        @endif
                        

                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ganti Document Scan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <form action="{{route('bast.upload.update', $id_bast )}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('put')}}
                <input type="hidden" value="{{$id_bast}}" name="no_bast">

                <div class="form-group{{ $errors->has('gambar') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-gambar">{{ __('Bast Document Scan') }}</label>
                    <br><label for="">file max:2MB</label>
                    <input type="file" name="gambar" id="input-gambar" class="form-control form-control-alternative{{ $errors->has('gambar') ? ' is-invalid' : '' }}" >

                    @if ($errors->has('gambar'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('gambar') }}</strong>
                        </span>
                        
                    @endif
                </div>
                
              
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
          </div>
          </div>
      </div>
    </div>
@endsection