<!DOCTYPE html>
<html lang="pt-br">
    <head>
        @include('layouts.head')
    </head>
    <body>
        @if (isset($sidebar) && $sidebar)
            @include('layouts.nav')
        @endif

        <div id="app">
            <main >
                <div>
                    @yield('content')
                </div>
            </main>
        </div>
        @include('layouts.footer')
    </body>
</html>

