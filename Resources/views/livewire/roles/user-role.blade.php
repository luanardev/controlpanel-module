
<div>
    <form wire:submit.prevent="save">
        <div class="card card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"> 
                    User Role
                </h3>
                <div class="float-right">
                    <button type="submit" class="btn btn-sm btn-primary"> 
                        <i class="fas fa-check-circle"></i> Save 
                    </button>
                          
                    <a href="{{route('roles.index')}}" class="btn btn-sm btn-secondary"> 
                        <i class="fas fa-times-circle"></i> Cancel
                    </a>
                 
                    @if($editMode)
                        <button type="button" wire:click="delete()" class="btn btn-sm btn-danger"> 
                            <i class="fas fa-trash"></i> Delete 
                        </button>
                    @endif
                </div>   
            </div>
            <div class="card-body">

                <x-adminlte-validation />

                <div class="row">
                    
                    <div class="col-md-9">

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label  ">
                                Role Name *
                            </label>
                            <div class="col-sm-6">
                                <input type="text" wire:model="role.name"  class="form-control " placeholder="Enter Name"/>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"> 
                    Permissions                                                            
                </h3>
            </div>
        
            <div class="card-body">

                <div id="accordion">

                    <div class="row">
                        @forelse ($viewBag->get('modules') as  $module)
                            @if(!$module->isDefault())
                            <div class="col-lg-12">
                                <div class="card card-outline card-primary pre-scrollable">
                                    <div class="card-header">
                                        <h3 class="card-title text-bold">
                                            <a class="d-block w-100 collapsed" data-toggle="collapse" href="#module{{$module->id}}" aria-expanded="false">
                                                {{strtoupper($module->display_name)}}
                                            </a>
                                        </h3>
                                    </div>
                                    
                                    <div id="module{{$module->id}}" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="checkbox text-muted py-2">
                                                    <label >    
                                                        <input type="checkbox" wire:model="selectGroup.{{$module->id}}" value="{{$module->id}}" style="width:20px; height:20px;" />                     
                                                        Check All                         
                                                    </label>                 
                                                </div>
                                                <div class="row">
                                                    
                                                    @foreach($module->permissions as $permission)            
                                                        <div class="col-md-3">
                                                            <div class="checkbox text-muted">                               
                                                                <label>
                                                                    <input type="checkbox" wire:model="permissions" value="{{$permission->id}}" style="width:20px; height:20px;">
                                                                    {{$permission->display_name}}
                                                                </label>                                      
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                  
                                                </div>                    
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @empty
                        <div class="offset-lg-5 pt-lg-4">
                            <h5>Permission Not found</h5>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>       
        </div>
    </form>
</div>
