@extends('layouts.app')

@section('content')

    <div class="container my-2 border justify-content-center">
        <!-- First Row -->
        <div class="row justify-content-center">
            <div class="h4">Current Events</div>
        </div>

        <!-- Second Row -->
        <div class="row justify-content-center">
            <div class="col-md-8 border border-primary justify-content-center">
                <!-- Card -->
                @foreach ($my_events as $event)
                    <div class="card mb-3 border" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="public/images/{{ $event->image }}" alt="..."
                                    style="max-height: 200px; max-width: 200px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $event->name }}</h5>
                                    <p class="card-text">{{ $event->description }}</p>
                                    <p class="card-text"><small class="text-muted">{{ $event->date }} at
                                            {{ $event->time }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- End of Card -->
            </div>
        </div>
        <!-- End of second row -->
    </div>
@endsection
