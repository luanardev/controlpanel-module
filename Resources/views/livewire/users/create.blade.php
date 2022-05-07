
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

            <x-adminlte-validation />

            <div class="row">
                
                <div class="col-md-9">

                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Full Name *
                        </label>
                        <div class="col-sm-6">
                            <input type="text" wire:model.lazy="user.name"  class="form-control " placeholder="Enter Full Name"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Email Address *
                        </label>
                        <div class="col-sm-6">
                            <input type="email" wire:model.lazy="user.email"  class="form-control" placeholder="Enter Email Address" />
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Campus *
                        </label>
                        <div class="col-sm-6">
                            <select wire:model.lazy="user.campus" class="form-control select2" >
                                <option value="">--select--</option>
                                @foreach ($viewBag->get('campuses') as $campus)
                                    <option value="{{$campus}}" >{{$campus->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
   
                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Role *
                        </label>
                        <div class="col-sm-6">
                            <select wire:model.lazy="role" class="form-control select2" >
                                <option value="">--select--</option>
                                @foreach ($viewBag->get('roles') as $role)
                                    <option value="{{$role->id}}" >{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
