<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <title>609-32</title>
    <style>   .is-invalid {color: red;}   </style>
</head>
<body>
<h2>Добавление отзыва</h2>
<form method="POST" action="{{ url('/good/review/'.$reviews_id) }}">
    @csrf
    <label>Оценка товара от 0 до 5</label>
    <input type="text" name="rating" value="{{old('rating')}}">
    @error('rating')
    <div class="is-invalid">{{$message}}</div>
    @enderror
    <br>
    <label>Комментарий</label>
    <input type="text" name="comment" value="{{old('comment')}}">
    @error('comment')
    <div class="is-invalid">{{$message}}</div>
    @enderror
    <br>
    <button type="submit">Сохранить отзыв</button>
</form>
</body>
</html>
