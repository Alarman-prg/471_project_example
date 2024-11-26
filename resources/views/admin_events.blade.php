@extends('app')
@section('content')
    <div class="row">
        <h3>Add Event (Admin)</h3>
    </div>
    <form action="/admin/events" method="post">
        @csrf
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="event_name">Event Name</label>
                <input type="text" class="form-control" id="event_name"
                       name="event_name" required>
            </div>
            <div class="col-md-5 mb-3">
                <label for="event_desc">Event Description</label>
                <input type="text" class="form-control" id="event_desc"
                       name="event_desc" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="event_date">Event Date</label>
                <input type="date" class="form-control" id="event_date"
                       name="event_date" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Event</button>
    </form>
    <br/>
    <table class="table table-striped table-hover table-sm">
        <thead class="thead-dark">
        <tr class="d-flex">
            <th scope="col" class="col-3">Event Name</th>
            <th scope="col" class="col-5">Event Desc</th>
            <th scope="col" class="col-2">Event Date</th>
            <th scope="col" class="col-2" style="text-align:center">Total Signups</
            th>
        </tr>
        </thead>
        <tbody>
        @foreach ($rs as $row)
            <tr class="d-flex">
                <td class="col-3">{{$row->event_name}}</td>
                <td class="col-5">{{$row->event_desc}}</td>
                <td class="col-2">{{$row->event_date}}</td>
                <td class="col-2" style="text-align:center">{{$row->attendance_total}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
