@include('layouts.component.header')

        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        {{-- サイドバー挿入。 --}}
                        @include('layouts.component.side-member')
                    </div>
                    <div class="col-md-9">
                        {{-- @yieldでコンテンツ挿入。 --}}
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
        
        @include('layouts.component.footer')
    </body>
</html>      
