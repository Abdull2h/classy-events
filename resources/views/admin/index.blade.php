@extends('layouts.app')

@section('content')

    <div class="container my-2 justify-content-center">
        <!-- First Row -->
        <div class="row justify-content-center mt-2">
            <div class="h4 border border-primary p-2 rounded-pill">Today Events</div>
        </div>

        <!-- Second Row -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-12">
                <!-- Card -->
                @if (count($today_events) == 0)
                    <h6 class="text-center pt-2 text-muted">No Events Today.</h6>
                @else
                    @foreach ($today_events as $t_event)
                        <div class="card mb-3 mx-auto border" style="max-width: 540px; max-height: 500px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="public/images/{{ $t_event->image }}" alt="..."
                                        style="max-height: 200px; max-width: 200px;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"> {{ $t_event->name }}
                                            <span class="badge rounded-pill bg-primary text-white ml-5">
                                                <small>Today</small></span>
                                        </h5>
                                        <p class="card-text">{{ $t_event->description }}</p>
                                        <p class="card-text">Created by:
                                            {{ App\Models\User::where('id', $t_event->owner)->first()->name }}
                                        </p>
                                        <p class="card-text"><small class="text-muted">{{ $t_event->date }} at
                                                {{ $t_event->time }}</small></p>
                                        <div class="card-link d-flex justify-content-end">
                                            <a href="/event/show/{{ $t_event->id }}">
                                                <div class="btn btn-outline-primary btn-sm rounded-pill"><i
                                                        class="bi bi-three-dots-vertical align-top"></i>More</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <!-- End of Card -->
            </div>
        </div>
        <!-- End of second row -->

        <div class="w-75 mx-auto">
            <hr class="bg-info">
        </div>

        <!-- Third Row -->
        <div class="row justify-content-center mt-2">
            <div class="h4 border border-success p-2 rounded-pill">Future Events</div>
        </div>

        <!-- Fourth Row -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-12">
                <!-- Card -->
                @if (count($future_events) == 0)
                    <h6 class="text-center pt-2 text-muted">No Future Events.</h6>
                @else
                    @foreach ($future_events as $f_event)
                        <div class="card mb-3 mx-auto border" style="max-width: 540px; max-height: 500px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="public/images/{{ $f_event->image }}" alt="..."
                                        style="max-height: 200px; max-width: 200px;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"> {{ $f_event->name }}
                                            <span class="badge rounded-pill bg-success text-white ml-5">
                                                <small>Cooming</small></span>
                                        </h5>
                                        <p class="card-text">{{ $f_event->description }}</p>
                                        <p class="card-text">Created by:
                                            {{ App\Models\User::where('id', $f_event->owner)->first()->name }}
                                        </p>
                                        <p class="card-text"><small class="text-muted">{{ $f_event->date }} at
                                                {{ $f_event->time }}</small></p>
                                        <div class="card-link d-flex justify-content-end">
                                            <a href="/event/show/{{ $f_event->id }}">
                                                <div class="btn btn-outline-primary btn-sm rounded-pill"><i
                                                        class="bi bi-three-dots-vertical align-top"></i>More</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <!-- End of Card -->
            </div>
        </div>
        <!-- End of Fourth row -->

        <div class="w-75 mx-auto">
            <hr class="bg-info">
        </div>

        <!-- Fifth Row -->
        <div class="row justify-content-center">
            <div class="h4 border border-danger p-2 rounded-pill">Past Events</div>
        </div>

        <!-- Sixth Row -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Card -->
                @if (count($past_events) == 0)
                    <h6 class="text-center pt-2 text-muted">No Past Events.</h6>
                @else
                    @foreach ($past_events as $p_event)
                        <div class="card mb-3 mx-auto border" style="max-width: 540px; max-height: 500px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="public/images/{{ $p_event->image }}" alt="..."
                                        style="max-height: 200px; max-width: 200px;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"> {{ $p_event->name }}
                                            <span class="badge rounded-pill bg-danger text-white ml-5">
                                                <small>Ended</small></span>
                                        </h5>
                                        <p class="card-text">{{ $p_event->description }}</p>
                                        <p class="card-text">Created by:
                                            {{ App\Models\User::where('id', $p_event->owner)->first()->name }}
                                        </p>
                                        <p class="card-text"><small class="text-muted">{{ $p_event->date }} at
                                                {{ $p_event->time }}</small></p>
                                        <div class="card-link d-flex justify-content-end">
                                            <a href="/event/show/{{ $p_event->id }}">
                                                <div class="btn btn-outline-primary btn-sm rounded-pill"><i
                                                        class="bi bi-three-dots-vertical align-top"></i>More</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <!-- End of Card -->
            </div>
        </div>
        <!-- End of Sixth row -->
    </div>
@endsection
