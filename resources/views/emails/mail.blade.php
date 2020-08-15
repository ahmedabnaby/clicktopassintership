@component('mail::message')
# Hello {{ $user->name }}

Long Time u didn't post at our App.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
