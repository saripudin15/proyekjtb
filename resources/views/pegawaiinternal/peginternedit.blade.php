@extends('layouts.master')
@section('title','masterdata')

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <form action="{{ route('updatepegawaiinternal', $data_pegintern->id) }}" method="post">
                    @method('patch')
                    @csrf
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label>Kode Pegawai</label>
                            <input type="text" name="kode_pegintern" @if(old('kode_pegintern')) value="{{ old('kode_pegintern') }}" @else value="{{ $data_pegintern->kode_pegintern }}" @endif class="form-control">
                            @error('kode_pegintern')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <input type="text" name="nama_pegintern" value="{{ $data_pegintern->nama_pegintern }}" class="form-control">
                            @error('nama_pegintern')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label class="d-block">Jenis Kelamin</label>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="laki-laki" {{ $data_pegintern->jenis_kelamin == 'laki-laki' ? 'checked' : '' }} >
                            <label class="form-check-label" for="laki-laki">
                                Laki-Laki
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" {{ $data_pegintern->jenis_kelamin == 'perempuan' ? 'checked' : '' }} >
                            <label class="form-check-label" for="perempuan">
                                Perempuan
                            </label>
                            </div>
                            @error('jenis_kelamin')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select class="form-control" name="jabatan">
                            <option value="manajer proyek" {{ $data_pegintern->jabatan == 'manajer proyek' ? 'selected' : '' }}>Manajer Proyek</option>
                            <option value="asisten manajer proyek" {{ $data_pegintern->jabatan == 'asisten manajer proyek' ? 'selected' : '' }}>Asisten Manajer Proyek</option>
                            <option value="koordinator keuangan" {{ $data_pegintern->jabatan == 'koordinator keuangan' ? 'selected' : '' }}>Koordinator Keuangan</option>
                            <option value="koordinator hse" {{ $data_pegintern->jabatan == 'koordinator hse' ? 'selected' : '' }}>Koordinator HSE</option>
                            <option value="koordinator humas" {{ $data_pegintern->jabatan == 'koordinator humas' ? 'selected' : '' }}>Koordinator Humas</option>
                            </select>
                            @error('jabatan')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>No Handphone</label>
                            <input type="text" name="no_hp" value="{{ $data_pegintern->no_hp }}" class="form-control">
                            @error('no_hp')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" value="{{ $data_pegintern->email }}" class="form-control">
                            @error('email')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat">{{ $data_pegintern->alamat }}</textarea>
                            @error('alamat')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary mr-1" type="submit" value="submit">Update</button>
                        </div>
                   
                    </div>
                </form>
            </div>
                
                
        </div>
    </div>
</div>
@endsection

@push('page-scripts')

@endpush