<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Kode Area</label>
                        <input type="text" name="kode_area" value="{{ old('kode_area') }}" class="form-control">
                        @error('kode_area')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nama Pekerjaan</label>
                        <input type="text" name="nama_pekerjaan" value="{{ old('nama_pekerjaan') }}" class="form-control">
                        @error('nama_pekerjaan')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" value="{{ old('lokasi') }}" class="form-control">
                        @error('lokasi')
                        <div class="text-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                </div>
        </div>   
            
    </div>
</div>