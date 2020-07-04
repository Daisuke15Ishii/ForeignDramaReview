@include('layouts.component.header')

        <main class="py-4" style="background-color:#FFF6E7">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        {{-- サイドバー挿入。 --}}
                        @include('layouts.component.side-others')
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
