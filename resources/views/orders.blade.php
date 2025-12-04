@extends("layout")
@section('content')
    <div class="container-fluid">
        <h2>Список заказов</h2>

        <div class="table_zak">
            <div class="table_zag">
                <h2 class="id_zak">ID</h2>
                <h2 class="name_zak">Заказчик</h2>
                <h2 class="brand_zak">Дата заказа</h2>
                <h2 class="price_zak">Статус</h2>
                <h2 class="category_zak">Сумма заказа</h2>
                <h2 class="btn_zak">Состав заказа</h2>
            </div>
            <div class="table_info">
                @foreach($orders as $order)
                    <div class="table_row">
                        <h3 class="id_zak">{{$order->order_id}}</h3>
                        <h3 class="name_zak">{{$order->user->second_name}} {{$order->user->first_name}}</h3>
                        <h3 class="brand_zak">{{$order->order_date}}</h3>
                        <h3 class="price_zak">{{$order->status}}</h3>
                        <h3 class="category_zak">{{$order->total_amount}}</h3>
                        <a href="{{url('order/'.$order->order_id)}}" class="btn_zak">Подробнее</a>
                    </div>
                @endforeach
            </div>
        </div>
        {{$orders->links()}}

    </div>
@endsection
