@extends('layouts.main')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add New Post</h3>
                        </div>
                        <div class="panel-body">
                             <div class="row">
                                <div class="col-md-8">
                                <form action="/posts/create" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label">Title</label>
                                        <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" required autofocus value="{{ old('title') }}">
                                        @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="floatingTextarea2">Content</label>
                                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" placeholder="Masukkan content" id="content" style="height: 100px">{{ old('content') }}</textarea>
                                        @error('content')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="thumbnail">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                    <div class="input-group">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  
@endsection

@section('footer')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector('#content') )
        .catch( error => {
            console.error(error);
        } );

        $(document).ready(function(){
            $('#lfm').filemanager('image');
        });
    </script>

@endsection