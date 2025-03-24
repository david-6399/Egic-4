 <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Nos Formation</h2>
                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas
                    sit
                    quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
            </div>
        </div><!-- End Breadcrumbs -->

        <section class="container my-0">
            <div class="card p-3 shadow-sm">
                <h5 class="mb-3"><i class="fas fa-filter"></i> Filtrer les formations</h5>
                <div class="row">
                    <!-- Niveau d'Étude -->
                    <div class="col-md-3">
                        <label class="form-label">Niveau d'Étude</label>
                        <select class="form-select filter-input" wire:model.live='perNiv'>
                            <option value="">Tous</option>
                            @foreach ($nivEtuds as $nivEtud)
                                <option value="{{ $nivEtud->id }}">{{ $nivEtud->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Type de Formation -->
                    <div class="col-md-3">
                        <label class="form-label">Type de Formation</label>
                        <select class="form-select filter-input" wire:model.lazy='perType'>
                            <option value="">Tous</option>
                            @foreach ($typeFormations as $typeFormation)
                                <option value="{{ $typeFormation->id }}">{{ $typeFormation->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tarif -->
                    <div class="col-md-3">
                        <label class="form-label">Tarif (DA)</label>
                        <input type="range" class="form-range filter-input" id="tarif" min="0" max="10000" step="500" value="100000"
                        wire:model.lazy='perTarif'>
                        <p class="text-muted">Max Tarif: <span id="tarifValue">{{$perTarif}}</span> DA</p>
                    </div>

                    <!-- Tarif -->
                    <div class="col-md-3">
                        <label class="form-label">Tarif (DA)</label>
                        <input type="number" class="form-control filter-input" wire:model.live='perTarifMin'
                            placeholder="Min tarif">
                    </div>


                </div>
            </div>
        </section>

        <!-- ======= Courses Section ======= -->
        <section id="courses" class="courses">
            <div class="container">

                <div class="row">
                    @foreach ($formations as $formation)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch pb-4">
                            <div class="course-item">
                                <img src="{{asset('userImages/formation.jpg')}}" class="img-fluid" style="border-radius: 8px;" alt="...">
                                <div class="course-content">

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>{{ $formation->typeFormation->name }}</h4>
                                        {{-- <p class="price">{{ $formation->tarif }} - DA</p> --}}
                                    </div>

                                    <h3><a href=""  wire:click.prevent='openFormation({{$formation->id}})'>{{ $formation->nome }}</a></h3>
                                    <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae
                                        dolores dolorem tempore.</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <img src="{{asset('adminImages/student.png')}}" class="img-fluid" alt="">
                                            <span>999 DA</span>
                                        </div>
                                        <div class="trainer-rank d-flex align-items-center">
                                            <i class="bx bx-user"></i>&nbsp;50
                                            &nbsp;&nbsp;
                                            <i class="bx bx-heart"></i>&nbsp;65
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section><!-- End Courses Section -->
    </main>