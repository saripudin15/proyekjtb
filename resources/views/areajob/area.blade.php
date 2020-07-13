@extends('layouts.master')
@section('title','masterdata')

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
           @if($data_area)
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
           @endif
            <hr>
            @if (session('message'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                  </button>
                  {{ session('message') }}
                </div>
              </div>
                
            @endif
            <table class="table table-striped table-bordered table-sm">
                <tr>
                    <th>Nomor</th>
                    <th>Kode Area</th>
                    <th>Nama Pekerjaan</th>
                    <th>Lokasi</th>
                    <th>Action</th>
                </tr>
                @foreach ($data_area as $no => $hasil)
                    <tr>
                        <td>{{ $data_area->firstItem()+$no }}</td>
                        <td>{{ $hasil->kode_area }}</td>
                        <td>{{ $hasil->nama_pekerjaan }}</td>
                        <td>{{ $hasil->lokasi }}</td>
                        <td>
                            <a href="#" data-id="{{ $hasil->id }}" class="badge badge-success" data-target="#myEdit">Edit</a>
                            <a href="#" data-id="{{ $hasil->id }}" class="badge badge-danger swal-confirm">
                                <form action="{{ route('hapusarea', $hasil->id) }}" id="delete{{ $hasil->id }}" method="POST">
                                @csrf
                                @method('delete')
                                </form>
                                Hapus
                            </a> 
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $data_area->links() }}
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Area Pekerjaan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('simpanarea') }}" method="post">
            @csrf
            <div class="modal-body">
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
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" value="submit">Simpan</button>
            </div>
        </form>
      </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="myEdit">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Area Pekerjaan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ ('area/{id}/edit') }}" method="post">
            @csrf
            <div class="modal-body">
               
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" value="submit">Simpan</button>
            </div>
        </form>
      </div>
    </div>
</div>
@endsection


@push('before-scripts')
<script src="{{ asset('assets/js/prism.js') }}"></script>
@endpush

@push('page-scripts')

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@push('after-scripts')
<script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
<script>
    $(".swal-confirm").click(function(e) {
    id = e.target.dataset.id;
    swal({
        title: 'Yakin mau hapus data ?',
        text: 'Data yang terhapus tidak bisa dikembalikan!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
        //swal('Poof! Your imaginary file has been deleted!', {
          //icon: 'success',
        //});
        $(`#delete${id}`).submit();
        } else {
        //swal('Your imaginary file is safe!');
        }
      });
  });

  $('.goblog').on('click', function(){
    console.log($(this).data('id'))
    let id = $(this).data('id')
    $.ajax({
        url:`/area/${id}/edit`,
        method:"GET",
        success: function(data){
            console.log(data)
           
            $('#goblog-edit').find('.modal-body').html(data)
            $('#goblog-edit').modal('show')
        
        },
        error:function(error){
            console.log(error)
        }
    })

  })
</script>
@endpush