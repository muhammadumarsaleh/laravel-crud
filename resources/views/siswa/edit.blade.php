@extends('layouts.main')

@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Inputs</h3>
                                </div>
                                <div class="panel-body">
                                <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
                                        @csrf 
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                                                    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{ $siswa->nama_depan }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                                                    <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{ $siswa->nama_belakang }}">
                                                </div>

                                                <div class="mb-3">
                                                         <div class="mb-3">
                                                        <label >Jenis Kelamin</label>
                                                        </div>
                                                        <div>
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>
                                                        <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                                        
                                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>
                                                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                                        </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="Agama" class="form-label">Agama</label>
                                                    <input name="agama" type="text" class="form-control" id="Agama" aria-describedby="emailHelp" placeholder="Agama" value="{{ $siswa->agama }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Alamat">Alamat</label>
                                                    <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat" id="Alamat" style="height: 100px">{{ $siswa->alamat }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="avatar">Avatar</label>
                                                    <input type="file" name="avatar" class="form-control" id="avatar">
                                                </div>
                                           
                                                    <button type="submit" class="btn btn-warning">Update</button>
                                     </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection



