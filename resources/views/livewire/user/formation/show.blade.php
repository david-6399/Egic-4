@extends('livewire.user.index')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>{{ $formations->nome }}</h2>
                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
                    quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
            </div>
        </div><!-- End Breadcrumbs -->
        @if (session('message'))
            <div class="alert alert-info" role="alert">{{ session('message') }}</div>
        @endif


        <!-- ======= Cource Details Section ======= -->
        <section id="course-details" class="course-details">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-8">
                        @if($formations->image_path != null)
                            <img src="{{asset($formations->image_path)}}" class="img-fluid" style="max-width: " alt="">                        
                        @else
                            <img src="{{asset('userImages/formation.jpg')}}" class="img-fluid" alt="">
                        @endif
                        <h3>Et enim incidunt fuga tempora</h3>
                        <p>
                            Qui et explicabo voluptatem et ab qui vero et voluptas. Sint voluptates temporibus quam autem.
                            Atque nostrum voluptatum laudantium a doloremque enim et ut dicta. Nostrum ducimus est iure
                            minima totam doloribus nisi ullam deserunt. Corporis aut officiis sit nihil est. Labore aut
                            sapiente aperiam.
                            Qui voluptas qui vero ipsum ea voluptatem. Omnis et est. Voluptatem officia voluptatem adipisci
                            et iusto provident doloremque consequatur. Quia et porro est. Et qui corrupti laudantium ipsa.
                            Eum quasi saepe aperiam qui delectus quaerat in. Vitae mollitia ipsa quam. Ipsa aut qui numquam
                            eum iste est dolorum. Rem voluptas ut sit ut.
                        </p>
                    </div>

                    <div class="col-lg-4">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('seccess'))
                            <div class="alert alert-success" role="alert">
                                {{ session('seccess') }}
                            </div>
                        @endif
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Créer Par</h5>
                            <p><a href="#">Admin</a></p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Durée</h5>
                            <p>{{ $formations->duree }} <b>Mois</b></p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Tarif</h5>
                            <p>{{ $formations->tarif }} <b>DA</b></p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Tyep De Depliom</h5>
                            @if (isset($formations->typeFormation->name))
                                <p>{{ $formations->typeFormation->name }}</p>
                            @else
                                <p>Not Selected Yet</p>
                            @endif
                        </div>
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Condition d’accès</h5>
                            <p>
                                {{-- @foreach ($formation->niv_etudiant as $niv_etudiant)
                                    {{ $niv_etudiant->name }}|
                                @endforeach --}}
                            </p>
                        </div>


                        <livewire:user.components.add-to-favoris :formationId="$formations->id">


                    </div>

                    <div class="col-lg-8">

                        <h3>Débouché</h3>
                        @foreach ($formations->debouches as $débouché)
                            <b>{{ $débouché->titre }} :</b> {{ $débouché->description }}
                        @endforeach
                    </div>

                </div>

            </div>
        </section><!-- End Cource Details Section -->

        <!-- ======= Cource Details Tabs Section ======= -->

        <section id="cource-details-tabs" class="cource-details-tabs ">
            <div class="container" data-aos="fade-up">
                <h1>
                    <center>Les Program De <u>{{ $formations->nome }}</u></center>
                </h1>
                <div class="dropdown-divider"></div>

                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            @foreach ($formations->programs as $program)
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab"
                                        href="#tab-{{ $program->id }}">{{ $program->titre }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="tab-content">
                            {{-- {{dump($formations->programs->module)}} --}}
                            @foreach ($formations->programs as $program)
                                <div class="tab-pane" id="tab-{{ $program->id }}">
                                    <div class="row">
                                        <div class="col-lg-8 details order-2 order-lg-1">
                                            @if (isset($program->module->id))
                                                <h3>{{ $program->module->name }}</h3>
                                                @can('syident')
                                                    <a href="{{asset($program->module->document)}}" class="btn get-started-btn">{{ $program->module->name }}</a>
                                                @else
                                                    <a href="#" class="btn get-started-btn">{{ $program->module->name }}</a>
                                                @endcan
                                            @else
                                                <h3>No Module Yet</h3>
                                            @endif
                                        </div>
                                        <div class="col-lg-4 text-center order-1 order-lg-2">
                                            <img src="{{ asset('Mentor/assets/img/illus4.png') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
                

            </div>
        </section><!-- End Cource Details Tabs Section -->

        <livewire:user.components.add-comment :formationId="$formations->id" :eventId="null">

        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Les Commentaire</h2>
                    <p>Top Commentaire</p>
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        @forelse ($comments as $comment )

                            <div class="swiper-slide ">
                                <div class="testimonial-wrap">
                                    <div class="testimonial-item">
                                        <img src="{{ asset('Mentor/assets/img/avatar.png') }}" class="testimonial-img" alt="">
                                        <h3>{{ $comment->user->name }}</h3>
                                        <h4>{{ $comment->created_at->format('Y-m-d') }}</h4>
                                        <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            <br>
                                            {{ $comment->contenu }}
                                            <br>
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div>
                            </div><!-- End testimonial item -->
                        @empty
                            <h2>Aucun Commentaire Pour l'instant</h2>
                        @endforelse

                        <!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>


               
            </div>
        </section><!-- End Testimonials Section -->

    </main>

    <script>
        window.addEventListener('success', event => {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Your work has been saved",
                showConfirmButton: false,
                timer: 1500
            });
        })
    </script>
@endsection
