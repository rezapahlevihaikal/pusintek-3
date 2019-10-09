@extends('layouts.app', ['title' => __('Alokasi Hostname VM Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Database Alokasi Hostname VM Management')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Alokasi Hostname VM Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('alokasihostname.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('alokasihostname.store') }}" autocomplete="off">
                            @csrf
                            
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('unit') ? ' has-danger' : '' }}">
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-control-label" for="unit">Unit : </label>
                                            <select name="unit" class="form-control">
                                                <option value="" class="disable selected">Pilih Unit</option>
                                                <option value="SETJEN">SETJEN</option>
                                                <option value="DJPB">DJPB</option>
                                                <option value="DJA">DJA</option>
                                                <option value="DJP">DJP</option>
                                                <option value="DJBC">DJBC</option>
                                                <option value="DJKN">DJKN</option>
                                                <option value="DJPK">DJPK</option>
                                                <option value="DJPPR">DJPPR</option>
                                                <option value="ITJEN">ITJEN</option>
                                                <option value="BKF">BKF</option>
                                                <option value="BPPK">BPPK</option>
                                                <option value="LUAR_KEMENKEU">LUAR KEMENKEU</option>
                                            </select>
                                            @if($errors->has('unit'))
                                                <strong class="text-danger"> {{$errors->first('unit')}} </strong>
                                            @endif
                                        </div>
                                        <div class="col">
                                                <label class="form-control-label" for="tipe">Tipe : </label>
                                                <select name="tipe" class="form-control">
                                                    <option value="" class="disable selected">Pilih Tipe</option>
                                                    <option value="C">CLOUD</option>
                                                    <option value="D">DEVELOPMENT</option>
                                                    <option value="H">HOSTING</option>
                                                    <option value="M">MANAGEMENT</option>
                                                </select>
                                                @if($errors->has('tipe'))
                                                    <strong class="text-danger"> {{$errors->first('tipe')}} </strong>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-control-label" for="input-desc">{{ __('Description') }}</label>
                                            <input type="text" name="desc" id="input-desc" class="form-control form-control-alternative{{ $errors->has('desc') ? ' is-invalid' : '' }}" placeholder="{{ __('Input Description') }}" value="{{ old('desc') }}"  autofocus>
        
                                            @if ($errors->has('desc'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('desc') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <label class="form-control-label" for="input-ip">{{ __('IP ADDRESS') }}</label>
                                            <input type="text" name="ip" id="input-ip" class="form-control form-control-alternative{{ $errors->has('ip') ? ' is-invalid' : '' }}" placeholder="{{ __('Input IP ADDRESS') }}" value="{{ old('ip') }}"  autofocus>
        
                                            @if ($errors->has('ip'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('ip') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">

                                        <div class="col">
                                            <label class="form-control-label" for="input-cpu">{{ __('CPU') }}</label>
                                            <input type="number" min="0" name="cpu" id="input-cpu" class="form-control form-control-alternative{{ $errors->has('cpu') ? ' is-invalid' : '' }}" placeholder="{{ __('Input Jumlah CPU') }}" value="{{ old('cpu') }}"  autofocus>
        
                                            @if ($errors->has('cpu'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('cpu') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <label class="form-control-label" for="input-memory">{{ __('Memory') }}</label>
                                            <input type="number" min="0" name="memory" id="input-memory" class="form-control form-control-alternative{{ $errors->has('memory') ? ' is-invalid' : '' }}" placeholder="{{ __('Input Memory') }}" value="{{ old('memory') }}"  autofocus>
        
                                            @if ($errors->has('memory'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('memory') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-control-label" for="input-disk">{{ __('DISK') }}</label>
                                            <input type="number" min="0" name="disk" id="input-disk" class="form-control form-control-alternative{{ $errors->has('disk') ? ' is-invalid' : '' }}" placeholder="{{ __('Input DISK') }}" value="{{ old('disk') }}"  autofocus>
        
                                            @if ($errors->has('disk'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('disk') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col">
                                            <label class="form-control-label" for="input-cluster-host">{{ __('Cluster Host') }}</label>
                                            <input type="text" name="clusterHost" id="input-cluster-host" class="form-control form-control-alternative{{ $errors->has('cluster-host') ? ' is-invalid' : '' }}" placeholder="{{ __('Input Cluster Host') }}" value="{{ old('cluster-host') }}"  autofocus>
        
                                            @if ($errors->has('cluster-host'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('cluster-host') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <label class="form-control-label" for="input-data-store">{{ __('Data Store') }}</label>
                                            <input type="text"  name="dataStore" id="input-data-store" class="form-control form-control-alternative{{ $errors->has('data-store') ? ' is-invalid' : '' }}" placeholder="{{ __('Input Data Store') }}" value="{{ old('data-store') }}"  autofocus>
        
                                            @if ($errors->has('data-store'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('data-store') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-control-label" for="input-tiket">{{ __('No Tiket') }}</label>
                                            <input type="text" name="tiket" id="input-tiket" class="form-control form-control-alternative{{ $errors->has('tiket') ? ' is-invalid' : '' }}" placeholder="{{ __('Input No Tiket') }}" value="{{ old('tiket') }}"  autofocus>
        
                                            @if ($errors->has('tiket'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('tiket') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col">
                                            <label class="form-control-label" for="sistem-operasi">Sistem Operasi : </label>
                                            <select name="sistemOperasi" class="form-control">
                                                <option value="" class="disable selected">Pilih Sistem Operasi</option>
                                                @foreach ($sistemoperasi as $row)
                                                    <option value="{{$row->name}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('sistem-operasi'))
                                                <strong class="text-danger"> {{$errors->first('sistem-operasi')}} </strong>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('keterangan') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-keterangan">{{ __('Keterangan') }}</label>
                                    <input type="text" name="keterangan" id="input-keterangan" class="form-control form-control-alternative{{ $errors->has('keterangan') ? ' is-invalid' : '' }}" placeholder="{{ __('Input Keterangan') }}" value="{{ old('keterangan') }}"  autofocus>

                                    @if ($errors->has('keterangan'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('keterangan') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-control-label" for="input-pic">{{ __('PIC') }}</label>
                                                <input type="text" name="pic" id="input-pic" class="form-control form-control-alternative{{ $errors->has('pic') ? ' is-invalid' : '' }}" placeholder="{{ __('Input PIC') }}" value="{{ old('pic') }}"  autofocus>
            
                                                @if ($errors->has('pic'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('pic') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
    
                                            <div class="col">
                                                <label class="form-control-label" for="input-pic-opd">{{ __('PIC OPD') }}</label>
                                                <input type="text" name="picOpd" id="input-pic-opd" class="form-control form-control-alternative{{ $errors->has('pic-opd') ? ' is-invalid' : '' }}" placeholder="{{ __('Input PIC OPD') }}" value="{{ old('pic-opd') }}"  autofocus>
            
                                                @if ($errors->has('pic-opd'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('pic-opd') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col">
                                                <label class="form-control-label" for="input-no-bast">{{ __('NO BAST') }}</label>
                                                <input type="text"  name="noBast" id="input-no-bast" class="form-control form-control-alternative{{ $errors->has('no-bast') ? ' is-invalid' : '' }}" placeholder="{{ __('Input No BAST') }}" value="{{ old('no-bast') }}"  autofocus>
            
                                                @if ($errors->has('no-bast'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('no-bast') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>




                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection