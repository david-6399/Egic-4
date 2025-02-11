@extends('user.index')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>{{$event->titre}}</h2>
            <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
                quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-8">
                    <img src="{{$event->image_path}}" class="img-fluid" alt="">
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
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                    @endif
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Evenement</h5>
                        <p><a href="#">{{$event->titre}}</a></p>
                    </div>

                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Commencé</h5>
                        <p>{{\carbon\carbon::parse($event->event_start)->format('d M Y | H:m')}}</p>
                    </div>

                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Terminé</h5>
                        <p>{{\carbon\carbon::parse($event->event_end)->format('d M Y | H:m')}}</p>
                    </div>

                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Abonné</h5>
                        <form action="{{url('event_abonne',$event->id)}}" method="post">
                        @csrf
                            <button type="submit" class="btn">
                                <i class="bx bx-plus"></i>
                            </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </section><!-- End Cource Details Section -->

    <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <div class="row mt-5">

            {{-- <div class="col-lg-8 mt-5 mt-lg-0"> --}}

                <form action="{{url('add_event_comment',$event->id)}}" method="post" role="form" class="php-email-formm">
                    @csrf
                    <label for=""><h3>Ajouter Votre Commentaire ICI :</h3></label>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="comment" rows="5" placeholder="Commentaire" required></textarea>
                    </div>
                    
                    <div class="text-center"><button type="submit" class="btn">Enregistrer</button></div>
                </form>

            </div>

        </div>

    </div>
</section>

    <!-- ======= Cource Details Tabs Section ======= -->
   
</main>
@endsection