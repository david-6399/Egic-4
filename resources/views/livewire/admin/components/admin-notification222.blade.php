<div>
    <li class="nav-item dropdown" wire:poll.10s='refrech'>
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            @if ($counter > 0)
                <span class="badge badge-danger navbar-badge">{{ $counter }}</span>
            @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            @foreach ($notifications as $notification)
                <a class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media align-items-center">
                        <img src="{{ asset('adminImages/comment.png') }}" alt="User Avatar" style="width: 20px"
                            class="mr-3">
                        <div class="media-body" wire:click='markAsRead("{{ $notification->id }}")'>
                            {{-- <h3 class="dropdown-item-title">
                                daniel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3> --}}
                            @if (array_key_exists('comment', $notification->data))
                                <p class="text-sm font-weight-bold">
                                    {{ \Illuminate\Support\Str::limit($notification->data['comment'], 15, '...') }} 
                                </p>
                                    <p>A ajouter un commentair</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>
                                    {{ $notification->created_at->diffForHumans() }}
                                </p>
                            @elseif(array_key_exists('userName', $notification->data))
                                <p class="text-sm font-weight-bold">
                                        {{ \Illuminate\Support\Str::limit($notification->data['userName'], 15, '...') }}
                                </p>
                                <p>Veut être étudiant</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>
                                    {{ $notification->created_at->diffForHumans() }}</p>
                            @endif
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
            @endforeach

            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
    </li>
</div>
