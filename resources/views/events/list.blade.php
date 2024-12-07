@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Events</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th></th>
            <th>Title</th>
            <th>Slug</th>
            <th>Type</th>
            <th>Created</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($events as $event)
            <tr>
                <td>
                    @if ($event->image)
                        <img src="{{asset('storage/'.$event->image)}}" width="200">
                    @endif
                </td>
                <td>{{$event->title}}</td>
                <td>
                    <a href="/event/{{$event->slug}}">
                        {{$event->slug}}
                    </a>
                </td>
                <td>{{$event->type->title}}</td>
                <td>{{$event->created_at->format('M j, Y')}}</td>
                <td><a href="/console/events/image/{{$event->id}}">Image</a></td>
                <td><a href="/console/events/edit/{{$event->id}}">Edit</a></td>
                <td><a href="/console/events/delete/{{$event->id}}">Delete</a></td>
            </tr>
        @endforeach
    </table>

    <a href="/console/events/add" class="w3-button w3-green">New Event</a>

</section>

@endsection
