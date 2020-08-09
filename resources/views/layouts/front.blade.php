@include('layouts.component.header', ['bgcolor' => 'none'])
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center p-0 m-0">
                    {{-- @yieldでコンテンツ挿入。 --}}
                    @yield('content')
                </div>
            </div>
        </main>
        @include('layouts.component.footer')
    </body>
</html>      
