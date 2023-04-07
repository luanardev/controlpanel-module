@component('mail::message')
<h2>Dear {{$user->name}}</h2>

<p>Please be advised that your password has been reset.</p>
<p>Your new Password is:</p>
<p>
    <strong>{{$password}}</strong>
</p>

<p>Visit <a href="{{route('login')}}">{{ config('app.name') }} Website</a> to login to your Staff Account.</p>

{{ config('app.name') }}
@endcomponent
