@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Edit Event</h2>

    <form method="post" action="/console/events/edit/{{$event->id}}" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="title">Event Title:</label>
            <input type="title" name="title" id="title" value="{{old('title', $event->title)}}" required>
            
            @if ($errors->first('title'))
                <br>
                <span class="w3-text-red">{{$errors->first('title')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="eventLink">Event URL:</label>
            <input type="url" name="eventLink" id="eventLink" value="{{old('eventLink', $event->eventLink)}}">

            @if ($errors->first('eventLink'))
                <br>
                <span class="w3-text-red">{{$errors->first('eventLink')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="dateStart">Date Start:</label>
            <input type="date" name="dateStart" id="dateStart" value="{{old('dateStart', $event->dateStart)}}" required>
            
            @if ($errors->first('dateStart'))
                <br>
                <span class="w3-text-red">{{$errors->first('dateStart')}}</span>
            @endif

            <label for="dateEnd" style="margin-left: 20px;">Date End:</label>
            <input type="date" name="dateEnd" id="dateEnd" value="{{old('dateEnd', $event->dateEnd)}}" required>

            @if ($errors->first('dateEnd'))
                <br>
                <span class="w3-text-red">{{$errors->first('dateEnd')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="timeStart">Time Start:</label>
            <input type="time" name="timeStart" id="timeStart" value="{{old('timeStart', $event->timeStart)}}" required>
            
            @if ($errors->first('timeStart'))
                <br>
                <span class="w3-text-red">{{$errors->first('timeStart')}}</span>
            @endif

            <label for="timeEnd" style="margin-left: 20px;">Time End:</label>
            <input type="time" name="timeEnd" id="timeEnd" value="{{old('timeEnd', $event->timeEnd)}}" required>

            @if ($errors->first('timeEnd'))
                <br>
                <span class="w3-text-red">{{$errors->first('timeEnd')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug" value="{{old('slug', $event->slug)}}" required>

            @if ($errors->first('slug'))
                <br>
                <span class="w3-text-red">{{$errors->first('slug')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="content">Content:</label>
            <textarea name="content" id="content" required>{{old('content', $event->content)}}</textarea>

            @if ($errors->first('content'))
                <br>
                <span class="w3-text-red">{{$errors->first('content')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="type_id">Event Type:</label>
            <select name="type_id" id="type_id">
                <option></option>
                @foreach($types as $type)
                    <option value="{{$type->id}}"
                        {{$type->id == old('type_id', $event->type_id) ? 'selected' : ''}}>
                        {{$type->title}}
                    </option>
                @endforeach
            </select>
            @if ($errors->first('type_id'))
                <br>
                <span class="w3-text-red">{{$errors->first('type_id')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="location_id">Location:</label>
            <select name="location_id" id="location_id">
                <option></option>
                @foreach($locations as $location)
                    <option value="{{$location->id}}"
                        {{$location->id == old('location_id', $event->location_id) ? 'selected' : ''}}>
                        {{$location->name}}
                    </option>
                @endforeach
            </select>
            @if ($errors->first('location_id'))
                <br>
                <span class="w3-text-red">{{$errors->first('location_id')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-green">Edit Event</button>

    </form>

    <a href="/console/events/list">Back to Event List</a>

</section>

@endsection
