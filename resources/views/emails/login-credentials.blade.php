@component('mail::message')
# Your {{ config('app.name') }} login credentials 

Use these credentials to access the system

@component('mail::table')
    | Email | Password |
    |:----------|:----------|
    | {{ $user->email }} | {{ $password }} |
@endcomponent

@component('mail::button', ['url' => url('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
