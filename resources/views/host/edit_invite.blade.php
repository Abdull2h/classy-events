@extends('layouts.app')

@section('content')

    <div class="container my-2 justify-content-around">
        <!-- First Row -->
        <div class="row justify-content-center">
            <div class="h4 text-center b-b">Edit Attendant</div>
        </div>

        <!-- Second Row -->

        <div class="row justify-content-center">
            <div class="col-md-8">

                <form class="row justify-content-center"
                    action="/event/show/{{ $attendant->event_id }}/edit_invite/{{ $attendant->id }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="col-md-8 mb-2">
                        <label for="name" class="form-label">Attendant Name</label>
                        <input type="text" class="form-control rounded-pill" id="name" name="name" autofocus
                            value="{{ $attendant->name }}">
                    </div>
                    <div class="col-md-8 mb-2">
                        <label for="email" class="form-label">Attendant Email</label>
                        <input type="email" class="form-control rounded-pill" id="email" name="email"
                            value="{{ $attendant->email }}">
                    </div>
                    <div class="col-md-8 mb-2">
                        <label for="seats" class="form-label">Seats</label>
                        <input type="number" class="form-control rounded-pill" id="seats" name="seats"
                            value="{{ $attendant->seats }}" min="1">
                    </div>
                    <div class="col-md-12 mb-2 text-center">
                        <button type="submit" class="btn btn-primary rounded-pill"><i
                                class="bi bi-save align-top mr-2"></i>Save Changes</button>
                        <button type="reset" class="btn btn-outline rounded-pill"><i
                                class="bi bi-x-square align-top mr-2"></i>Reset</button>
                    </div>
                </form>
                <form class="row justify-content-center"
                    action="/event/show/{{ $attendant->event_id }}/delete_invite/{{ $attendant->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="col-md-12 mb-2 text-center">
                        <button type="submit" class="btn btn-outline-danger rounded-pill"><i
                                class="bi bi-trash align-top mr-2"></i>Delete this attendant</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
