<div>
    <main id="main">
        <div class="breadcrumbs" data-aos="fade-in"  wire:ignore.self>
            <div class="container">
                <h2>Tout Mes Formation préférer</h2>
                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas
                    sit
                    quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
            </div>
        </div>

        <section id="courses" class="courses">
            <div class="container">

                <div class="row">
                    @foreach ($data->formations as $formation )
                        
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch pb-4">
                            <div class="course-item d-flex position-relative" style="border-radius: 8px; overflow: hidden;">
                                <img src="{{ asset('userImages/formation.jpg') }}" class=""
                                    style="border-radius: 8px; width:150px" alt="...">
                                <div class="course-content d-flex justify-content-between flex-grow-1">
                                    <div class="p-2">
                                        <h3><a href=" /formation/{{ $formation->id }}">{{ $formation->nome }}</a></h3>
                                        <h6>Création par Admin</h6>
                                        <h6>{{ $formation->duree }}  MOUNTH</h6>
                                    </div>

                                    <div class="position-absolute top-0 end-0 m-2" wire:click='removeFromCart({{ $formation->id }})'>
                                        <button class="btn btn-none border border-danger">
                                            <i class="bx bx-trash w-4 text-danger"></i>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>                        
                        
                    @endforeach
                </div>


            </div>
        </section><!-- End Courses Section -->


    </main>
</div>
