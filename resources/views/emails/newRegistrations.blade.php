@component('mail::message')
Hello, there are {{$count}} new customers registered at your company.
Thank You.
<br>
{{ config('app.name') }}
@endcomponent
