<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered">
    <thead>
      <tr>
        <td><b><h1>Messages</h1></b></td>   
        @foreach ($messages as $message)
            @if (Auth::id() == $message->user_id)
                <div>
                    <h4>Creation date: {{ $message->created_at}}</h4>
                    <p>{{ $message->text }}</p> 
                    @if (!is_null($message->cover_image))
                        @php $images = json_decode($message->cover_image, true); @endphp
                        @if(is_array($images) && !empty($images))
                        @foreach ($images as $image)
                            <div>
                                <img width="300px", height="auto" src={{public_path('storage/cover_images/'.$image)}}>
                            </div>
                        @endforeach
                        @endif
                    @endif
                </div>
            <hr>
            @endif
        @endforeach
      </tr>
    </thead>
    </table>
  </body>
</html>