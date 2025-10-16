<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <title>609-32</title>
</head>
<body>
    <h2>Список товаров</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Наименование</td>
            <td>Бренд</td>
            <td>Цена</td>
        </thead>
        @foreach($goods as $good)
            <tr>
                <td>{{$good->product_id}}</td>
                <td>{{$good->name}}</td>
                <td>{{$good->brand}}</td>
                <td>{{$good->price}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
