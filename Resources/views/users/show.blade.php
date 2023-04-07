@extends('controlpanel::layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="content-header">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">{{$user->name}}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('controlpanel.module') }}">Home</a></li>
                        <li class="breadcrumb-item "><a href="{{ route('users.index') }}">Users</a></li>
                        <li class="breadcrumb-item active">Account</li>
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
                                <a class="btn btn-sm btn-primary" href="{{route('users.index')}}">
                                    <i class="fas fa-users"></i> Users
                                </a>
                                <a class="btn btn-sm btn-primary" href="{{route('users.show', $user)}}">
                                    <i class="fas fa-sync-alt"></i> Refresh
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <livewire:controlpanel::users.user-account :user=$user />
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <livewire:controlpanel::users.user-role :user=$user />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
