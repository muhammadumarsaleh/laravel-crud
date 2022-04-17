@extends('layouts.main')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Postingan</h3>
                            <!-- @if(session('sukses'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('sukses') }}
                                </div>
                            @endif -->
                            <div class="right">
                            <a href="/posts/add" class="btn btn-sm btn-primary">Add new post</a>
                    
                            </div>
                        </div>
                            <div class="panel-body">
                             <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>TITLE</th>
                                        <th>USER</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->user_id}}</td>
                                        <td>
                                        <a href="/posts/{{$post->slug}}" class="btn btn-info btn-sm">View</a>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm delete" >Delete</a>
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
