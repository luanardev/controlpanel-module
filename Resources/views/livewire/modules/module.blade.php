<div class="col-lg-8">
    <div class="card card-outline">

        <div class="card-header">
            <h3 class="card-title text-bold">Module</h3>

            <div class="float-right">
                <div class="mb-3 mb-md-0">
                    <div class="dropdown d-block d-md-inline">
                        <button class="btn dropdown-toggle d-block w-100 d-md-inline" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Actions
                        </button>

                        <div class="dropdown-menu dropdown-menu-right w-100" aria-labelledby="actions">
                            
                            @if($module->enabled())
                                <a href="{{url($module->url)}}" class="dropdown-item" target="_blank">
                                    Open in Browser
                                </a>
                                <a wire:click.prevent="disable()" href="#" class="dropdown-item">
                                    Disable
                                </a>
                            @endif

                            @if($module->disabled())
                                <a wire:click.prevent="enable()" href="#" class="dropdown-item">
                                    Enable
                                </a>
                            @endif
                        
                            @if($module->removable())
                                <a wire:click.prevent="uninstall()" href="#" class="dropdown-item">
                                    Uninstall
                                </a>
                            @endif
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">

            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    Module Name
                    <a class="float-right">
                        <span class="text-bold">{{$module->name}}</span>
                    </a>
                </li>
                <li class="list-group-item">
                    Module Alias
                    <a class="float-right">
                        <span class="text-bold">{{$module->alias}}</span>
                    </a>
                </li>
                <li class="list-group-item">
                    Display Name
                    <a class="float-right">
                        <span class="text-bold">{{$module->display_name}}</span>
                    </a>
                </li>

                <li class="list-group-item">
                    Module Status
                    <a class="float-right">
                        <span class="text-bold">{!! $module->statusBadge() !!}</span>
                    </a>
                </li>            

            </ul>

        </div>
    </div>
</div>