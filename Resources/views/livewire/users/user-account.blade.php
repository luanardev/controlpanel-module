<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        @if($editMode)
            <div class="card card-outline">
                <form wire:submit.prevent="save">
                    <div class="card-header">
                        <h3 class="card-title text-bold">
                            Account info
                        </h3>
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

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="form-group row">
                                    <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                                        Full Name *
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" wire:model.lazy="user.name" class="form-control @error('user.name') is-invalid @enderror "
                                               placeholder="Enter Full Name"/>

                                        @error('user.name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                                        Email Address *
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="email" wire:model.lazy="user.email" class="form-control @error('user.email') is-invalid @enderror"
                                               placeholder="Enter Email Address"/>
                                        @error('user.email')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                                        Role
                                    </label>
                                    <div class="col-sm-6">
                                        <select wire:model.lazy="role" class="form-control @error('role') is-invalid @enderror">
                                            <option value="">--select--</option>
                                            @foreach ($viewBag->get('roles') as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                                        Campus
                                    </label>
                                    <div class="col-sm-6">
                                        <select wire:model.lazy="campus" class="form-control @error('campus') is-invalid @enderror">
                                            <option value="">--select--</option>
                                            @foreach ($viewBag->get('campuses') as $campus)
                                                <option value="{{$campus->id}}">{{$campus->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('campus')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endif

        @if($browseMode)
            <div class="card card-outline">
                <div class="card-header">
                    <h3 class="card-title text-bold">Account Info</h3>
                    <div class="float-right">
                        <div class="mb-3 mb-md-0">
                            <div class="dropdown d-block d-md-inline">
                                <button class="btn dropdown-toggle d-block w-100 d-md-inline" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions
                                </button>

                                <div class="dropdown-menu dropdown-menu-right w-100" aria-labelledby="actions">
                                    @can('update-user')
                                        <a wire:click.prevent="edit()" href="#" class="dropdown-item">
                                            Edit User
                                        </a>
                                        @if($user->deactivated())
                                            <a wire:click.prevent="activate()" href="#" class="dropdown-item">
                                                Activate
                                            </a>
                                        @endif

                                        @if($user->activated())
                                            <a wire:click.prevent="deactivate()" href="#" class="dropdown-item">
                                                Deactivate
                                            </a>
                                        @endif
                                        <a wire:click.prevent="password()" href="#" class="dropdown-item">
                                            Reset Password
                                        </a>
                                    @endcan
                                    @can('delete-user')
                                        <a wire:click.prevent="delete()" href="#" class="dropdown-item">
                                            Delete Account
                                        </a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            User Name
                            <a class="float-right">
                                <span class="text-bold">{{$user->name}}</span>
                            </a>
                        </li>

                        <li class="list-group-item">
                            User Email
                            <a class="float-right">
                                <span class="text-bold">{{$user->email}}</span>
                            </a>
                        </li>

                        <li class="list-group-item">
                            User Campus
                            <a class="float-right">
                                <span class="text-bold">{{$userCampus}}</span>
                            </a>
                        </li>

                        <li class="list-group-item">
                            Created Date
                            <a class="float-right">
                                <span class="text-bold">{{$user->createdDate()}}</span>
                            </a>
                        </li>

                        <li class="list-group-item">
                            Account Status
                            <a class="float-right">
                                <span class="text-bold">{!! $user->statusBadge() !!}</span>
                            </a>
                        </li>

                    </ul>

                </div>
            </div>
        @endif
    </div>
</div>
