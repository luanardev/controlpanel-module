@extends('controlpanel::layouts.app')
@section('content')

<div class="container-fluid">
    <div class="content-header">
	
		<div class="row mb-2">
			<div class="col-sm-6">
				<h4 class="m-0">{{$module->display_name}} Module</h4>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ url('controlpanel') }}">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('modules.index') }}">Modules</a></li>
					<li class="breadcrumb-item active">Configure</li>
				</ol>
			</div>
		</div>
	</div>

    <div class="content">

        <div class="row">         
            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="card">

                    <div class="card-header">

                        <div class="float-left">
                            <div class="py-1">
                                <ul class="nav nav-pills" id="custom-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#module" role="tab" aria-controls="module" aria-selected="true">Module</a>
                                    </li>
                                    @if($module->configurable == true)
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#settings" role="tab" aria-controls="settings" aria-selected="true">Settings</a>
                                    </li>
                                    @endif
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#acl" role="tab" aria-controls="acl" aria-selected="false">Access Control</a>
                                    </li>               
                                </ul>
                            </div>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-sm btn-primary"  href="{{route('modules.index')}}" >
                                <i class="fas fa-list-alt"></i> Modules
                            </a>               
                            <a class="btn btn-sm btn-primary"  href="{{route('modules.show', $module)}}" >
                                <i class="fas fa-sync-alt"></i> Refresh
                            </a>
                            
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-content">
                    
                            <div class="tab-pane fade active show" id="module" role="tabpanel" aria-labelledby="module">
                                @livewire('controlpanel::modules.module', ['module'=> $module])  
                                
                            </div>
                            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings">
                                @if($module->configurable == true)
                                    @livewire($module->alias.'::settings')  
                                @endif                
                            </div>

                            <div class="tab-pane fade" id="acl" role="tabpanel" aria-labelledby="acl">
                                @livewire('controlpanel::modules.access', ['module'=> $module]) 
                            </div>                            
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
