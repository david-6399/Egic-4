<div>
    <main id="main" data-aos="fade-in">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Nos Formation</h2>
                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
                    quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
                    @if(session('error'))
                        <div class="alert alert-danger " >
                            {{session('error')}}
                        </div>                        
                    @endif

                    @if(auth()->check())
                        @livewire('create.create_user_niv_etud')
                    @endif
            </div>
        </div><!-- End Breadcrumbs -->
        
        <!-- ======= Courses Section ======= -->
        <section id="courses" class="courses">
            <div class="container" data-aos="fade-up">
                
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    {{-- @livewire('typesearch') --}}
                    
                </div>

            </div>
        </section><!-- End Courses Section -->


        



    </main>
</div>
