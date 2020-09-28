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
    
    Thanks,<br>
    {{ config('app.name') }}
@endcomponent