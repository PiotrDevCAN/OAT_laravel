@component('mail::message')
# Overtime Request Created

Your request has been submitted!

@component('mail::button', ['url' => $url])
View Request
@endcomponent

@component('mail::panel')
This is the panel content.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent