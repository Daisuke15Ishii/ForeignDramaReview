@include('layouts.component.header')

        <main class="py-4">
            {{-- divでコンテンツ幅を指定 --}}
            <div class="">
                {{-- @yieldでコンテンツ挿入。 --}}
                @yield('content')
            </div>
        </main>
        
        @include('layouts.component.footer')
    </body>
</html>      
