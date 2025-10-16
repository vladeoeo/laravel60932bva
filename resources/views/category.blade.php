<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <title>609-32</title>
</head>
<body>
    <h2>{{$category ? "Список товаров категории ".$category->name : "Неверный ID категории"}}</h2>
    @if($category)
        <table border="1">
            <th>
                <id>id</id>
                <td>Наименование</td>
                <td>Цена</td>
            </th>
            @foreach($category->goods as $good)
                <tr>
                    <td>{{$good->category_id}}</td>
                    <td>{{$good->name}}</td>
                    <td>{{$good->price}}</td>
                </tr>
            @endforeach
        </table>
    @endif
</body>
</html>
