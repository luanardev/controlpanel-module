@extends('controlpanel::layouts.app')

@section('content')

<div class="container-fluid">

	<div class="content-header">

		<div class="row mb-2">
			<div class="col-sm-6">
				<h4 class="m-0">{{$role->name}}</h4>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ url('controlpanel') }}">Home</a></li>
					<li class="breadcrumb-item "><a href="{{ route('roles.index') }}">Roles</a></li>
					<li class="breadcrumb-item active">Role</li>
				</ol>
			</div>
		</div>
	</div>

    <div class="content">

        <div class="row">         
            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="card">

                    <div class="card-header">
                        
                        <div class="float-right"> 
                            <a class="btn btn-sm btn-primary"  href="{{route('roles.index')}}" >
                                <i class="fas fa-users"></i> Roles
                            </a>            
                            <a class="btn btn-sm btn-primary"  href="{{route('roles.show', $role)}}" >
                                <i class="fas fa-sync-alt"></i> Refresh
                            </a>                          
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <livewire:controlpanel::roles.user-role :role=$role  />  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection