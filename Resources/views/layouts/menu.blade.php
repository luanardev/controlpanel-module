<li class="nav-item">
    <a href="{{route('controlpanel.module')}}" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>


@can('manage-app')
    <li class="nav-item">
        <a href="{{route('apps.index')}}" class="nav-link">
            <i class="nav-icon fas fa-cubes"></i>
            <p>Apps</p>
        </a>
    </li>
@endcan

@can('read-user')
    <li class="nav-item">
        <a href="{{route('users.index')}}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Users</p>
        </a>
    </li>
@endcan

@can('read-role')
    <li class="nav-item">
        <a href="{{route('roles.index')}}" class="nav-link">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>Roles</p>
        </a>
    </li>
@endcan

@can('read-user-log')
    <li class="nav-item">
        <a href="{{url('user-activity')}}" target="_blank" class="nav-link">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>Logs</p>
        </a>
    </li>
@endcan

<li class="nav-item">
    <a href="#" class="nav-link">
        <p>
            <i class="nav-icon fas fa-inbox"></i>
            Emails
        </p>

    </a>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <p>
            <i class="nav-icon fas fa-laptop"></i>
            System
        </p>

    </a>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <p>
            <i class="nav-icon fas fa-bell"></i>
            Notifications
        </p>

    </a>
</li>










