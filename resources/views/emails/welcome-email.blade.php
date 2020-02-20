@component('mail::message')
# Welcome to my first Laravel App

This is an imitation of an Instagram page. Hope you enjoy!

{{--@component('mail::button', ['url' => '/profile/' . auth()->user()->getAuthIdentifier()])--}}
Go to your posts overview.
{{--@endcomponent--}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
