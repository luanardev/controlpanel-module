@extends('controlpanel::layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="content-header">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Role Permissions</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('controlpanel.module') }}">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{ route('roles.index') }}">Roles</a></li>
                        <li class="breadcrumb-item active">Role</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="card card-outline">
                <div class="card-header">
                    <h3 class="card-title text-bold">
                        {{$role->name}}
                    </h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">

                            <div class="nav flex-column nav-pills offset-lg-1" id="v-pills-tab" role="tablist"
                                 aria-orientation="vertical">
                                @foreach($apps as  $app)
                                    <a href="{{route('role.app.permissions',[$role, $app])}}"
                                       class="nav-link @if($app->priority == 0) 'active' @endif"> {{$app->display_name}}</a>
                                @endforeach
                            </div>

                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                @hasSection('permission-form')
                                    @yield('permission-form')
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
