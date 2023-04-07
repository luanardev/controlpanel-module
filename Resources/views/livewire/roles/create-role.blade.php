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
                </div>
            </div>
            <div class="card-body">

                <x-adminlte-validation/>

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label class="col-form-label ">
                                Role Name *
                            </label>
                            <div class="">
                                <input type="text" wire:model="role.name" class="form-control" placeholder="Enter Name"
                                       required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label ">
                                Assign App *
                            </label>
                            <div class="">
                                <select wire:model="selectApp" class="form-control">
                                    <option value="">--select--</option>
                                    @foreach ($viewBag->get('apps') as $app)
                                        <option value="{{$app->id}}">{{$app->display_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @isset($this->selectedApp)

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card card-outline card-primary pre-scrollable">
                                        <div class="card-header">
                                            <h3 class="card-title text-bold">
                                                <a class="d-block">
                                                    {{strtoupper($this->selectedApp->display_name)}}
                                                </a>
                                            </h3>
                                            <div class="float-right">
                                                <a class="btn btn-sm btn-primary" href="#"
                                                   wire:click="savePermissions()">Add</a>
                                            </div>
                                        </div>


                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="checkbox text-muted py-2">
                                                    <label>
                                                        <input type="checkbox" wire:model="selectPermissions"
                                                               style="width:20px; height:20px;"/>
                                                        Select All
                                                    </label>
                                                </div>
                                                <div class="row">

                                                    @foreach($this->selectedApp->permissions()->get() as $permission)
                                                        <div class="col-md-6">
                                                            <div class="checkbox text-muted">
                                                                <label>
                                                                    <input type="checkbox"
                                                                           wire:model="selectedPermissions"
                                                                           value="{{$permission->id}}"
                                                                           style="width:20px; height:20px;">
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

                    </div>
                    @if(count($this->savedApps) )
                        <div class="col-md-6">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>App</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($this->savedApps as $name)
                                    <tr>
                                        <td>{{$name}}</td>
                                        <td><a href="#" wire:click="deletePermissions('{{$name}}')"
                                               class="btn btn-sm btn-danger">delete</a></td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </form>
</div>
