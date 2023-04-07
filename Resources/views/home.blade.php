@extends('controlpanel::layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="content-header">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">{{config('controlpanel.name')}}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <a href="{{route('apps.index')}}">
                        <div class="small-box bg-info">
                            <div class="inner text-center">
                                <h4>Apps</h4>
                                <p>{{$appCount}} apps</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <a href="{{route('users.index')}}">
                        <div class="small-box bg-info">
                            <div class="inner text-center">
                                <h4>Users</h4>
                                <p>{{$userCount}} users</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <a href="{{route('roles.index')}}">
                        <div class="small-box bg-info">
                            <div class="inner text-center">
                                <h4>Roles</h4>
                                <p>{{$roleCount}} roles</p>
                            </div>
                        </div>
                    </a>
                </div>


            </div>
        </div>
    </div>

@endsection
