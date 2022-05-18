@extends('layouts.frontend')

@section('content')
 <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Pendaftaran</h2>
           <ol class="breadcrumb">
            <li><a href="/">Home</a></li>            
            <li class="active">Pendaftaran</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->

 <!-- Start contact  -->
 <section id="mu-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-contact-area">
          <!-- start title -->
          <div class="mu-title">
            <h2>Pendaftaran Online <br>
              Bergabung bersama kami</h2>
            <p>Dengan kurikulum yang update dengan kebutuhan pasar, Kami menjamin lulusan akan mudah terserap di dunia kerja.</p>
          </div>
          <!-- end title -->
          <!-- start contact content -->
          <div class="mu-contact-content">           
            <div class="row">
            <div class="col-md-5">
                <div class="mu-contact-right">
                <img src="{{asset('/frontend')}}/assets/img/calculator-image.png" alt="">
          
                </div>
              </div>
              <div class="col-md-6">
                <div class="mu-contact-left">
                  <!-- <form class="contactform">-->
                    <h4 class="pb-20 text-center mb-30" ><b>Formulir Pendaftaran</b></h4>
                  {!! Form::open(['url' => '/postregister', 'class' => 'contactform']) !!}
                    {!! Form::text('nama_depan', '', ['class' => 'comment-form-url', 'placeholder' => 'Nama Lengkap']) !!}
                    {!! Form::text('nama_belakang', '', ['class' => 'comment-form-url', 'placeholder' => 'Nama Belakang']) !!}
                    {!! Form::email('email', '', ['class' => 'comment-form-url', 'placeholder' => 'Email']) !!}
                    {!! Form::password('password', ['class' => 'comment-form-url', 'placeholder' => 'Password']) !!}
                    {!! Form::text('agama', '', ['class' => 'comment-form-url', 'placeholder' => 'Agama']) !!}
                    {!! Form::textarea('alamat', '', ['class' => 'comment-form-url', 'placeholder' => 'Alamat']) !!}
                    <div class="form-select" id="service-select"></div>
                    {!! Form::select('jenis_kelamin', ['' => 'Pilih Jenis Kelamin', 'L' => 'Laki-laki', 'P' => 'Perempuan'], 'L'); !!}
                    </div>
                    <button class="mu-post-btn" style=" text-align: center;" >Submit</button>
                                 
                    <!-- <p class="form-submit">
                      <input type="submit" value="Send Message" class="mu-post-btn" name="submit">
                    </p>         -->
                  {!! Form::close() !!}
                </div>
              </div>
              
            </div>
          </div>
          <!-- end contact content -->
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End contact  -->
 
@endsection