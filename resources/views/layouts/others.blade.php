@include('layouts.component.header', ['bgcolor' => 'others'])
        <main class="py-4">
            <div class="container">
                <div class="row p-0 m-0">
                    {{-- 576px(スマホ)以下でサイドバーを下(右)に表示(order-sm-xxx) --}}
                    <div class="col-lg-9 order-lg-2">
                        {{-- @yieldでコンテンツ挿入。 --}}
                        @yield('content')
                    </div>
                    <div class="col-lg-3 order-lg-1">
                        {{-- サイドバー挿入。 --}}
                        @include('layouts.component.side-others')
                    </div>
                </div>
            </div>
        </main>
        @include('layouts.component.footer')
    </body>
</html>      
