@component('mail::message')

@hasSection('message')
@yield('message')
@endif

@component('mail::button', ['url' => $requestEditUrl])
@hasSection('button')
@yield('button')
@endif
@endcomponent

@component('mail::panel')
@hasSection('panel')
@yield('panel')
@endif
@endcomponent


@component('mail::button', ['url' => $previewUrl])
@hasSection('buttonPreview')
@yield('buttonPreview')
@endif
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent