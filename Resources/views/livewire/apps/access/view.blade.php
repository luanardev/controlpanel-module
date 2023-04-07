<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold">Access Rights</h3>
            <button wire:click="create" class="float-right btn btn-sm btn-primary">
                <i class="fas fa-plus-circle"></i> Assign Role
            </button>
        </div>
        <div class="card-body">
            @if(count($app->getAssignedRoles() ) > 0 )
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Role</th>
                        <th>Guard</th>
                        <th>Permissions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($app->getAssignedRoles() as $role)
                        <tr>
                            <td>{{$role->name}}</td>
                            <td>{{$role->guard_name}}</td>
                            <td><a wire:click.prevent="edit({{$role->id}})" href="#">Permissions</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="offset-lg-5 pt-lg-4">
                    <h5>Roles Not Assigned</h5>
                </div>
            @endif
        </div>
    </div>
</div>
