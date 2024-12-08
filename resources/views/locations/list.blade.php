@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Locations</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th>Name</th>
            <th>Address</th>
            <th>Google Map Link</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach($locations as $location): ?>
            <tr>
                <td>{{$location->name}}</td>
                <td>{{$location->address}}</td>
                <td>{{$location->gMapLink}}</td>
                <td><a href="/console/locations/edit/{{$location->id}}">Edit</a></td>
                <td><a href="/console/locations/delete/{{$location->id}}">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="/console/locations/add" class="w3-button w3-green">New Location</a>

</section>

@endsection