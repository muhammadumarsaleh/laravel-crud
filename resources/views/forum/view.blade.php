@extends('layouts.main')
@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-headline">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{$forum->judul}}</h3>
                                <p class="panel-subtitle">{{$forum->created_at->diffForHumans()}}</p>
                            </div>
                            <div class="panel-body">
                                <p>{!! $forum->konten !!}</p>
                                <hr>
                                <div class="btn-group">
                                    <button class="btn btn-default"><i class="lnr lnr-thumbs-up"></i>Suka</button>
                                    <button class="btn btn-default" id="btn-komentar-utama"><i class="lnr lnr-bubble"></i>Komentar</button>
                                </div>
                                <form action="" method="POST" style="margin-top:10px;display:none;" id="komentar-utama">
                                @csrf
                                <input type="hidden" name="forum_id" value="{{$forum->id}}">
                                <input type="hidden" name="parent" value="0">
                                <textarea name="konten" class="form-control" id="komentar-utama" rows="4" placeholder="Masukkan komentar"></textarea>
                                <button class="btn btn-primary">Kirim</button>
                                </form>
                                <h3>Komentar</h3>

                                <ul class="list-unstyled activity-list">
                                    @foreach($forum->komentar()->where('parent', 0)->orderBy('created_at', 'desc')->get() as $komentar)
										<li>
											<img src="{{$komentar->user->siswa->getAvatar()}}" alt="Avatar width="33" height="44"" class="img-circle pull-left avatar">
											<p><a href="#">{{ $komentar->user->siswa->namaLengkap() }}</a> <br>
                                            {{ $komentar->konten }}
                                            <span class="timestamp">{{$komentar->created_at->diffForHumans()}}</span></p>
                                            <form action="" method="POST" style="padding-left:3.5em;">
                                            @csrf
                                            <input type="hidden" name="forum_id" value="{{$forum->id}}">
                                            <input type="hidden" name="parent" value="{{$komentar->id}}">
                                                <input type="text" name="konten" class="form-control">
                                                <button class="btn btn-primary btn-xs">Kirim</button>
                                            </form>
                                            <br>
                                            @foreach($komentar->childs()->orderBy('created_at', 'desc')->get() as $child)
                                            <ul class="parent">
                                                <li class="replay-comments"style="list-style-type: none;">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <img src="{{$child->user->siswa->getAvatar()}}" alt="Avatar width="33" height="44"" class="img-circle pull-left avatar">
                                                        </div>
                                                        <div class="media-body">
                                                            <p><a href="#">{{ $child->user->siswa->namaLengkap() }}</a><br>
                                                            {{ $child->konten }}
                                                            <span class="timestamp">{{$child->created_at->diffForHumans()}}</span></p>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            @endforeach
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

@endsection

@section('footer')
    <script>
        $(document).ready(function() {
            $('#btn-komentar-utama').click(function() {
                $('#komentar-utama').toggle('slide')();
            });
        });
    </script>
@endsection