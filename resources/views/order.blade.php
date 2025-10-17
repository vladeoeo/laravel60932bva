<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заказ №{{ $order->order_id }}</title>
</head>
<body>
<h2>
    {{ $order ? "Список товаров заказа № ".$order->order_id : "Неверный ID заказа" }}
</h2>

@if($order)
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Цена</th>
        </tr>
        @foreach($order->goods as $good)
            <tr>
                <td>{{ $good->product_id }}</td>
                <td>{{ $good->name }}</td>
                <td>{{ $good->pivot->price_at_moment }}</td>
                <td>{{$good->pivot->quantity}}</td>
            </tr>
        @endforeach
    </table>
    <h2>{{"Итого: ".$total->total}}</h2>
@endif
</body>
</html>
