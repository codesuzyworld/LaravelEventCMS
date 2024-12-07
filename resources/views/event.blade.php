
@extends ('layout.frontend', ['title' => $event->title])

@section ('content')

<section class="w3-padding">

    <h2 class="w3-text-blue">{{$event->title}}</h2>

    @if ($event->image)
        <div class="w3-margin-top">
            <img src="{{asset('storage/'.$event->image)}}" width="400">
        </div>
    @endif

    <p><{{$event->content}}</p>

    @if ($event->url)
        View Event: <a href="{{$event->url}}">{{$event->url}}</a>
    @endif

    <p>
        Posted: {{$event->created_at->format('M j, Y')}}
        <br>
        Type: {{$event->type->title}}
    </p>

    <a href="/">Back to Home</a>

</section>

@endsection
