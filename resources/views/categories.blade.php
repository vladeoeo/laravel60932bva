<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <title>609-32</title>
</head>
<body>
    <h2>Список категорий</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Наименование</td>
        </thead>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->category_id}}</td>
                <td>{{$category->name}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
