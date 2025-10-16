<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <title>609-32</title>
    <style>   .is-invalid {color: red;}   </style>
</head>
<body>
<h2>Редактирование товара</h2>
    <form method="POST" action="{{url('good/update/'.$good->product_id)}}">
        @csrf
        <label>Название</label>
        <input type="text" name="name" value="@if (old('name')) {{old('name')}} @else {{$good->name}} @endif"/>
        @error('name')
        <div class="is-invalid">{{$message}}</div>
        @enderror
        <br>
        <label>Цена</label>
        <input type="text" name="price" value="@if (old('price')) {{old('price')}} @else {{$good->price}} @endif">
        @error('price')
        <div class="is-invalid">{{$message}}</div>
        @enderror
        <br>
        <label>Категория:</label>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{$category->category_id}}"
                    @if(old('category_id'))
                        @if(old('category_id') == $category->category_id) selected @endif
                    @else
                        @if($good->category_id == $category->category_id) selected @endif
                    @endif>{{$category->name}}</option>
            @endforeach
        </select>
        @error('category_id')
        <div class="is-invalid">{{$message}}</div>
        @enderror
        <br>
        <label>Описание товара</label>
        <input type="text" name="description" value="@if (old('description')) {{old('description')}} @else {{$good->description}} @endif">
        @error('description')
        <div class="is-invalid">{{$message}}</div>
        @enderror
        <label>Количество на складе</label>
        <input type="text" name="stock_quantity" value="@if (old('stock_quantity')) {{old('stock_quantity')}} @else {{$good->stock_quantity}} @endif">
        @error('stock_quantity')
        <div class="is-invalid">{{$message}}</div>
        @enderror
        <br>
        <label>Бренд</label>
        <input type="text" name="brand" value="@if (old('brand')) {{old('brand')}} @else {{$good->brand}} @endif">
        @error('brand')
        <div class="is-invalid">{{$message}}</div>
        @enderror
        <br>
        <button type="submit">Сохранить товар</button>
    </form>
</body>
</html>
