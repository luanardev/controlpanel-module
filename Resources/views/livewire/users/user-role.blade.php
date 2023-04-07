<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12">
        @if($browseMode)
            <div class="card card-outline">

                <div class="card-header">
                    <h3 class="card-title text-bold">User Role</h3>

                    <div class="float-right">
                        <div class="mb-3 mb-md-0">
                            <div class="dropdown d-block d-md-inline">
                                <button class="btn dropdown-toggle d-block w-100 d-md-inline" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions
                                </button>

                                <div class="dropdown-menu dropdown-menu-right w-100" aria-labelledby="actions">
                                    <a wire:click.prevent="create()" href="#" class="dropdown-item">
                                        Add Role
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    @if($user->roles()->count())
                        <ul class="list-group list-group-unbordered">
                            @foreach ($user->roles()->get() as $role )
                                <li class="list-group-item ">
                                    {{$role->name}}
                                    <a class="float-right text-danger" wire:click.prevent="delete({{$role->id}})"
                                       href="#">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    @else
                        <div class="offset-lg-5 pt-lg-4">
                            <h5>Role Not Found</h5>
                        </div>

                    @endif
                </div>
            </div>
        @endif

        @if($createMode)
            <div class="card card-outline">
                <form wire:submit.prevent="save">
                    <div class="card-header">
                        <h3 class="card-title text-bold">
                            User Role
                        </h3>
                        <div class="float-right">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fas fa-check-circle"></i> Save
                            </button>

                            <button type="button" wire:click.prevent="show()" class="btn btn-sm btn-secondary">
                                <i class="fas fa-times-circle"></i> Cancel
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <x-adminlte-validation/>

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="form-group">
                                    <label> Select Role * </label>

                                    <select wire:model.lazy="role" class="form-control">
                                        <option value="">--select--</option>
                                        @foreach ($viewBag->get('roles') as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endif
    </div>

</div>
