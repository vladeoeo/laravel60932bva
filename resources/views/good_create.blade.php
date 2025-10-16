<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <title>609-32</title>
    <style>   .is-invalid {color: red;}   </style>
</head>
<body>
    <h2>Добавление товара</h2>
    <form method="POST" action="{{ url('/good') }}">
        @csrf
        <label>Название товара</label>
        <input type="text" name="name" value="{{old('name')}}">
        @error('name')
        <div class="is-invalid">{{$message}}</div>
        @enderror
        <br>
        <label>Цена</label>
        <input type="text" name="price" value="{{old('price')}}">
        @error('price')
        <div class="is-invalid">{{$message}}</div>
        @enderror
        <br>
        <label>Категория</label>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->category_id }}"
                        @if(old('category_id') == $category->category_id) selected @endif>
                    {{ $category->name }} {{-- или $category->name, зависит от твоей таблицы --}}
                </option>
            @endforeach
        </select>
        @error('category_id')
        <div class="is-invalid">{{$message}}</div>
        @enderror
        <br>
        <label>Описание товара</label>
        <input type="text" name="description" value="{{old('description')}}">
        @error('description')
        <div class="is-invalid">{{$message}}</div>
        @enderror
        <br>
        <label>Количество на складе</label>
        <input type="text" name="stock_quantity" value="{{old('stock_quantity')}}">
        @error('stock_quantity')
        <div class="is-invalid">{{$message}}</div>
        @enderror
        <br>
        <label>Бренд</label>
        <input type="text" name="brand" value="{{old('brand')}}">
        @error('brand')
        <div class="is-invalid">{{$message}}</div>
        @enderror
        <br>
        <label>Путь до изображения</label>
        <input type="file" name="img_url" accept="image/*">
        @error('img_url')
        <div class="is-invalid">{{$message}}</div>
        @enderror
        <button type="submit">Сохранить товар</button>
    </form>
</body>
</html>
