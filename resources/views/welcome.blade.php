@extends ('layout.frontend', ['title' => 'Home'])

@section ('content')

<div class="w3-container w3-padding">
    <form method="get" action="/" class="w3-margin-bottom">
        <!-- Search Bar -->
        <div class="w3-row-padding">
            <div class="w3-col m8">
                <input type="text" name="search" class="w3-input" placeholder="Search by Event Name" 
                    value="{{ request('search') }}">
            </div>
            <div class="w3-col m4">
                <button class="w3-button w3-blue" type="submit">Search</button>
                @if(request('search') || request('type'))
                    <a href="/" class="w3-button w3-red">Reset</a>
                @endif
            </div>
        </div>


<section class="w3-padding w3-container">

    <h2 class="w3-text-blue">Events ({{ $events->count() }})</h2>

    @foreach ($events as $event)

        <div class="w3-card w3-margin">

            <div class="w3-container w3-blue">

                <h3>{{$event->title}}</h3>

            </div>
            
            @if ($event->image)
                <div class="w3-container w3-margin-top">
                    <img src="{{asset('storage/'.$event->image)}}" width="200">
                </div>
            @endif

            <div class="w3-container w3-padding">

                @if ($event->url)
                    View Event: <a href="{{$event->url}}">{{$event->url}}</a>
                @endif

                <p>
                    Posted: {{$event->created_at->format('M j, Y')}}
                    <br>
                    Type: {{$event->type->title}}
                </p>

                <a href="/event/{{$event->slug}}" class="w3-button w3-green">View Event Details</a>

            </div>
        

        </div>

    @endforeach

</section>

<hr>

@endsection
