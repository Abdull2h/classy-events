@extends('layouts.app')

@section('content')

    <div class="container my-2">
        <!-- First row -->
        <div class="row justify-content-center my-2">
            <div class="h4 text-center b-b">Event Detailes</div>
        </div>

        <!-- Second row -->
        <div class="row justify-content-center my-2">
            <div class="col-md-10">
                <!-- TEST -->
                <ul class="list-group list-group-horizontal b-l">
                    <li class="list-group-item w-25 d-flex align-items-center">
                        <strong>Event Image</strong>
                    </li>
                    <li class="list-group-item w-75 text-center"><img src="/public/images/{{ $event->image }}" alt="..."
                            style="max-height: 300px; max-width: 300px;">
                    </li>
                </ul>
                <ul class="list-group list-group-horizontal b-l">
                    <li class="list-group-item w-25 text-bold"><strong>Event Name:</strong></li>
                    <li class="list-group-item w-75">{{ $event->name }}</li>
                </ul>
                <ul class="list-group list-group-horizontal b-l">
                    <li class="list-group-item w-25 text-bold"><strong>Event
                            Description:</strong></li>
                    <li class="list-group-item w-75">{{ $event->description }}</li>
                </ul>
                <ul class="list-group list-group-horizontal b-l">
                    <li class="list-group-item w-25 text-bold"><strong>Event Location:</strong>
                    </li>
                    <li class="list-group-item w-75">{{ $event->location }}</li>
                </ul>
                <ul class="list-group list-group-horizontal b-l">
                    <li class="list-group-item w-25 text-bold"><strong>Event Date:</strong></li>
                    <li class="list-group-item w-25">{{ $event->date }}</li>
                    <li class="list-group-item w-25 text-bold"><strong>Event Time:</strong></li>
                    <li class="list-group-item w-25">{{ $event->time }}</li>
                </ul>
                <ul class="list-group list-group-horizontal b-l">
                    <li class="list-group-item w-25 text-bold"><strong>Event Owner:</strong></li>
                    <li class="list-group-item w-25">
                        {{ App\Models\User::find($event->owner)->name }}
                    </li>
                    <li class="list-group-item w-25 text-bold"><strong>Event Doorman:</strong>
                    </li>
                    <li class="list-group-item w-25">
                        {{ App\Models\User::find($event->doorman)->name }}
                    </li>
                </ul>
                @if ($event->owner == Auth()->user()->id || App\Models\Admin::where('user_id', Auth()->user()->id)->first())
                    <ul class="list-group list-group-horizontal b-l">
                        <li class="list-group-item w-50 text-center"><a href="/event/edit/{{ $event->id }}">
                                <button class="btn btn-outline-dark btn-sm btn-block w-50 mx-auto rounded-pill"><i
                                        class="bi bi-pencil-square align-top mr-2"></i>Edit</button>
                            </a>
                        </li>
                        <li class="list-group-item w-50 text-center"><a href="/event/show/{{ $event->id }}/add_invite">
                                <button class="btn btn-outline-dark btn-sm btn-block w-50 mx-auto rounded-pill"><i
                                        class="bi bi-plus-square align-top mr-2"></i>Add
                                    Attendant</button></a>
                        </li>
                    </ul>
                @endif
                @if ($event->owner == Auth()->user()->id)
                    <ul class="list-group list-group-horizontal b-l">
                        <li class="list-group-item w-50 text-center"><a
                                href="/event/show/{{ $event->id }}/send_invitation">
                                <button class="btn btn-primary btn-sm w-50 mx-auto rounded-pill"><i
                                        class="bi bi-envelope align-top mr-2"></i>Send
                                    Invitation to
                                    Attendants</button>
                            </a></li>
                        <li class="list-group-item w-50 text-center">
                            <a href="/event/show/{{ $event->id }}/assign_doorman">
                                <button class="btn btn-primary btn-sm w-50 mx-auto rounded-pill"><i
                                        class="bi bi-door-open align-top mr-2"></i>Send
                                    Assignment to
                                    doorman</button>
                            </a>
                        </li>
                    </ul>
                @endif

            </div>
        </div>

        <!-- Third row -->
        <div class="row justify-content-center mt-4">
            <div class="h4 text-center">Attendants List</div>
        </div>

        <!-- Fourth row -->
        <div class="row justify-content-center my-2">
            <div class="col-md-10">
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
                                @if ($event->owner == Auth()->user()->id || App\Models\Admin::where('user_id', Auth()->user()->id)->first())
                                    <td><a class="btn btn-sm btn-primary rounded-pill btn-block"
                                            href="/event/show/{{ $attendant->event_id }}/edit_invite/{{ $attendant->id }}"><i
                                                class="bi bi-pencil-square align-top mr-1"></i>Edit</a>
                                    </td>
                                @endif
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
