@extends('layouts.main')

@section('container')
<section id="contact" class="contact">
<header class="section-header mt-5">
    <p>Please Login</p>
  </header>
<div class="container" data-aos="fade-up">

  <div class="row gy-12 justify-content-center ">

  <div class="col-lg-4">
  @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif



    <form action="/login" method="post">
          @csrf
          <div class="col-md-12 mb-3">
          <label for="nik" class="mb-2">NIK</label>
            <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"name="nik" placeholder="Please input your NIK..." autofocus required value="{{ old('nik') }}">
              @error('nik')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror 
          </div>

          <div class="col-md-12 mb-3">
          <label for="password" class="mb-2">Pssword</label>
            <input type="password" class="form-control" name="password" placeholder="Please input your Password..." required>
            @error('password')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>        
            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
          </form>

    </div>

  </div>

</div>

</section>
@endsection
<!-- <div class="row justify-content-center">
    <div class="col-md-4">

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


        <main class="form-signin">
        <h1 class="h3 mb-3 fw-normal">Please Login</h1>
          <form action="/login" method="post">
          @csrf
            <div class="form-floating">
              <input type="nik" name="nik" class="form-control" id="nik" placeholder="name@example.com" autofocus required value="{{ old('nik') }}">
              @error('nik')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
              @error('password')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            </div>
        
            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
          </form>
    <form>
    <small class="d-block text-center mt-3"> Not Registered <a href="/register">Register Now</a></small>
</from>
        </main>
    </div>
</div> -->


