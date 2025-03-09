<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Striped Full Width Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10%">#</th>
                        <th class="width:20%">Type</th>
                        <th class="width:20%">User</th>
                        <th style="width:40%">contenu</th>
                        <th style="width: 10%">Label</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notifications as $notification)
                        <tr>
                            <td>#.</td>

                            @if (array_key_exists('comment', $notification->data))
                                @if ($notification->data['formation_title'])
                                    <td>Commentair - Formation
                                    </td>
                                @elseif($notification->data['event_title'])
                                    <td>Commentair - Event
                                    </td>
                                @endif
                            @else
                                <td>Veut être étudiant</td>
                            @endif
                            {{-- --------------------------------------- --}}
                            @if (array_key_exists('comment', $notification->data))
                                <td>{{ $notification->data['user'] }}</td>
                            @elseif(array_key_exists('userName', $notification->data))
                                <td>{{ $notification->data['userName'] }}</td>
                            @endif
                            {{-- --------------------------------------- --}}
                            @if (array_key_exists('comment', $notification->data))
                                <td>{{ $notification->data['contenu'] }}</td>
                            @elseif(array_key_exists('userName', $notification->data))
                                <td>/////////////////////</td>
                            @endif
                            {{-- --------------------------------------- --}}
                            <td>
                                @if (array_key_exists('userName', $notification->data))
                                <span class="badge bg-danger">student or not student</span>
                                @endif
                            </td>

                            {{-- --------------------------------------- --}}
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
