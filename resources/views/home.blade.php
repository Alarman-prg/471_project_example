@extends('app')

@section('content')
    <div class="row">
        <h3>Events</h3>
    </div>
    <br>
    <table class="table table-striped table-hover table-sm">
        <thead clas="thead-dark">
        <tr class="d-flex">
            <th scope="col" class="col-3">Event Name</th>
            <th scope="col" class="col-5">Event Desc</th>
            <th scope="col" class="col-1">Event Date</th>
            <th scope="col" class="col-2" style="text-align:center">Total Signups</th>
            <th scope="col" class="col-1">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($rs as $row)
            <tr class="d-flex">
                <td class="col-3">{{$row->event_name}}</td>
                <td class="col-5">{{$row->event_desc}}</td>
                <td class="col-1">{{$row->event_date}}</td>
                <td class="col-2" style="text-align:center">{{$row->attendance_total}}</td>
                <td class="col-1" align="center"><a href="/events/{{$row->event_id}}"><button type="button" class="btn btn-primary">Signup</button></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
