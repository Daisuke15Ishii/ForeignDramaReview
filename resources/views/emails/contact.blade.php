<p> {{ $inputs['name'] }}　様</p>
<p>
    お世話になっております。<br>
    洋ドラ会議(管理者)と申します。<br>
</p>
<p>
    この度は、当サイトにお問合せいただきありがとうございます。
    下記の内容でのお問合せを受け付けいたしました。
</p>
<hr>
<p>法人名: {{ $inputs['corporation'] }}({{ $inputs['corporation_kana'] }})</p>
<p>お名前: {{ $inputs['name'] }}({{ $inputs['name_kana'] }})</p>
<p>電話番号: {{ $inputs['phone'] }}</p>
<p>メールアドレス: {{ $inputs['mail'] }}</p>
<p>お問合せ内容：{!! nl2br( $inputs['comment'] ) !!}</p> 
<hr>
<p>
    ご回答に関しましては、1週間程度を目途にご連絡いたします。<br>
    今後ともどうぞよろしくお願いいたします。
</p>
<p>
    洋ドラ会議(管理者)
</p>


