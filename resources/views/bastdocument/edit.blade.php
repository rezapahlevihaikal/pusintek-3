@extends('layouts.app', ['title' => __('Bast Document Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Edit Dokumen BAST CLOUD')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Dokument BAST CLOUD Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('bastdocument.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('bastdocument.update', $bast->id) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <div class="form-group{{ $errors->has('pernyataan') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-pernyataan">{{ __('Pernyataan') }}</label>
                                <input type="text" name="pernyataan" id="input-pernyataan" class="form-control form-control-alternative{{ $errors->has('pernyataan') ? ' is-invalid' : '' }}" placeholder="{{ __('ex : Pada hari ini Jumat tanggal Dua Puluh Lima bulan Januari tahun Dua Ribu Sembilas Belas kami yang bertanda tangan di bawah ini :') }}" value="{{ old('pernyataan', $bast->pernyataan) }}" required autofocus>

                                @if ($errors->has('pernyataan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pernyataan') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <hr color="black">    
                            <h3>Selanjutnya Disebut PIHAK PERTAMA</h3>
                            <br>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-control-label" for="input-nama">{{ __('Nama') }}</label>
                                        <input type="text" name="nama" id="input-nama" class="form-control form-control-alternative{{ $errors->has('nama') ? ' is-invalid' : '' }}" placeholder="{{ __('Input Nama') }}" value="{{ old('nama',$bast->nama) }}" required autofocus>

                                        @if ($errors->has('nama'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nama') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <label class="form-control-label" for="input-nip">{{ __('NIP') }}</label>
                                        <input type="nip" name="nip" id="input-nip" class="form-control form-control-alternative{{ $errors->has('nip') ? ' is-invalid' : '' }}" placeholder="{{ __('Input NIP') }}" value="{{ old('nip',$bast->nip) }}" required autofocus>

                                        @if ($errors->has('nip'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nip') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-control-label" for="input-jabatan">{{ __('Jabatan') }}</label>
                                        <input type="text" name="jabatan" id="input-jabatan" class="form-control form-control-alternative{{ $errors->has('jabatan') ? ' is-invalid' : '' }}" placeholder="{{ __('Input Jabatan') }}" value="{{ old('jabatan',$bast->jabatan) }}" required autofocus>

                                        @if ($errors->has('jabatan'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('jabatan') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <label class="form-control-label" for="unit">Unit : </label>
                                        <select name="unit" class="form-control">
                                            <option value="" class="disable selected">Pilih Unit</option>
                                            <option value="SETJEN"
                                                <?php 
                                                    if ($bast->unit == 'SETJEN') {
                                                        echo 'selected';
                                                    }
                                                ?>
                                            >SETJEN</option>
                                            <option value="DJPB"
                                                <?php 
                                                    if ($bast->unit == 'DJPB') {
                                                        echo 'selected';
                                                    }
                                                ?>
                                            >DJPB</option>
                                            <option value="DJA"
                                                <?php 
                                                    if ($bast->unit == 'DJA') {
                                                        echo 'selected';
                                                    }
                                                ?>
                                            >DJA</option>
                                            <option value="DJP"
                                                <?php 
                                                    if ($bast->unit == 'DJP') {
                                                        echo 'selected';
                                                    }
                                                ?>
                                            >DJP</option>
                                            <option value="DJBC"
                                                <?php 
                                                    if ($bast->unit == 'DJBC') {
                                                        echo 'selected';
                                                    }
                                                ?>
                                            >DJBC</option>
                                            <option value="DJKN"
                                                <?php 
                                                    if ($bast->unit == 'DJKN') {
                                                        echo 'selected';
                                                    }
                                                ?>
                                            >DJKN</option>
                                            <option value="DJPK"
                                                <?php 
                                                    if ($bast->unit == 'DJPK') {
                                                        echo 'selected';
                                                    }
                                                ?>
                                            >DJPK</option>
                                            <option value="DJPPR"
                                                <?php 
                                                    if ($bast->unit == 'DJPPR') {
                                                        echo 'selected';
                                                    }
                                                ?>
                                            >DJPPR</option>
                                            <option value="ITJEN"
                                                <?php 
                                                    if ($bast->unit == 'ITJEN') {
                                                        echo 'selected';
                                                    }
                                                ?>
                                            >ITJEN</option>
                                            <option value="BKF"
                                                <?php 
                                                    if ($bast->unit == 'BKF') {
                                                        echo 'selected';
                                                    }
                                                ?>
                                            >BKF</option>
                                            <option value="BPPK"
                                                <?php 
                                                    if ($bast->unit == 'BPPK') {
                                                        echo 'selected';
                                                    }
                                                ?>
                                            >BPPK</option>
                                            <option value="LUAR_KEMENKEU"
                                                <?php 
                                                    if ($bast->unit == 'LUAR_KEMENKEU') {
                                                        echo 'selected';
                                                    }
                                                ?>
                                            >LUAR KEMENKEU</option>
                                        </select>
                                        @if($errors->has('unit'))
                                            <strong class="text-danger"> {{$errors->first('unit')}} </strong>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <label class="form-control-label" for="alokasihostname">Alokasi Hostname VM : </label>
                                <select name="alokasihostname[]" class="form-control selectpicker" multiple="multiple" multiple data-live-search="true">
                                    <option value="" class="disable selected">Pilih Unit</option>
                                    @foreach($alokasihostnames as $row)
                                        <option value="{{$row->id}}">({{$row->hostname}} \ {{$row->description}} \ {{$row->ip}} \ {{$row->unit}})</option>
                                    @endforeach
                                </select>
                                @if($errors->has('alokasihostname'))
                                    <strong class="text-danger"> {{$errors->first('alokasihostname')}} </strong>
                                @endif
                            </div> --}}
                            
                            <div class="pl-lg-4">
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

