
<li class="nav-item">
    <a href="{{route('controlpanel.home')}}" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

@can('view_user')
<li class="nav-item">
	<a href="{{route('users.index')}}"  class="nav-link">
		<i class="nav-icon fas fa-users"></i>
		<p>System Users</p>
	</a>
</li>
@endcan

@can('view_user')
<li class="nav-item">
	<a href="{{route('users.search')}}" class="nav-link">
		<i class="nav-icon fas fa-search"></i>
		<p>Search User</p>
	</a>
</li>
@endcan

@can('view_roles')
<li class="nav-item">
	<a href="{{route('roles.index')}}" class="nav-link">
		<i class="nav-icon fas fa-user-cog"></i>
		<p>System Roles</p>
	</a>
</li>
@endcan

@can('configure_module')
<li class="nav-item">
	<a href="{{route('modules.index')}}"  class="nav-link">
		<i class="nav-icon fas fa-cubes"></i>
		<p>Modules</p>
	</a>
</li>
@endcan

<li class="nav-item">
	<a href="{{url('user-activity')}}" target="_blank" class="nav-link">
		<i class="nav-icon fas fa-user-cog"></i>
		<p>User Logs</p>
	</a>
</li>










