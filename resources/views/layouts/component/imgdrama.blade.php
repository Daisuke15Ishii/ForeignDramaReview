{{-- component.dramaindexにて利用 --}}
{{-- component.dramapointにて利用 --}}
{{-- component.favoritedramaindexにて利用 --}}
{{-- component.mypagedramaindexにて利用 --}}
{{-- component.othersdramaindexにて利用 --}}
{{-- component.reviewindexにて利用 --}}
{{-- drama.dramaID.review.createにて利用 --}}
{{-- drama.dramaID.review.reviewID.editにて利用 --}}


@if(file_exists( __DIR__ . '/../../../public' . $drama->image_path))
    <img src="{{ secure_asset($drama->image_path) }}" alt="{{ $drama->title }}画像" title="{{ $drama->title }}">
@else
    <img src="{{ secure_asset('/images/drama/preparation.png') }}" alt="画像準備中" title="画像準備中">
@endif