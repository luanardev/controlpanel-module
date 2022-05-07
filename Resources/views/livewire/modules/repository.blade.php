<div class="card card-outline">
    <div class="card-header">
        <h3 class="card-title text-bold">Repository</h3>
    </div>

    <div class="card-body">
        <div class="row"> 
            
            @forelse ($modules as $module)
            <div class="col-lg-2 col-md-3 col-sm-6">                       
                <div class="card card-widget widget-user">									
                    <div class="widget-user-header">
                        <img class="img-circle" src="{{asset('assets/images/app.png')}}" width="50px" />										
                        <h6 class="widget-user-desc text-center">{{$module->getName()}}</h6>
                        @php $name = $module->getName() @endphp
                        <a wire:click="install('{{$name}}')" href="#" >Install </a> 									
                    </div>									
                </div>
            </div>
            @empty
            <div class="offset-lg-5 pt-lg-4">
                <h5>Modules Not found</h5>
            </div> 
            @endforelse
            

        </div>
    </div>
</div>

