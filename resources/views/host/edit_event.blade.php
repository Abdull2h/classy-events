@extends('layouts.app')

@section('content')

    <div class="container my-2 justify-content-around">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form class="row justify-content-center" action="/event/edit/{{ $event->id }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12 mb-2">
                        <div class="h4 text-center">Edit Event</div>

                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="name" class="form-label">Event Name</label>
                        <input type="text" class="form-control rounded-pill" id="name" name="name" autofocus value="{{ $event->name }}">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="description" class="form-label">Event Description</label>
                        <input type="text" class="form-control rounded-pill" id="description" name="description"
                            value="{{ $event->description }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control rounded-pill" id="date" name="date" value="{{ $event->date }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="time" class="form-label">Time</label>
                        <input type="time" class="form-control rounded-pill" id="time" name="time" value="{{ $event->time }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control rounded-pill" id="location" name="location"
                            value="{{ $event->location }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="doorman" class="form-label">Choose Doorman</label>
                        <select class="form-control rounded-pill" id="doorman" name="doorman" aria-label="Default select example">
                            <option selected value="{{ $event->doorman }}"> You Choosed:
                                {{ App\Models\User::where('id', $event->doorman)->first()->name }}
                            </option>
                            @foreach ($doormen as $doorman)
                                <option value="{{ $doorman->user_id }}"> {{ $doorman->user->name }}
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label for="image">Event Image</label>
                            <input type="file" class="form-control-file rounded-pill" id="image" name="image"
                                src="/../../public/images/{{ $event->image }}"> <small class="text-muted">if you don't want
                                to change the image just
                                leave it blank.</small>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2 text-center">
                        <button type="submit" class="btn btn-primary rounded-pill">Save Changes</button>
                        <button type="reset" class="btn btn-outline rounded-pill">Reset</button>
                    </div>
                </form>

                <form action="/event/delete/{{ $event->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="col-md-12 mb-2 text-center">
                        <button type="submit" class="btn btn-outline-danger rounded-pill">Delete This Event</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
