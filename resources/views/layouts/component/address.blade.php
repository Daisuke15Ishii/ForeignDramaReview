{{--  about.indexにて利用 --}}
{{--  about.contact.thanksにて利用 --}}

<ul class="mb-3 text-right">
    <li>運営者：だいすけ</li>
    <li>所在地：埼玉県</li>
    <li>連絡先：<a href="https://twitter.com/denden_daisuke">だいすけ</a>(twitter)</a></li>
    @if($contact == 'yes')
        <li><a href="{{ url('/about/contact') }}">お問合せはこちら</a></li>
    @endif
</ul>
