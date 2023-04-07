<div class="col-lg-12">
    <div class="card card-outline">

        @if($browseMode)
            <div class="card-header">
                <h3 class="card-title text-bold">App Details</h3>

                <div class="float-right">
                    <div class="mb-3 mb-md-0">
                        <div class="dropdown d-block d-md-inline">
                            <button class="btn dropdown-toggle d-block w-100 d-md-inline" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                            </button>

                            <div class="dropdown-menu dropdown-menu-right w-100" aria-labelledby="actions">
                                <a wire:click.prevent="edit()" href="#" class="dropdown-item">
                                    Edit
                                </a>
                                @if($app->enabled())
                                    <a wire:click.prevent="disable()" href="#" class="dropdown-item">
                                        Disable
                                    </a>
                                @endif

                                @if($app->disabled())
                                    <a wire:click.prevent="enable()" href="#" class="dropdown-item">
                                        Enable
                                    </a>
                                @endif

                                @if($app->isNotHidden())
                                    <a wire:click.prevent="hide()" href="#" class="dropdown-item">
                                        Hide
                                    </a>
                                @endif

                                @if($app->isHidden())
                                    <a wire:click.prevent="unhide()" href="#" class="dropdown-item">
                                        Unhide
                                    </a>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">

                        <div class="wrimagecard wrimagecard-topimage">
                            <a href="#">
                                <div class="wrimagecard-topimage_header" style="background-color:{{$app->background}} ">
                                    <div class="text-center">
                                        <i class="{{$app->icon}}" style="color:{{$app->color}}"></i>
                                    </div>
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
                    <div class="col-lg-9">

                        <ul class="list-group list-group-bordered">

                            <li class="list-group-item">
                                App Name
                                <a class="float-right">
                                    <span class="text-bold">{{$app->display_name}}</span>
                                </a>
                            </li>

                            <li class="list-group-item">
                                App Group
                                <a class="float-right">
                                    <span class="text-bold">{{$app->group}}</span>
                                </a>
                            </li>

                            <li class="list-group-item">
                                App Icon
                                <a class="float-right">
                                    <span class="text-bold">{{$app->icon}}</span>
                                </a>
                            </li>
                            <li class="list-group-item">
                                App Color
                                <a class="float-right">
                                    <span class="text-bold">{{$app->color}}</span>
                                </a>
                            </li>
                            <li class="list-group-item">
                                Background Color
                                <a class="float-right">
                                    <span class="text-bold">{{$app->background}}</span>
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>
            </div>
        @endif

        @if($editMode)
            <form wire:submit.prevent="save">
                <div class="card-header">
                    <h3 class="card-title text-bold">Edit App</h3>
                    <div class="float-right">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fas fa-check-circle"></i> Save
                        </button>

                        <button type="button" wire:click="show()" class="btn btn-sm btn-secondary">
                            <i class="fas fa-times-circle"></i> Cancel
                        </button>
                    </div>
                </div>

                <div class="card-body">

                    <x-adminlte-validation/>

                    <div class="row">
                        <div class="col-lg-3">

                            <div class="wrimagecard wrimagecard-topimage">
                                <a href="#">
                                    <div class="wrimagecard-topimage_header"
                                         style="background-color:{{$app->background}} ">
                                        <div class="text-center">
                                            <i class="{{$app->icon}}" style="color:{{$app->color}}"></i>
                                        </div>
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
                        <div class="col-lg-9">

                            <div class="form-group row">
                                <label class="text-lg-right col-lg-3 col-form-label col-form-label-sm ">
                                    App Name *
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" wire:model="app.display_name" class="form-control "
                                           placeholder="Display Name"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="text-lg-right col-lg-3 col-form-label col-form-label-sm ">
                                    App Group *
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" wire:model="app.group" class="form-control "
                                           placeholder="Group"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="text-lg-right col-lg-3 col-form-label col-form-label-sm ">
                                    App Icon *
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" wire:model="app.icon" class="form-control"
                                           placeholder="Font Awesome Icon"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="text-lg-right col-lg-3 col-form-label col-form-label-sm ">
                                    App Color *
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" wire:model.lazy="app.color" class="form-control "
                                           placeholder="Icon Color "/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="text-lg-right col-lg-3 col-form-label col-form-label-sm ">
                                    Background Color *
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" wire:model.lazy="app.background" class="form-control"
                                           placeholder="Background Color "/>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </form>
        @endif
    </div>

</div>

