<div>
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <h1>Ecole de Gestion Informatique et de Commerce</h1>
            <h2>L’Ecole de Gestion d’Informatique et de Commerce, EGIC Ibn Sina, est une école de commerce située à
                Oran,
                en
                Algérie.</h2>
            @if (auth()->check())
                {{-- @if (auth()->user()->usertype == 3) --}}
                    <a href="/course" class="btn btn-get-started">Consultés Les Formations</a>
                {{-- @elseif(auth()->user()->usertype != 1) --}}
                    <div class="btn btn-get-started">
                        {{-- @livewire('checkstudient') --}}
                    </div>
                {{-- @endif --}}
            @else
                <a href="/login" class="btn btn-get-started">Bienvenu</a>
            @endif
        </div>
    </section>
    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                        <img src="Mentor/assets/img/illus1.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                        <h3>PRÉSENTATION.</h3>
                        <p class="fst-italic  ">
                        <ul>
                            <li><b><i class="bi bi-check-circle"></i> L’Ecole de Gestion d’Informatique et de
                                    Commerce,</b>
                                EGIC Ibn
                                Sina, est une école de commerce située à
                                Oran, en Algérie.</li>

                            <li><i class="bi bi-check-circle"></i> L’établissement offre à ses étudiants des formations
                                de
                                qualité
                                initiale, mais aussi des DESS, et
                                prochainement des licences et des mastères.</li>

                            <li><i class="bi bi-check-circle"></i> <b>Le projet pédagogique</b> de l’EGIC Ibn Sina
                                repose
                                sur son
                                histoire et ses traditions, et s’appuie sur
                                la qualité et l’éthique professionnelles dont elle a fait ses fondamentaux.</li>

                            <li><i class="bi bi-check-circle"></i> L’école forme des cadres de haut niveau aptes à
                                intervenir
                                efficacement dans la <b>gestion des entreprises
                                    et des services d’Etat.</b></li>
                        </ul>
                        </p>
                        <br>
                        <br>
                        <br>
                        <ul>
                            <li> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                            <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate
                                velit.</li>
                            <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.
                                Duis aute
                                irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu
                                fugiat
                                nulla pariatur.
                            </li>
                        </ul>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit
                            in
                            voluptate
                        </p>

                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts section-bg">
            <div class="container">

                <div class="row counters">

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="30" data-purecounter-duration="2"
                            class="purecounter"></span>
                        <p>Années d'expérience</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="2"
                            class="purecounter"></span>
                        <p>Courses</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="2"
                            class="purecounter"></span>
                        <p>Events</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="2"
                            class="purecounter"></span>
                        <p>Professeurs qualifiés et experts</p>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Partenariats Section ======= -->
        <section id="features" class="features Partenars">
            <div class="container" data-aos="fade-up">

                <!-- Client 2 - Bootstrap Brain Component -->
                <!--====== CLIENT LOGO PART START ======-->
                <section class="client-logo-area client-logo-one">
                    <!--======  Start Section Title Two ======-->
                    <div class="section-title-two">
                        <div class="container ">
                            <div class="row ">
                                <div class="col-6">
                                    <div class="content">
                                        <h2 class="fw-bold">Notre partenaire</h2>
                                        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                                        <p>
                                            Nous avons une longue histoire de formation, depuis notre création en 1993,
                                            et
                                            nous avons
                                            continuellement amélioré notre offre de formation en établissant des
                                            partenariats internationaux
                                            avec des institutions de renom telles que FEDE Europe, British Council,
                                            Education First, Global
                                            Entrepreneuriat Network et CISCO.
                                        </p>
                                        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                                    </div>
                                </div>
                                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="1000">
                                    <img src="Mentor/assets/img/illus2.png" class="img-fluid" alt="">
                                </div>

                            </div>
                            <!-- container -->
                        </div>
                        <!--====== End Section Title Two ======-->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3 col-6">
                                    <div class="single-client text-center">
                                        <img src="{{ asset('Mentor/assets/img/Partenariats/EF_Education_First_logo (1).png') }}"
                                            alt="Logo" width="100%" />
                                    </div>
                                    <!-- single client -->
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="single-client text-center">
                                        <img src="{{ asset('Mentor/assets/img/Partenariats/EF_Education_First_logo (1).png') }}"
                                            alt="Logo" width="100%" />
                                    </div>
                                    <!-- single client -->
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="single-client text-center">
                                        <img src="{{ asset('Mentor/assets/img/Partenariats/EF_Education_First_logo (1).png') }}"
                                            alt="Logo" width="100%" />
                                    </div>
                                    <!-- single client -->
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="single-client text-center">
                                        <img src="{{ asset('Mentor/assets/img/Partenariats/EF_Education_First_logo (1).png') }}"
                                            alt="Logo" width="100%" />
                                    </div>
                                    <!-- single client -->
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="single-client text-center">
                                        <img src="{{ asset('Mentor/assets/img/Partenariats/EF_Education_First_logo (1).png') }}"
                                            alt="Logo" width="100%" />
                                    </div>
                                    <!-- single client -->
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="single-client text-center">
                                        <img src="{{ asset('Mentor/assets/img/Partenariats/EF_Education_First_logo (1).png') }}"
                                            alt="Logo" width="100%" />
                                    </div>
                                    <!-- single client -->
                                </div>

                            </div>
                            <!-- row -->
                        </div>
                        <!-- container -->
                </section>
                <!--====== CLIENT LOGO PART ENDS ======-->

            </div>
        </section><!-- End Partenariats Section -->

        <!-- ======= type formation ======= -->
        <section id="features" class="features">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Formation</h2>
                    <p>Certificats les plus populaires</p>
                </div>
                <div class="row" data-aos="zoom-in" data-aos-delay="100">

                    <div class="col-lg-2 col-md-4">
                        <div class="row text-center icon-box m-2">
                            <i class="bi bi-patch-check pb-3" style="color: #1F76B9"></i>
                            <h3><a href=""></a></h3>
                        </div>
                    </div>


                </div>

            </div>
        </section><!-- End type formation Section -->

        <!-- ======= Popular formation Section ======= -->
        <section id="popular-courses" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Formation</h2>
                    <p>Nouvelle Formation</p>
                </div>

                <div class="row" data-aos="zoom-in" data-aos-delay="100">


                    <div class="col-lg-3   col-md-6 d-flex align-items-stretch">
                        <div class="course-item">
                            {{-- <img src="images/{{$formation->image_path}}" class="img-fluid" alt="..."> --}}
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>Web Development</h4>
                                    <p class="price display-6">Go</p>
                                </div>

                                <h3><a href=""></a>
                                </h3>
                                <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae
                                    dolores dolorem tempore.</p>
                                <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        {{-- <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid"
                                                 alt=""> --}}
                                        <span> DA</span>
                                    </div>
                                    <div class="trainer-rank d-flex align-items-center">
                                        <i class="bx bx-user"></i>&nbsp;50
                                        &nbsp;&nbsp;
                                        <i class="bx bx-heart"></i>&nbsp;65
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Course Item-->




                </div>
                <a href="" class=" get-started-btn mt-4">َAfficher le reste ...</a>

            </div>
        </section><!-- End Popular formation Section -->



        <!-- ======= Popular Event Section ======= -->
        <section id="popular-courses" class="courses event">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Evenement</h2>
                    <p>Nouvelle Evenement</p>
                </div>

                <div class="row" data-aos="zoom-in" data-aos-delay="100">


                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="course-item">
                            {{-- <img src="images/{{$formation->image_path}}" class="img-fluid" alt="..."> --}}
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>Web Development</h4>
                                    <p class="price">$169</p>
                                </div>

                                <h3><a href=""></a></h3>
                                <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae
                                    dolores dolorem tempore.</p>
                                <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        {{-- <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid"
                                                 alt="">
                                             <span>Antonio</span> --}}
                                    </div>
                                    <div class="trainer-rank d-flex align-items-center">
                                        <i class="bx bx-user"></i>&nbsp;50
                                        &nbsp;&nbsp;
                                        <i class="bx bx-heart"></i>&nbsp;65
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Course Item-->






                </div>
                <a href="" class=" get-started-btn mt-4">َAfficher le reste ...</a>
            </div>
        </section><!-- End Popular event Section -->


    </main>
</div>
