<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>BUK Alumni</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('img/logo.ico') }}" rel="icon">
    <link href="{{ asset('img/logo.ico') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

          <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
           {{-- <img src="img/logo.png" alt=""> --}}
            <h1 style="color: skyblue; text-height:10px"><b> Bayero University Kano Alumni Association<span>.</span></b></h1>
          </a>

          <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
          <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
          <nav id="navbar" class="navbar">
            <ul>
              <li><a href="{{ url('/') }}" class="active">Home</a></li>
              <li><a href="{{ url('/alumni') }}">Alumni</a></li>
              <li><a href="{{ url('/chapters') }}">Chapters</a></li>
              <li><a href="{{ url('/job-adverts') }}">Job Adverts</a></li>
              <li><a href="{{ url('/news-events') }}">News & Events</a></li>
              <li><a href="{{ url('/about') }}">About</a></li>
              <li><a href="{{ url('/contact') }}">Contact Us</a></li>
            </ul>
          </nav><!-- .navbar -->


        </div>
      </header><!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('img/bukaa6.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>BUK Alumni</h2>
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>BUK Alumni</li>
                </ol>
            </div>
        </div><!-- End Breadcrumbs -->

<!-- ======= Alumni Section ======= -->
<section id="alumni" class="alumni">
    <div class="container" data-aos="fade-up">

      <!-- Section Header -->
      <div class="section-header">
        <h2>Notable Alumni</h2>
        <p>The Bayero University Kano (BUK) Alumni Association is proud of its distinguished alumni who have made significant contributions in various fields. Here are some of the notable individuals who continue to inspire and represent the values of BUK globally.</p>
      </div>

      <!-- Featured Alumni Section -->
      <div class="featured-alumni mb-5">
        <h3>Featured Alumni</h3>
        <div class="row">
          <!-- Featured Alumni 1 -->
          <div class="col-lg-4">
            <div class="card">
              <img src="img/alumni.jpeg" class="card-img-top img-fluid" alt="Featured Alumni Image" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5 class="card-title">Dr. Amina Bello</h5>
                <p class="card-text">Renowned Neuroscientist and Global Health Advocate.</p>
                <a href="#" class="btn btn-primary btn-sm">View Full Profile</a>
              </div>
            </div>
          </div>

          <!-- Featured Alumni 2 -->
          <div class="col-lg-4">
            <div class="card">
              <img src="img/alumni2.jpeg" class="card-img-top img-fluid" alt="Featured Alumni Image" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5 class="card-title">Engr. Yusuf Abdullahi</h5>
                <p class="card-text">CEO of Tech Innovations Ltd and IT Industry Leader.</p>
                <a href="#" class="btn btn-primary btn-sm">View Full Profile</a>
              </div>
            </div>
          </div>

          <!-- Featured Alumni 3 -->
          <div class="col-lg-4">
            <div class="card">
              <img src="img/alumni3.jpeg" class="card-img-top img-fluid" alt="Featured Alumni Image" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5 class="card-title">Prof. Sani Ahmed</h5>
                <p class="card-text">Distinguished Professor of Political Science and Author.</p>
                <a href="#" class="btn btn-primary btn-sm">View Full Profile</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Notable Alumni Cards -->
      <div class="row">

        <h3>Celebrated Alumni</h3>
        <!-- Alumni 1 -->
        <div class="col-lg-4 mb-4">
          <div class="card">
            <img src="img/alumni3.jpeg" class="card-img-top img-fluid" alt="Alumni Image" style="height: 150px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">Dr. Ibrahim Musa</h5>
              <p class="card-text">Expert in Renewable Energy Solutions.</p>
              <a href="#" class="btn btn-primary btn-sm">View Full Profile</a>
            </div>
          </div>
        </div>

        <!-- Alumni 2 -->
        <div class="col-lg-4 mb-4">
          <div class="card">
            <img src="img/alumni2.jpeg" class="card-img-top img-fluid" alt="Alumni Image" style="height: 150px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">Hajia Fatima Sani</h5>
              <p class="card-text">International Development Specialist.</p>
              <a href="#" class="btn btn-primary btn-sm">View Full Profile</a>
            </div>
          </div>
        </div>

        <!-- Alumni 3 -->
        <div class="col-lg-4 mb-4">
          <div class="card">
            <img src="img/alumni.jpeg" class="card-img-top img-fluid" alt="Alumni Image" style="height: 150px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">Mr. John Okafor</h5>
              <p class="card-text">CEO of Finance Solutions Africa.</p>
              <a href="#" class="btn btn-primary btn-sm">View Full Profile</a>
            </div>
          </div>
        </div>

        <!-- Alumni 4 -->
        <div class="col-lg-4 mb-4">
          <div class="card">
            <img src="img/alumni.jpeg" class="card-img-top img-fluid" alt="Alumni Image" style="height: 150px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">Mrs. Zainab Aliyu</h5>
              <p class="card-text">Human Rights Lawyer and Activist.</p>
              <a href="#" class="btn btn-primary btn-sm">View Full Profile</a>
            </div>
          </div>
        </div>

        <!-- Alumni 5 -->
        <div class="col-lg-4 mb-4">
          <div class="card">
            <img src="img/alumni2.jpeg" class="card-img-top img-fluid" alt="Alumni Image" style="height: 150px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">Dr. Abdullahi Usman</h5>
              <p class="card-text">Cardiologist and Medical Researcher.</p>
              <a href="#" class="btn btn-primary btn-sm">View Full Profile</a>
            </div>
          </div>
        </div>

        <!-- Alumni 6 -->
        <div class="col-lg-4 mb-4">
          <div class="card">
            <img src="img/alumni3.jpeg" class="card-img-top img-fluid" alt="Alumni Image" style="height: 150px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title">Mr. Musa Abdulkadir</h5>
              <p class="card-text">Innovator in Agriculture Technology.</p>
              <a href="#" class="btn btn-primary btn-sm">View Full Profile</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Alumni Section -->




    </main><!-- End #main -->

    <footer id="footer" class="footer">

        <div class="footer-content position-relative">
          <div class="container">
            <div class="row">

              <div class="col-lg-4 col-md-6">
                <div class="footer-info">
                  <h3>Bayero University Alumni Association(BUKAA)</h3>
                  <p>
                    Alumni Office, BUK New Campus <br>
                    Behind Mahmud Tukur Theatre<br><br>
                    <strong>Phone:</strong> +234 80 000 000<br>
                    <strong>Email:</strong> contactbukaa@buk.edu.ng<br>
                  </p>
                  <div class="social-links d-flex mt-3">
                    <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div><!-- End footer info column-->

              <div class="col-lg-2 col-md-3 footer-links">
                <h4>Useful Links</h4>
                <ul>
                  <li><a href="{{ url('/alumni') }}">Alumni</a></li>
                  <li><a href="{{ url('/chapters') }}">Chapters</a></li>
                  <li><a href="{{ url('/job-adverts') }}">Job Adverts</a></li>
                  <li><a href="{{ url('/news-events') }}">News & Events</a></li>
                  <li><a href="{{ url('/about') }}">About</a></li>
                  <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                </ul>
              </div><!-- End footer links column-->

            </div>
          </div>
        </div>

        <div class="footer-legal text-center position-relative">
          <div class="container">
            <div class="copyright">
              &copy; Copyright <strong><span>Bayero University Alumni Association (BUKAA)</span></strong>. All Rights Reserved
            </div>

          </div>
        </div>

      </footer>
      <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
