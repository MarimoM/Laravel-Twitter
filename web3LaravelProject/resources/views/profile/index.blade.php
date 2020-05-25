@extends('main')


@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Profiles</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>First name</td>
          <td>Last name</td>
          <td>Email</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td><a href="{{ route('profile.show', $user->id)}}">{{$user->id}}</a></td>
            <td><a href="{{ route('profile.show', $user->id)}}">{{$user->first_name}}</a></td>
             <td><a href="{{ route('profile.show', $user->id)}}">{{$user->last_name}}</a></td>
            <td><a href="{{ route('profile.show', $user->id)}}">{{$user->email}}</a></td>
            <td>
                <a href="{{ route('profile.edit', $user->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('profile.destroy', $user->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection