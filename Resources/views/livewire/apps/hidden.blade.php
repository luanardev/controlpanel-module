<div class="card card-outline">
    <div class="card-header">
        <div class="float-left">
            <h3 class="card-title text-bold">Hidden</h3>
        </div>

    </div>

    <div class="card-body">
        <x-adminlte-flash/>
        <div class="row">
            @forelse ($apps as $app)
                @if($app->isNotDefault() && $app->isHidden())
                    <div class="col-md-3 col-sm-4">
                        <div class="wrimagecard wrimagecard-topimage">
                            <a href="{{route('apps.show', $app)}}">
                                <div class="wrimagecard-topimage_header" style="background-color:{{$app->background}} ">
                                    <div class="text-center"><i class="{{$app->icon}}"
                                                                style="color:{{$app->color}}"></i></div>
                                </div>
                                <div class="wrimagecard-topimage_title">
                                    <div class="text-muted text-center">
                                        {{$app->display_name}} <br/>
                                        <span class="badge">{!! $app->statusBadge() !!}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            @empty
                <div class="offset-lg-5 pt-lg-4">
                    <h5>Apps Not found</h5>
                </div>
            @endforelse

        </div>
    </div>

</div>

