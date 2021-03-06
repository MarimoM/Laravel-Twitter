@extends('main')


@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Your profile</h1>    
    <img src="{{asset('images/' . $user->profile_image_path)}}" width="250px" height="250px" alt="MISSING JPG" class="rounded-circle"/> 
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
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->first_name}}
            <td>{{$user->last_name}}
            <td>{{$user->email}}</td>
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
    </tbody>
  </table>
<div>
</div>
@endsection