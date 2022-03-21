@extends('layouts.main')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Mahasiswa</h3>
                            <!-- @if(session('sukses'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('sukses') }}
                                </div>
                            @endif -->
                            <div class="right">
                                <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Tambah mahasiswa
                                </button>
                            <!-- <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button> -->
                            </div>
                            
                        </div>
                            <div class="panel-body">
                             <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NAMA DEPAN</th>
                                        <th>NAMA BELAKANG</th>
                                        <th>JENIS KELAMIN</th>
                                        <th>AGAMA</th>
                                        <th>ALAMAT</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_siswa as $siswa)
                                    <tr>
                                        <td>{{ $siswa->nama_depan }}</td>
                                        <td>{{ $siswa->nama_belakang }}</td>
                                        <td>{{ $siswa->jenis_kelamin }}</td>
                                        <td>{{ $siswa->agama }}</td>
                                        <td>{{ $siswa->alamat }}</td>
                                        <td>
                                        <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm delete" siswa-id="{{$siswa->id}}" >Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                </div>
                <div class="modal-body">
                <form action="/siswa/create" method="POST">
                    {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                                <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail2" class="form-label">Nama Belakang</label>
                                <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Nama Belakang">
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                <label >Jenis Kelamin</label>
                                </div>
                                <div>
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="L">
                                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                            
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="P">
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label for="exampleInputEmail3" class="form-label">Agama</label>
                                <input name="agama" type="text" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp" placeholder="Agama">
                            </div>
                            <div class="form-group">
                                <label for="floatingTextarea2">Alamat</label>
                                <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat" id="floatingTextarea2" style="height: 100px"></textarea>
                            </div>
                            
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
                </div>
            </div>
@endsection

@section('content1')

        <div class="row">
            <div class="col-6">
                <h1>Data Mahasiswa</h1>
            </div>

            <div class="col-6">
                    <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah mahasiswa
                    </button>
            </div>
            
            <table class="table table-hover">
                <tr>
                   
                </tr>
               
            </table>
        </div>
    </div>


@endsection
@section('footer')
<script>

    $('.delete').click(function(){
        var siswa_id = $(this).attr('siswa-id');

        Swal.fire({
        title: 'Yakin?',
        text: "Apakah anda yakin ingin menghapus siswa dengan id "+siswa_id+"!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {  
        if (result.isConfirmed) {
            window.location = "/siswa/"+siswa_id+"/delete";
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        }
        });
    }); 
</script>
@endsection