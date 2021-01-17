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
                    <li class="list-group-item text-center"><img src="../../public/images/{{ $event->image }}" alt="..."
                            style="max-height: 400px; max-width: 400px;"></li>
                    <li class="list-group-item">Name: {{ $event->name }}</li>
                    <li class="list-group-item">Description: {{ $event->description }}</li>
                    <li class="list-group-item">Location: {{ $event->location }}</li>
                    <li class="list-group-item">Date: {{ $event->date }}</li>
                    <li class="list-group-item">Time: {{ $event->time }}</li>
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
                    <tbody>
                        @foreach ($attendants as $attendant)
                            <tr>
                                <td>{{ $attendant->name }}</td>
                                <td>{{ $attendant->email }}</td>
                                <td>{{ $attendant->seats }}</td>
                                <td>{{ $attendant->code }}</td>
                                <td><button class="btn btn-sm btn-primary rounded-pill">Edit</button></td>
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
@endsection
