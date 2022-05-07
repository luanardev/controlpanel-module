<div class="col-lg-12">
    <div class="card card-outline">
        <x-adminlte-validation />
        <form wire:submit.prevent="store">

            <div class="card-header">
                <h3 class="card-title text-bold">Assign Role</h3>
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
            
                <div class="form-group">
                    <label class="control-label">Select Role </label>
                    <select wire:model="role" class="form-control col-lg-4" required >
                        <option value="">--select--</option>
                        @foreach ($viewBag->get('unassignedRoles') as $role)
                            @if($role->name !== 'admin')
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                @if(!empty($this->role))
                <div class="form-group">
                    <div class="checkbox py-2">
                        <label>    
                            <input wire:model="selectAll" type="checkbox" style="width:20px; height:20px;" />                     
                            Check All                         
                        </label>                 
                    </div>
                    <div class="row">
                        @foreach($viewBag->get('permissions') as $permission)            
                            <div class="col-md-3">
                                <div class="checkbox text-muted">                              
                                    <label>
                                        <input wire:model="permissions" value="{{$permission->id}}" type="checkbox" style="width:20px; height:20px;">
                                        {{$permission->display_name}}
                                    </label>                                 
                                </div>
                            </div>
                        @endforeach
                    </div>                    
                </div>
                @endif                   
            </div>
        </form>
    </div>
</div>