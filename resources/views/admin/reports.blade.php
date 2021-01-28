@extends('layouts.app')

@section('content')
    <div class="container text-light">
        <!-- First Row -->
        <div class="row justify-content-center my-2">
            <div class="h4 b-b text-dark">Reports</div>
        </div>

        <!-- Second Row -->
        <div class="row my-2">
            <!-- First Col -->
            <div class="col-md-6 my-2">
                <div class="card card-1 b-l">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="bi bi-calendar2-week text-light h1"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>{{ App\Models\Event::count() }}</h3>
                                    <span>Events</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Col -->
            <div class="col-md-6 my-2">
                <div class="card card-3 b-l">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="bi bi-people text-light h1"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>{{ App\Models\Attendant::distinct('email')->count() }}</h3>
                                    <span>Attendants</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End of second row -->

        <!-- Third Row -->
        <div class="row my-2">
            <!-- First Col -->
            <div class="col-md-4 my-2">
                <div class="card card-1 b-r">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="bi bi-person-circle text-light h1"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>{{ App\Models\User::count() }}</h3>
                                    <span>Users</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Col -->
            <div class="col-md-4 my-2">
                <div class="card card-2 b-r">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="bi bi-file-earmark-person text-light h1"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>{{ App\Models\Host::count() }}</h3>
                                    <span>Hosts</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Third Col -->
            <div class="col-md-4 my-2">
                <div class="card card-3 b-r">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="bi bi-door-open text-light h1"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>{{ App\Models\Doorman::count() }}</h3>
                                    <span>Doormen</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End of second row -->

        <!-- Fourth Row -->
        <div class="row my-2">
            <!-- First Col -->
            <div class="col-md-6 my-2">
                <div class="card card-1 b-l">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="success">{{ App\Models\Attendant::count() }}</h3>
                                    <span>Invitatons send</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="bi bi-envelope text-light h1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Second Col -->
            <div class="col-md-6 my-2">
                <div class="card card-3 b-l">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="success">{{ App\Models\Event::distinct('doorman')->count() }}</h3>
                                    <span>Doormen assigned</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="bi bi-shield-lock text-light h1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End of Fourth Row -->

        <!-- Fifth Row -->
        <div class="row my-2">

            <!-- First Col -->
            <div class="col-md-4 my-2">
                <div class="card card-1 b-r">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h4 class="primary">{{ $active_host->name }}</h4>
                                    <small class="primary">{{ $active_host->email }}</small><br>
                                    <span>Most Active Host</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="bi bi-bookmark-star text-light h1"></i>
                                </div>
                            </div>
                            <div class="progress mt-1 mb-0" style="height: 7px; background-color: lightgrey">
                                <div class="progress-bar bg-b" role="progressbar"
                                    style="width: {{ (App\Models\Event::where('owner', $active_host->id)->count() / App\Models\Event::count()) * 100 }}%"
                                    aria-valuenow="{{ (App\Models\Event::where('owner', $active_host->id)->count() / App\Models\Event::count()) * 100 }}"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Col -->
            <div class="col-md-4 my-2">
                <div class="card card-2 b-r">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h4 class="primary">{{ $active_doorman->name }}</h4>
                                    <small class="primary">{{ $active_doorman->email }}</small><br>
                                    <span>Most Active Doorman</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="bi bi-award text-light h1"></i>
                                </div>
                            </div>
                            <div class="progress mt-1 mb-0" style="height: 7px; background-color: lightgrey">
                                <div class="progress-bar bg-b" role="progressbar"
                                    style="width: {{ (App\Models\Event::where('doorman', $active_doorman->id)->count() / App\Models\Event::count()) * 100 }}%"
                                    aria-valuenow="{{ (App\Models\Event::where('doorman', $active_doorman->id)->count() / App\Models\Event::count()) * 100 }}"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Third Col -->
            <div class="col-md-4 my-2">
                <div class="card card-3 b-r">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <a href="/event/show/{{ $active_event->id }}">
                                        <h4 class="text-light">Show Event Page</h4>
                                    </a>
                                    <small class="primary">Attendants:
                                        {{ App\Models\Attendant::where('event_id', $active_event->id)->count() }}</small><br>
                                    <span>Most Event Has Attendants</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="bi bi-diagram-3 text-light h1"></i>
                                </div>
                            </div>
                            <div class="progress mt-1 mb-0" style="height: 7px; background-color: lightgrey">
                                <div class="progress-bar bg-b" role="progressbar"
                                    style="width: {{ (App\Models\Attendant::where('event_id', $active_event->id)->count() / App\Models\Attendant::count()) * 100 }}%"
                                    aria-valuenow="{{ (App\Models\Attendant::where('event_id', $active_event->id)->count() / App\Models\Attendant::count()) * 100 }}"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!-- End of fifth Row -->

    </div>
    <!-- End of container -->
@endsection
