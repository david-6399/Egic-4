@extends('livewire.user.index')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>{{ $events->titre }}</h2>
                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
                    quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Cource Details Section ======= -->
        <section id="course-details" class="course-details">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-8">
                        <img src="{{ asset('Mentor/assets/img/events-2.jpg') }}" class="img-fluid" alt="">
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
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Evenement</h5>
                            <p><a href="#">{{ $events->titre }}</a></p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Commencé</h5>
                            <p>{{ \carbon\carbon::parse($events->event_start)->format('d M Y | H:m') }}</p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Terminé</h5>
                            <p>{{ \carbon\carbon::parse($events->event_end)->format('d M Y | H:m') }}</p>
                        </div>

                        <livewire:user.components.sub-to-event :eventId="$events->id">

                    </div>
                </div>

            </div>
        </section><!-- End Cource Details Section -->

        <livewire:user.components.add-comment :formationId="null" :eventId="$events->id">

        <!-- ======= Cource Details Tabs Section ======= -->

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
