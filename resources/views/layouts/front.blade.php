@include('layouts.component.header', ['bgcolor' => 'none'])
        <main class="py-4">
            <div class="">
                {{-- @yieldでコンテンツ挿入。 --}}
                @yield('content')
            </div>
        </main>
        @include('layouts.component.footer')
    </body>
</html>      
