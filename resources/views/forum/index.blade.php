@extends('layouts.main')
@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Forum</h3>
                            <!-- @if(session('sukses'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('sukses') }}
                                </div>
                            @endif -->
                            <div class="right">
                            <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah Mahasiswa</a>
                            </div>
                        </div>
                            <div class="panel-body">
									<ul class="list-unstyled activity-list">
                                        @foreach($forum as $frm)
										<li>
											<img src="{{ $frm->user->siswa->getAvatar() }}" alt="Avatar" class="img-circle pull-left avatar">
											<p><a href="/forum/{{ $frm->id }}/view">{{ $frm->user->name }} : {{ $frm->judul }} </a><span class="timestamp">{{ $frm->created_at->diffForHumans() }}</span></p>
										</li>
                                        @endforeach
									</ul>
                        </div>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><strong>Tambah Forum</strong></h4>
      </div>
      <div class="modal-body">
      <form action="/forum/create" method="POST">
                    {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Judul</label>
                                <input name="judul" type="text" class="form-control @error('judul') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Judul" required autofocus value="{{ old('judul') }}">
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                        <label for="floatingTextarea2">konten</label>
                                        <textarea name="konten" class="form-control @error('konten') is-invalid @enderror" placeholder="Masukkan konten" id="konten" style="height: 100px">{{ old('konten') }}</textarea>
                                        @error('konten')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                          
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection