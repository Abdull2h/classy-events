@extends('layouts.app')

@section('content')

    <div class="container my-2 justify-content-around">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form class="row justify-content-center" action="/event/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12 mb-2">
                        <div class="h4 text-center">Create New Event</div>

                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="name" class="form-label">Event Name</label>
                        <input type="text" class="form-control" id="name" name="name" autofocus>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="description" class="form-label">Event Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="time" class="form-label">Time</label>
                        <input type="time" class="form-control" id="time" name="time">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="doorman" class="form-label">Choose Doorman</label>
                        <select class="form-control" id="doorman" name="doorman" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            @foreach ($doormen as $doorman)
                                <option value="{{ $doorman->user_id }}"> {{ $doorman->user->name }}
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label for="image">Event Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                    </div>
                    <div class="col-md-12 mb-2 text-center">
                        <button type="submit" class="btn btn-primary rounded-pill">Save Event</button>
                        <button type="reset" class="btn btn-outline rounded-pill">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
