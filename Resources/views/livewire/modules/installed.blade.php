<div class="card card-outline">
    <div class="card-header">
        <div class="float-left">
            <h3 class="card-title text-bold">Installed</h3>
        </div>
        <div class="float-right">
            <div class="col-lg-12 col-md-12 col-sm-12">               
                <div class="input-group">
                    <input wire:model="search" type="text" class="form-control" placeholder="Search Installed Modules">
                </div>              
            </div>
        </div>
    </div>
    
    <div class="card-body">
        <x-adminlte-flash />
        <div class="row">
            @forelse ($modules as $module)
                @if(!$module->isDefault())            
                <div class="col-lg-2 col-md-3 col-sm-6">  
                    <a href="{{route('modules.show', $module)}}">                     
                        <div class="card card-widget widget-user">									
                            <div class="widget-user-header">
                                <img class="img-circle" src="{{asset('img/app.png')}}" width="50px" />										
                                <h6 class="widget-user-desc text-center">{{$module->display_name}}</h6>
                                <p>{!! $module->statusBadge() !!}</p>									
                            </div>									
                        </div>
                    </a>                       
                </div>
                @endif   
            @empty
                <div class="offset-lg-5 pt-lg-4">
                    <h5>Modules Not found</h5>
                </div> 
            @endforelse
        
        </div>
    </div>
        
</div>

