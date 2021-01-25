@if($errors->any())
    <div class="alert alert-danger rounded-pill w-50 text-center">
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success rounded-pill w-50 text-center alert-dismissible fade show" role="alert"><i class="bi bi-check2-circle mr-1 h5"></i>
        {{session('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger rounded-pill w-50 text-center alert-dismissible fade show" role="alert"><i class="bi bi-x-circle mr-1 h5"></i>
        {{session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
