<div>
    <style>
        .bg-gray-200{
            background-color: #e9ecefc5;
        }
    </style>
    
    <li class="nav-item dropdown" wire:poll.10s="refrechComponent"> <!-- Auto-refresh every 5 sec -->
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            @if($unreadCount > 0)
                <span class="badge badge-danger navbar-badge">{{ $unreadCount }}</span>
            @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">{{ count($notifications) }} Notifications</span>

                @foreach ($notifications as $index => $notification)
                    @if($index < 4)
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item {{$notification->read_at ? '' : 'bg-gray-200'}}" wire:click="markAsRead('{{ $notification->id }}')">
                            <div class="d-flex justify-content-between">
                                <div>
                                    @if(array_key_exists('comment', $notification->data))
                                        <i class="fas fa-envelope mr-2"></i> {{ \Illuminate\Support\Str::limit($notification->data['comment'], 15, '...') }}
                                    @elseif(array_key_exists('userName', $notification->data))
                                        <i class="fas fa-envelope mr-2"></i> {{ \Illuminate\Support\Str::limit($notification->data['userName'], 15, '...') }}
                                    @endif
                                </div>
                                <span class="float-right text-muted text-sm">{{$notification->created_at->diffForHumans()}}</span>
                            </div>
                        </a>
                    @endif
                @endforeach

            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
    </li>
</div>
