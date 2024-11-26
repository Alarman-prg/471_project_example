@extends('app')
@section('content')
    <div class="row">
        <h3>Event Signup</h3>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12 mb-3">
            Event Name: {{$event->event_id}} <br>
            Event Description: {{$event->event_desc}} <br>
            Event Date: {{$event->event_date}}
        </div>
    </div>
    <br>
    <form action="/events/{{$event->event_id}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-2 mb-3">
                <label for="email_address">Email Address</label>
                <input type="text" class="form-control" id="email_address"
                       name="email_address" value="{{session('email_address')}}" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name"
                       name="first_name" value="{{session('first_name')}}" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name"
                       name="last_name" value="{{session('last_name')}}" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="num_attending">Number Attending</label>
                <input type="number" min="1" step="1" class="form-control"
                       id="num_attending" name="num_attending" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="comments">Comments</label>
                <input type="text" class="form-control" id="comments"
                       name="comments">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br/>
    <div class="row">
        <h4>Existing Signups</h4>
    </div>
    <table class="table table-striped table-hover table-sm">
        <thead class="thead-dark">
        <tr class="d-flex">
            <th scope="col" class="col-2">First Name</th>
            <th scope="col" class="col-2">Last Name</th>
            <th scope="col" class="col-2" style="text-align:center">Number
                Attending</th>
            <th scope="col" class="col-6">Comments</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($attendees as $row)
            <tr class="d-flex">
                <td class="col-2">{{$row->first_name}}</td>
                <td class="col-2">{{$row->last_name}}</td>
                <td class="col-2" style="text-align:center">{{$row->num_attending}}</td>
                <td class="col-6">{{$row->comments}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
