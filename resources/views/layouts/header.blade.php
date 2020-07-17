@if (!$isGame)
    <!-- Metas -->    
    @yield('metas', View::make('layouts.metas'))
    <!-- Scripts -->
    @yield('scripts', View::make('layouts.scripts'))
@else
    <!-- Game Functions -->
    @yield('functions', View::make('layouts.functions'))
@endif



<!-- Fonts -->
@yield('fonts', View::make('layouts.fonts'))

<!-- Styles -->
@yield('styles', View::make('layouts.styles'))