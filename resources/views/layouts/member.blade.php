@include('layouts.component.header', ['bgcolor' => 'none'])
        <main class="py-4">
            <div class="container">
                <div class="row p-0 m-0">
                    {{-- 576px(スマホ)以下でサイドバーを下(右)に表示(order-sm-xxx) --}}
                    <div class="col-sm-9 order-sm-2">
                        {{-- @yieldでコンテンツ挿入。 --}}
                        @yield('content')
                    </div>
                    <div class="col-sm-3 order-sm-1">
                        {{-- サイドバー挿入。 --}}
                        @include('layouts.component.side-member')
                    </div>
                </div>
            </div>
        </main>
        @include('layouts.component.footer')
    </body>
</html>      
