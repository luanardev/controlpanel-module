<div class="col-lg-12">
    <div class="card card-outline">
        <x-adminlte-validation/>
        <form wire:submit.prevent="update">

            <div class="card-header">
                <h3 class="card-title text-bold">{{$app->display_name}}</h3>
                <div class="float-right">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fas fa-check-circle"></i> Save
                    </button>
                </div>
            </div>

            <div class="card-body">

                <table class="table table-sm table-responsive-lg">
                    <thead>
                    <tr>
                        <th>
                            <input class="checkbox py-2" wire:model="updateAll" type="checkbox"
                                   style="width:20px; height:20px;"/>
                        </th>
                        <th>Permission</th>
                        <th>Slug</th>
                        <th>Guard</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($viewBag->get('permissions') as $permission)
                        <tr>
                            <td>
                                <input class="checkbox text-muted" wire:model="permissions" value="{{$permission->id}}"
                                       type="checkbox" style="width:20px; height:20px;">
                            </td>
                            <td> {{$permission->display_name}}</td>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->guard_name}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </form>
    </div>
</div>
