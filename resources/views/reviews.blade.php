@extends("layout")
@section('content')
@if($reviews)
    <div class="container-fluid">
        <div class="table_rev">
            <div class="table_rev_zag">
                <h2 class="id_rev">ID товара</h2>
                <h2 class="name_rev">Название товара</h2>
                <h2 class="otz_rev">Отзыв</h2>
            </div>
            <div class="table_rev_info">
                @foreach($reviews as $review)
                    <div class="table_rev_info_row">
                        <h3 class="id_rev">{{$product_id}}</h3>
                        <h3 class="name_rev">{{$product->name}}</h3>
                        <h3 class="otz_rev">{{ $review->comment }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
        <a class="btn_rev" href="{{url("good/review/".$product_id."/create")}}">Написать отзыв</a>
    </div>
@endif
@endsection
