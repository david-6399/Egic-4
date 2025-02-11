@extends('user.index')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>{{ $formation->nome_forma }}</h2>
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

                <div class="row" >
                    <div class="col-lg-8" >
                        <img src="/indexuser/assets/img/illus3.png" class="img-fluid" alt="">
                        <h3>Et enim incidunt fuga tempora</h3>
                        <p >
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
                    
                    <div class="col-lg-4" >
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
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
                            <p>{{ $formation->duree_forma }} <b>Mois</b></p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Tarif</h5>
                            <p>{{ $formation->tarif_forma }} <b>DA</b></p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Tyep De Depliom</h5>
                            <p>{{ $formation->type_formation->name }}</p>
                        </div>
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Condition d’accès</h5>
                            <p>
                                @foreach ($formation->niv_etudiant as $niv_etudiant)
                                    {{ $niv_etudiant->name }}|
                                @endforeach
                            </p>
                        </div>



                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Ajouter Aux Favoris</h5>
                            <form action="{{ url('add_to_cart', $formation->id) }}" method="Post">
                                @csrf
                                <button type="submit" class="btn">
                                    <i class="bx bx-heart"></i>
                                </button>
                            </form>
                        </div>

                    </div>

                    <div class="col-lg-8" >

                        <h3>Débouché</h3>
                        @foreach ($formation->débouché as $débouché)
                            <b>{{ $débouché->name }} :</b> {{$débouché->description}}
                        @endforeach
                    </div>

                </div>

            </div>
        </section><!-- End Cource Details Section -->

        <!-- ======= Cource Details Tabs Section ======= -->

        <section id="cource-details-tabs" class="cource-details-tabs ">
            <div class="container" data-aos="fade-up">
                <h1>
                    <center>Les Modules De {{ $formation->program->titre }}</center>
                </h1>
                <div class="dropdown-divider"></div>

                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            @forelse ($module as $module)
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab"
                                        href="#tab-{{ $module->id }}">{{ $module->name }}</a>
                                </li>
                            @empty
                                {{-- <h4>Aucune Module n'a encore été ajoutée</h4> --}}
                            @endforelse ($program_module as $program_module)




                        </ul>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="tab-content">

                            @forelse ($module2 as $module2)
                                <div class="tab-pane" id="tab-{{ $module2->id }}">
                                    <div class="row">
                                        <div class="col-lg-8 details order-2 order-lg-1">
                                            <h3>{{ $module2->name }}</h3>

                                            @foreach ($module2->support_cours as $support_cours)
                                                @can('student')
                                                    <a href="/contenus/{{ $support_cours->contenu }}"
                                                    class="btn get-started-btn">{{ $support_cours->name }}</a>
                                                @else
                                                <a href="#" class="btn get-started-btn">{{ $support_cours->name }}</a>
                                                @endcan
                                            @endforeach

                                        </div>
                                        <div class="col-lg-4 text-center order-1 order-lg-2">
                                            <img src="{{ asset('indexuser/assets/img/illus4.png') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h4>Aucune Module n'a encore été ajoutée</h4>
                            @endforelse ($module2 as $module2)

                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Cource Details Tabs Section -->



        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="row mt-5">

                    {{-- <div class="col-lg-8 mt-5 mt-lg-0"> --}}

                    <form action="{{ url('add_comment', $formation->id) }}" method="post" role="form"
                        class="php-email-formm">
                        @csrf
                        <label for="">
                            <h3>Ajouter Votre Commentaire ICI :</h3>
                        </label>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="comment" rows="5" placeholder="Commentaire" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Chargement</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Votre message a été envoyé. Merci!</div>
                        </div>
                        <div class="text-center"><button type="submit" class="btn">Enregistrer</button></div>
                    </form>

                </div>

            </div>

            </div>
        </section>
    </main>
@endsection
