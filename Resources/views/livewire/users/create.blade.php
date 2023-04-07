<div class="card card-outline">
    <form wire:submit.prevent="save">
        <div class="card-header">
            <h3 class="card-title text-bold">
                User information
            </h3>
            <div class="float-right">
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="fas fa-check-circle"></i> Save
                </button>
                <a href="{{route('users.index')}}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-times-circle"></i> Cancel
                </a>
            </div>
        </div>
        <div class="card-body">

            <div class="row">

                <div class="col-md-9">

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
