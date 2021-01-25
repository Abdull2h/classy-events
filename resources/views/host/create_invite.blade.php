@extends('layouts.app')

@section('content')

    <div class="container my-2 justify-content-around">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form class="row justify-content-center" action="/event/show/{{ $event->id }}/add_invite" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12 mb-2">
                        <div class="h4 text-center">Add Attendant</div>
                    </div>
                    <div class="col-md-8 mb-2">
                        <label for="name" class="form-label">Attendant Name</label>
                        <input type="text" class="form-control rounded-pill" id="name" name="name" autofocus>
                    </div>
                    <div class="col-md-8 mb-2">
                        <label for="email" class="form-label">Attendant Email</label>
                        <input type="email" class="form-control rounded-pill" id="email" name="email">
                    </div>
                    <div class="col-md-8 mb-2">
                        <label for="seats" class="form-label">Seats</label>
                        <input type="number" class="form-control rounded-pill" id="seats" name="seats" value="1" min="1">
                    </div>
                    <div class="col-md-12 mb-2 text-center">
                        <button type="submit" class="btn btn-primary rounded-pill"><i class="bi bi-save align-top mr-2"></i>Save Attendant</button>
                        <button type="reset" class="btn btn-outline rounded-pill"><i class="bi bi-x-square align-top mr-2"></i>Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
