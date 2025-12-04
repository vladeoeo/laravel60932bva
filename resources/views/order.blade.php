@extends("layout")
@section('content')
<h2>
    {{ $order ? "Список товаров заказа № ".$order->order_id : "Неверный ID заказа" }}
</h2>
@if($order)
    <div class="container-fluid">
        <div class="table_zak">
            <div class="table_zag">
                <h2 class="id_order_items">ID</h2>
                <h2 class="name_order_items">Название</h2>
                <h2 class="brand_order_items">Цена</h2>
                <h2 class="price_order_items">Количество</h2>
            </div>
            <div class="table_info">
                @foreach($order->goods as $good)
                    <div class="table_row">
                        <h3 class="id_order_items">{{$good->product_id}}</h3>
                        <h3 class="name_order_items">{{$good->name}}</h3>
                        <h3 class="brand_order_items">{{$good->pivot->price_at_moment}}</h3>
                        <h3 class="price_order_items">{{$good->pivot->quantity}}</h3>
                    </div>
                @endforeach
            </div>
        </div>
        <h2>{{"Итого: ".$total->total}}</h2>
    </div>
@endif
@endsection
