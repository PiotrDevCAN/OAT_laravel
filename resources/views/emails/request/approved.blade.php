@component('mail::message')
# Overtime Request Approved

Your request has been approved!

@component('mail::button', ['url' => $requestEditUrl])
View Request
@endcomponent

@component('mail::panel')
This is the panel content.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent