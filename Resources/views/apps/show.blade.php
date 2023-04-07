@extends('controlpanel::layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="content-header">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">{{$app->display_name}}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('controlpanel.module') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('apps.index') }}">Apps</a></li>
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
                                            <a class="nav-link active" data-toggle="pill" href="#app" role="tab"
                                               aria-controls="module" aria-selected="true">App Details</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#acl" role="tab"
                                               aria-controls="acl" aria-selected="false">Access Rights</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="float-right">
                                <a class="btn btn-sm btn-primary" href="{{route('apps.index')}}">
                                    <i class="fas fa-list-alt"></i> Apps
                                </a>
                                <a class="btn btn-sm btn-primary" href="{{route('apps.show', $app)}}">
                                    <i class="fas fa-sync-alt"></i> Refresh
                                </a>

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-content">

                                <div class="tab-pane fade active show" id="app" role="tabpanel" aria-labelledby="app">
                                    <livewire:controlpanel::apps.app :app=$app />
                                </div>

                                <div class="tab-pane fade" id="acl" role="tabpanel" aria-labelledby="acl">
                                    <livewire:controlpanel::apps.access :app=$app />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
