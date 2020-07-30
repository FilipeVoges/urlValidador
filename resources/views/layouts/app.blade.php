<!DOCTYPE html>
<html lang="pt-br">
    <head>
        @include('layouts.head')
    </head>
    <body>

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

