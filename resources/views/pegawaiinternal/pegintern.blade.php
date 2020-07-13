@extends('layouts.master')
@section('title','masterdata')

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <a href="{{ route('tambahpegawaiinternal') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit">Tambah Data</i></a>
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
                    <th>Kode Pegawai</th>
                    <th>Nama Pegawai</th>
                    <th>Jenis Kelamin</th>
                    <th>Jabatan</th>
                    <th>No Hp</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
                @foreach ($data_pegintern as $no => $hasil)
                    <tr>
                        <td>{{ $data_pegintern->firstItem()+$no }}</td>
                        <td>{{ $hasil->kode_pegintern }}</td>
                        <td>{{ $hasil->nama_pegintern }}</td>
                        <td>{{ $hasil->jenis_kelamin }}</td>
                        <td>{{ $hasil->jabatan }}</td>
                        <td>{{ $hasil->no_hp }}</td>
                        <td>{{ $hasil->email }}</td>
                        <td>{{ $hasil->alamat }}</td>
                        <td>
                            <a href="{{ route('editpegawaiinternal', $hasil->id) }}" class="badge badge-success">Edit</a>
                            <a href="#" data-id="{{ $hasil->id }}" class="badge badge-danger swal-confirm">
                                <form action="{{ route('hapuspegawaiinternal', $hasil->id) }}" id="delete{{ $hasil->id }}" method="POST">
                                @csrf
                                @method('delete')
                                </form>
                                Hapus
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $data_pegintern->links() }}
        </div>
    </div>
</div>
@endsection

@push('page-scripts')

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@push('after-scripts')
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
</script>
@endpush