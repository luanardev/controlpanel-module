@extends('controlpanel::layouts.app')
@section('content')

<div class="container-fluid">
	<div class="content-header">
	
		<div class="row mb-2">
			<div class="col-sm-6">
				<h4 class="m-0">Module Management</h4>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ url('controlpanel') }}">Home</a></li>
					<li class="breadcrumb-item active">Modules</li>
				</ol>
			</div>
		</div>
	</div>


	<div class="content">
        <div class="card">

			<div class="card-header">
				<div class="py-1">
					<div class="float-left">   
						<ul class="nav nav-pills" id="custom-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="pill" href="#installed" role="tab" aria-controls="installed" aria-selected="true">Installed</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="pill" href="#repository" role="tab" aria-controls="installed" aria-selected="false">Repository</a>
							</li>                
						</ul>
					</div>    
					<div class="float-right">               
						<a class="btn btn-sm btn-primary"  href="{{route('modules.index')}}" >
							<i class="fas fa-sync-alt"></i> Refresh
						</a>
					</div>
				</div>
			</div>
		
			<div class="card-body">
			
				<div class="tab-content" id="custom-tabs-content">
		
					<div class="tab-pane fade active show" id="installed" role="tabpanel" aria-labelledby="installed">
						<livewire:controlpanel::modules.installed />
					</div>
					<div class="tab-pane fade" id="repository" role="tabpanel" aria-labelledby="installed">
						<livewire:controlpanel::modules.repository />
					</div>
					
				</div>  
			</div>        
		</div>
			
    </div>
</div>

@endsection

