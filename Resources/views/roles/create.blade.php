@extends('controlpanel::layouts.app')

@section('content')

<div class="container-fluid">

	<div class="content-header">

		<div class="row mb-2">
			<div class="col-sm-6">
				<h4 class="m-0">Create Role</h4>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ url('controlpanel') }}">Home</a></li>
					<li class="breadcrumb-item "><a href="{{ route('roles.index') }}">Roles</a></li>
					<li class="breadcrumb-item active">Create</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="content">
        <livewire:controlpanel::roles.user-role />                 
	</div>
</div>

@endsection
