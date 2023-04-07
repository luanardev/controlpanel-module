<div class="card card-outline">
    <div class="card-header">
        <div class="float-left">
            <div class="form-inline">
                <div class="input-group">
                    <select wire:model="filter" class="form-control form-control-sidebar">
                        <option value="">All Apps</option>
                        <option value="Enabled">Active</option>
                        <option value="Disabled">Disabled</option>
                        <option value="Hidden">Hidden</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="float-right">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="input-group">
                    <input wire:model="search" type="text" class="form-control" placeholder="Search Apps">
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <x-adminlte-flash/>
        <div class="row">
            @forelse ($apps as $app)
                @if($app->isNotDefault())
                    <div class="col-md-3 col-sm-4">
                        <div class="wrimagecard wrimagecard-topimage">
                            <a href="{{route('apps.show', $app)}}">
                                <div class="wrimagecard-topimage_header ">
                                    <div class="text-center"><i class="{{$app->icon}}"
                                                                style="font-size:40px ;color:{{$app->color}}"></i></div>
                                    <p style="font-size: 18px;"
                                       class="text-muted text-center">{{$app->display_name}}</p>
                                    <div class="text-muted text-center">
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

