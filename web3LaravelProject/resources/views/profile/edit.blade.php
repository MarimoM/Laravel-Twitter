@extends('main') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update your profile</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('profile.update', $user->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="first_name">First name:</label>
                <input type="text" class="form-control" name="first_name" value={{ $user->first_name }} />
            </div>

              <div class="form-group">

                <label for="last_name">Last name:</label>
                <input type="text" class="form-control" name="last_name" value={{ $user->last_name }} />
            </div>


            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value={{ $user->email }} />
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection