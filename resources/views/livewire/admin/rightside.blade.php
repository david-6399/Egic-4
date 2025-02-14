<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile" style="background-color: #343A40">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{asset('adminImages/profile.png')}}"
                    alt="User profile picture">
            </div>

            {{-- <h3 class="profile-username text-center">{{auth()->user()->name}}</h3> --}}

            <p class="text-muted text-center">Software Engineer</p>

           
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button class="btn btn-primary btn-block">Logout</button>
                {{-- <a href="{{route('logout')}}" class="btn btn-primary btn-block"><b>Logout</b></a> --}}
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</aside>
