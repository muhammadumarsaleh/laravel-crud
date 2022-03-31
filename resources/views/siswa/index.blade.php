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
                                        <td><a href="/siswa/{{$siswa->id}}/profile">{{ $siswa->nama_depan }}</a></td>
                                        <td><a href="/siswa/{{$siswa->id}}/profile">{{ $siswa->nama_belakang }}</a></td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true"></span>
                     </button>
                </div>
                <div class="modal-body">
                <form action="/siswa/create" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                                <input name="nama_depan" type="text" class="form-control @error('nama_depan') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" required autofocus value="{{ old('nama_depan') }}">
                                @error('nama_depan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail2" class="form-label">Nama Belakang</label>
                                <input name="nama_belakang" type="text" class="form-control @error('nama_belakang') is-invalid @enderror" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{ old('nama_belakang') }}">
                                @error('nama_belakang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Email" class="form-label">Email</label>
                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="Email" aria-describedby="emailHelp" placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                <label >Jenis Kelamin</label>
                                </div>
                                <div>
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="L" {{ (old('jenis_kelamin') == 'L') ? 'selected' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                            
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="P" {{ (old('jenis_kelamin') == 'P') ? 'selected' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label for="exampleInputEmail3" class="form-label">Agama</label>
                                <input name="agama" type="text" class="form-control @error('agama') is-invalid @enderror" id="exampleInputEmail3" aria-describedby="emailHelp" place holder="Agama" value="{{ old('agama') }}">
                                @error('agama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="floatingTextarea2">Alamat</label>
                                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan Alamat" id="floatingTextarea2" style="height: 100px">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" id="avatar">
                                @error('avatar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
