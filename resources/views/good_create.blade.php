@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-4">
                <form method="POST" action="{{ url('/good') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Название товара</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" aria-describedby="nameHelp" value="{{old('name')}}">
                        <div id="nameHelp" class="form-text">Введите название товара</div>
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Цена</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror"
                               id="price" name="price" aria-describedby="priceHelp" value="{{old('price')}}">
                        <div id="priceHelp" class="form-text">Введите стоимость товара</div>
                        @error('price')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Категория</label>
                        <select class="form-select" id="category_id" name="category_id" aria-describedby="categoryHelp" value="{{old('category_id')}}">
                            @foreach($categories as $category)
                                <option value="{{ $category->category_id }}"
                                        @if(old('category_id') == $category->category_id) selected @endif>
                                    {{ $category->name }} {{-- или $category->name, зависит от твоей таблицы --}}
                                </option>
                            @endforeach
                        </select>
                        <div class="form-text" id="categoryHelp">Выберите категорию товара</div>
                        @error('category_id')
                        <div class="is-invalid">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Описание товара</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror"
                               id="description" name="description" aria-describedby="descriptionHelp" value="{{old('description')}}">
                        <div id="descriptionHelp" class="form-text">Добавьте описание товара</div>
                        @error('description')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="stock_quantity" class="form-label">Количество на складе</label>
                        <input type="text" class="form-control @error('stock_quantity') is-invalid @enderror"
                               id="stock_quantity" name="stock_quantity" aria-describedby="stock_quantityHelp" value="{{old('stock_quantity')}}">
                        <div id="stock_quantityHelp" class="form-text">Укажите количество товара на складе</div>
                        @error('stock_quantity')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Бренд</label>
                        <input type="text" class="form-control @error('brand') is-invalid @enderror"
                               id="brand" name="brand" aria-describedby="brandHelp" value="{{old('brand')}}">
                        <div id="brandHelp" class="form-text">Укажите бренд товара</div>
                        @error('brand')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="img_url" class="form-label">Путь до изображения</label>
                        <input type="file" accept="image/*" class="form-control @error('img_url') is-invalid @enderror"
                               id="img_url" name="img_url" aria-describedby="img_urlHelp" value="{{old('img_url')}}">
                        <div id="img_urlHelp" class="form-text">Укажите путь до изображения</div>
                        @error('img_url')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Сохранить товар</button>
                </form>
            </div>
        </div>
    </div>

@endsection
