
{{--Creates the body--}}
@component('mail::message')
# Introduction

The body of your message.
{{--Creates a li elements--}}
-one

-two

-three

Thank you for registering.

{{--Creates a Button--}}
@component('mail::button', ['url' => 'https://laracasts.com'])
Start Browsing Button
@endcomponent

{{--Creates a panel--}}
@component('mail::panel', ['url' => ''])
    Some inspirational quote
@endcomponent

{{--App name can be changed by going to config/app.php--}}
Thanks,<br>
{{ config('app.name') }}
@endcomponent
