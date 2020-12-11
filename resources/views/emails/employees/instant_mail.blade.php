@component('mail::message')

<h3>{{ $data['title'] }}</h3>

<p>{!! $data['body'] !!}</p>




<br />
Thanks <br />
{{ config('app.name') }}
@endcomponent