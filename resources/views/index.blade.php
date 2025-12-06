@extends('layouts.app')

@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
        <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
            <div class="carousel-item active">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">
                        <span>Sistem Pakar</span>
                    </h2>
                    <p class="animate__animated animate__fadeInUp">
                        Diagnosa Kerusakan Sepeda Motor Honda Vario 150 Menggunakan Metode Backward Chaining
                    </p>
                    <a href="{{ route('page.diagnosa') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">
                        Diagnosa Sekarang
                    </a>
                </div>
            </div>
        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28" preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s58 18 88 18 58-18 88-18 58 18 88 18v44h-352z"></path>
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255,.1)"></use>
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255,.2)"></use>
            </g>
        </svg>
    </section>
    <!-- End Hero -->

    <!-- ======= AHASS Section ======= -->
    <section id="about-ahass" class="py-5 bg-white">
        <div class="container py-5">
            <div class="row align-items-center g-5">

                <!-- Image -->
                <div class="col-12 col-lg-6" data-aos="fade-right">
                    <div class="position-relative">
                        <img src="/img/ahass.jpg" alt="AHASS Professional Service"
                             class="img-fluid rounded-4 shadow-lg w-100">

                        <div class="position-absolute top-0 start-0 m-4">
                            <span class="badge bg-primary-custom text-white px-3 py-2 rounded-pill fw-semibold">
                                PARTNER RESMI
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Text -->
                <div class="col-12 col-lg-6" data-aos="fade-left">

                    <div class="mb-4">
                        <span class="badge bg-dark text-white px-4 py-2 rounded-pill fs-6 fw-semibold mb-4">
                            STANDAR BENGKEL RESMI
                        </span>
                    </div>

                    <h2 class="display-5 fw-bold text-dark mb-4">
                        Berstandar <span class="text-primary-custom">AHASS</span> Professional
                    </h2>

                    <p class="fs-5 text-secondary mb-4 lh-lg">
                        AHASS (Astra Honda Authorized Service Station) merupakan jaringan bengkel resmi Honda terbesar di
                        Indonesia dengan lebih dari 4.500 outlet di seluruh nusantara.
                    </p>

                    <p class="text-secondary mb-4 lh-lg">
                        Platform pembelajaran ini dikembangkan berdasarkan standar operasional dan pengalaman nyata dari bengkel AHASS, 
                        memastikan siswa SMK mempelajari prosedur yang sesuai dengan standar industri profesional.
                    </p>

                    <div class="row g-3 mb-5">
                        <div class="col-12">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary-custom rounded-circle d-flex align-items-center justify-content-center me-3"
                                     style="width: 32px; height: 32px;">
                                    <i class="fas fa-check text-white" style="font-size: 0.8rem;"></i>
                                </div>
                                <span class="fw-semibold text-dark">
                                    Materi sesuai dengan prosedur teknis AHASS
                                </span>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary-custom rounded-circle d-flex align-items-center justify-content-center me-3"
                                     style="width: 32px; height: 32px;">
                                    <i class="fas fa-check text-white" style="font-size: 0.8rem;"></i>
                                </div>
                                <span class="fw-semibold text-dark">
                                    Siap kerja di bengkel resmi Honda setelah lulus
                                </span>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary-custom rounded-circle d-flex align-items-center justify-content-center me-3"
                                     style="width: 32px; height: 32px;">
                                    <i class="fas fa-check text-white" style="font-size: 0.8rem;"></i>
                                </div>
                                <span class="fw-semibold text-dark">
                                    Sertifikat kompetensi yang diakui industri
                                </span>
                            </div>
                        </div>
                    </div>

                    <a href="https://www.astra-honda.com/ahass" target="_blank"
                       class="btn btn-primary-custom btn-lg px-4 py-3 rounded-pill fw-bold">
                        <i class="fas fa-external-link-alt me-2"></i>
                        Kunjungi Website AHASS
                    </a>
                </div>

            </div>
        </div>
    </section>
    <!-- End AHASS Section -->

    <!-- ======= Values Section ======= -->
    <section id="values" class="values">
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <header class="section-header">
                <h2>Panduan</h2>
                <p>Pilih Kerusakan dan Rekomendasi Perbaikan Sepeda Motor Anda</p>
            </header>
        </div>
    </section>
    <!-- End Values Section -->

@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.2.0/swiper-bundle.css"
          integrity="sha512-Lc4aT4sbiVWDTSgqn3lf5kwKECm7rU45AReUS9WI2k4yRPSKtS+kJ9aV1jrxDUIyetNFRYZ3U2gR6WWbtWbIfA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('scripts')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.2.0/swiper-bundle.min.js"
            integrity="sha512-KBCt3sdFOcFtYTgEfE3uJckVpvPr1w8HPugyPgHFE/4iJOwhwj6eSaF27bDJTHRX2jyA..."
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        AOS.init();
    </script>
@endsection
