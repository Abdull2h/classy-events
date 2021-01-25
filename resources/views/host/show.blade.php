@extends('layouts.app')

@section('content')

    <div class="container my-2">
        <!-- First row -->
        <div class="row justify-content-center my-2">
            <div class="h4 text-center">Event Detailes</div>
        </div>

        <!-- Second row -->
        <div class="row justify-content-center my-2">
            <div class="col-md-8">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center"><img src="/public/images/{{ $event->image }}" alt="..."
                            style="max-height: 400px; max-width: 400px;"></li>
                    <li class="list-group-item">Name: {{ $event->name }}</li>
                    <li class="list-group-item">Description: {{ $event->description }}</li>
                    <li class="list-group-item">Location: {{ $event->location }}</li>
                    <li class="list-group-item">Date: {{ $event->date }}</li>
                    <li class="list-group-item">Time: {{ $event->time }}</li>
                    <li class="list-group-item">Doorman: {{ App\Models\User::find($event->doorman)->name }}</li>
                    <li class="list-group-item">
                        <a href="/event/edit/{{ $event->id }}">
                            <button class="btn btn-outline-warning btn-sm rounded pill">Edit</button>
                        </a>
                    </li>
                    <li class="list-group-item"><a href="/event/show/{{ $event->id }}/add_invite">
                            <button class="btn btn-outline-dark btn-sm rounded pill">Add Attendant</button></a>
                    </li>
                    <li class="list-group-item">
                        <a href="/event/show/{{ $event->id }}/send_invitation">
                            <button class="btn btn-outline-primary btn-sm rounded pill mx-1">Send Invitation to Attendants</button>
                        </a>
                        <a href="/event/show/{{ $event->id }}/assign_doorman">
                            <button class="btn btn-outline-primary btn-sm rounded pill mx-1">Send Assignment to doorman</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Third row -->
        <div class="row justify-content-center mt-4">
            <div class="h4 text-center">Attendants List</div>
        </div>

        <!-- Fourth row -->
        <div class="row justify-content-center my-2">
            <div class="col-md-8">
                <div class="row m-2 align-items-end">
                    <label for="search" class="form-label m-2">Find Attendant</label>
                    <input type="text" id="search" class="form-control w-50 mx-auto rounded-pill" placeholder="Search..">
                </div>
                <table class="table table-hover" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Seats</th>
                            <th>Code</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="table">
                        @foreach ($attendants as $attendant)
                            <tr>
                                <td>{{ $attendant->name }}</td>
                                <td>{{ $attendant->email }}</td>
                                <td>{{ $attendant->seats }}</td>
                                <td>{{ str_pad($attendant->code, 6, '0', STR_PAD_LEFT) }}</td>
                                <td><a class="btn btn-sm btn-primary rounded-pill"
                                        href="/event/show/{{ $attendant->event_id }}/edit_invite/{{ $attendant->id }}"><i class="bi bi-pencil-square align-top mr-1"></i>Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="table-secondary">
                        <tr>
                            <th colspan="1">Total</th>
                            <th colspan="1">{{ App\Models\Attendant::where('event_id', $event->id)->count() }}</th>
                            <th colspan="2">Total seats</th>
                            <th colspan="1">{{ App\Models\Attendant::where('event_id', $event->id)->sum('seats') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>


    </div>

    <script>
        $(document).ready(function() {
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#table tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

    </script>
@endsection
