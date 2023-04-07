@extends('controlpanel::roles.show')

@section('permission-form')
    @livewire('controlpanel::roles.permissions', ['role'=>$role, 'app'=> $app])
@endsection