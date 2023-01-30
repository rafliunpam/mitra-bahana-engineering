@extends('layouts.main')
@section('container')

<section id="home" class="hero d-flex align-items-center">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center">
        <h1 data-aos="fade-up">We offer services engaged in special consulting services</h1>
        <h2 data-aos="fade-up" data-aos-delay="400">For Mechanical and Electrical Audit & Fitting Out</h2>
        <div data-aos="fade-up" data-aos-delay="600">
          <div class="text-center text-lg-start">
            <a href="/about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
              <span>Get Started</span>
              <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
        <img src="/FlexStart/assets/img/home-img.png" class="img-fluid" alt="">
      </div>
    </div>
  </div>

</section>

@endsection

<!-- @section('container')
<link rel="stylesheet" href="/css/style.css">

    <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
        <h1>CEK STATUS TIKET PROYEK ANDA</h1>
        <h2>Cara Mudah Untuk Melacak Status Tiket Proyek Anda</h2>
        <div>
        <input type="text" class="form-control" id="no_tiket_proyek" name="no_tiket_proyek" value="">
     </div>
        </div>
        <div class="col-lg-6 hero-img">
          <img src="/image/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>    
@endsection -->


 