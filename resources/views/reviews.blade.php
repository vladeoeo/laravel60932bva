<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>609-32</title>
</head>
<body>
@if($reviews)
    <table border="1">
        <tr>
            <th>ID товара</th>
            <th>Название товара</th>
            <th>Отзыв</th>
        </tr>
        @foreach($reviews as $review)
            <tr>
                <td>{{$product_id}}</td>
                <td>{{$product->name}}</td>
                <td>{{ $review->comment }}</td>
            </tr>
        @endforeach
    </table>
    <a href="{{url("good/review/".$product_id."/create")}}">Написать отзыв</a>
@endif
</body>
</html>
