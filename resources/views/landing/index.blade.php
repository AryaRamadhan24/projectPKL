<!DOCTYPE html>
<html lang="en">

@include('landing.css')

<body>

  <!-- ======= Header ======= -->
@include('landing.navbar')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Welcome to E-Arsip</h1>
      <h2>Website Arsip Data Penduduk</h2>
      <a href="{{ route('login') }}" class="btn-get-started">LOGIN</a>
    </div>
  </section>
  <!-- End Hero Section -->

  <main id="main">

 {{-- {{-- <!-- ======= About Section ======= --> --}}
 <section id="about">
    <div class="container" data-aos="fade-up">
      <div class="row about-container">

        <div class="col-lg-6 content order-lg-1 order-2">
          <h2 class="title">Few Words About Us</h2>
          <p>
            E-Arsip merupakan sebuah layanan penghimpun data penduduk berbasis website yang ditujukan kepada masyarakat Desa Jambangan Kabupaten Malang
          </p>

          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></div>
            <h4 class="title"><a href="">Filling Kartu Tanda Penduduk</a></h4>
            <p class="description">Pada fitur ini diharapkan masyarakat dapat membantu pengarsipan KTP yang akan dimonitoring oleh pihak perangkat desa </p>
          </div>

          <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="fa fa-refresh fa-spin fa-3x fa-fw"></i></div>
            <h4 class="title"><a href="">Filling Kartu Keluarga</a></h4>
            <p class="description">Pada fitur ini diharapkan masyarakat dapat membantu pengarsipan KK yang akan dimonitoring oleh pihak perangkat desa</p>
          </div>

          <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i></div>
            <h4 class="title"><a href="">Filling Buku Nikah</a></h4>
            <p class="description">Pada fitur ini diharapkan masyarakat dapat membantu pengarsipan Buku Nikah yang akan dimonitoring oleh pihak perangkat desa</p>
          </div>

        </div>

        <div class="col-lg-6 background order-lg-2 order-1" data-aos="fade-left" data-aos-delay="100"></div>
      </div>

    </div>
  </section>
  <!-- End About Section -->

    <!-- ======= Team Section ======= -->
    <section id="team">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Team</h3>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="pic"><img src="{{asset('Landingpage/img/Kominfo.jpg')}}" alt=""></div>
              <h4>Tri D.S</h4>
              <span>Pembimbing</span>
              <div class="social">
                <a href="https://twitter.com/KominfoMalang?s=20"><i class="fa fa-twitter"></i></a>
                <a href="https://www.facebook.com/kominfomalang/"><i class="fa fa-facebook"></i></a>
                <a href="mailto:kominfo@malangkota.go.id"><i class="fa fa-google-plus"></i></a>
                <a href="https://www.instagram.com/kominfomalang/"><i class="fa fa-instagram"></i></a>
                <a href="https://wa.me/6281249572288"><i class="fa fa-whatsapp "></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="pic"><img src="{{asset('Landingpage/img/Arya.jpg')}}" alt=""></div>
              <h4>M. Arya Ramadhan</h4>
              <span>Project Manager</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href="https://www.facebook.com/arya.ramadhan.5030"><i class="fa fa-facebook"></i></a>
                <a href="mailto:182410102035@cs.unej.ac.id"><i class="fa fa-google-plus"></i></a>
                <a href="https://www.instagram.com/aryaramadhan24/"><i class="fa fa-instagram"></i></a>
                <a href="https://wa.me/628992727299"><i class="fa fa-whatsapp "></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="pic"><img src="{{asset('Landingpage/img/Ali.jpeg')}}" alt=""></div>
              <h4>Saifur Rifqi Ali</h4>
              <span>Front-end Developer</span>
              <div class="social">
                <a href="https://twitter.com/Aliie_25"><i class="fa fa-twitter"></i></a>
                <a href="https://www.facebook.com/riefqhi.alhie"><i class="fa fa-facebook"></i></a>
                <a href="mailto:saifurrifqi9@gmail.com"><i class="fa fa-google-plus"></i></a>
                <a href="https://www.instagram.com/aliie_25/"><i class="fa fa-instagram"></i></a>
                <a href="https://wa.me/628970666848"><i class="fa fa-whatsapp "></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="400">
              <div class="pic"><img src="{{asset('Landingpage/img/Gundho.jpeg')}}" alt=""></div>
              <h4>Miantoko Gundho P.N</h4>
              <span>Back-end Developer</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href="https://www.facebook.com/profile.php?id=100009883663580"><i class="fa fa-facebook"></i></a>
                <a href="mailto:gundho20@gmail.com"><i class="fa fa-google-plus"></i></a>
                <a href="https://www.instagram.com/miantoko_gundho/"><i class="fa fa-instagram"></i></a>
                <a href="https://wa.me/62895360438041"><i class="fa fa-whatsapp "></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>UNEJ5</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
      -->
        Designed by <a href="#">UNIVERSITAS JEMBER</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a> --}}

@include('landing.js')

</body>

</html>
