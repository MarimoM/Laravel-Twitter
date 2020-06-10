@extends('main')

@section('main')
<div class="container-fluid">
    <div class = "row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="user-wrapper">
                        <ul class="users">
                            @foreach($users as $user)
                                <li class="user" id="{{ $user->id }}">
                                    @if($user->unread)
                                        <span class="pending">{{ $user->unread }}</span>
                                    @endif
    
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{ $user->profile_image_path }}" alt="" class="media-object">
                                        </div>
    
                                        <div class="media-body">
                                            <p class="name">{{ $user->first_name }}</p>
                                            <p class="email">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection