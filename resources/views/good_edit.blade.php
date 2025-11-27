@extends("layout")
@section('content')
    <div class="row justify-content-center">
        <div class="col-4">
            <form method="POST" action="{{url('good/update/'.$good->product_id)}}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Название товара</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                           id="name" name="name" aria-describedby="nameHelp" value="@if (old('name')) {{old('name')}} @else {{$good->name}} @endif">
                    <div id="nameHelp" class="form-text">Введите новое название товара</div>
                    @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Цена</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror"
                           id="price" name="price" aria-describedby="priceHelp" value="@if (old('price')) {{old('price')}} @else {{$good->price}} @endif">
                    <div id="priceHelp" class="form-text">Введите новую стоимость товара</div>
                    @error('price')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Категория</label>
                    <select class="form-select" id="category_id" name="category_id" aria-describedby="categoryHelp" value="{{old('category_id')}}">
                        @foreach($categories as $category)
                            <option value="{{ $category->category_id }}"
                                    @if(old('category_id'))
                                        @if(old('category_id') == $category->category_id) selected @endif
                                    @else
                                        @if($good->category_id == $category->category_id) selected @endif
                                @endif>{{$category->name}}</option>
                            </option>
                        @endforeach
                    </select>
                    <div class="form-text" id="categoryHelp">Выберите новую категорию товара</div>
                    @error('category_id')
                    <div class="is-invalid">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Описание товара</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror"
                           id="description" name="description" aria-describedby="descriptionHelp" value="@if (old('description')) {{old('description')}} @else {{$good->description}} @endif">
                    <div id="descriptionHelp" class="form-text">Добавьте описание товара</div>
                    @error('description')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="stock_quantity" class="form-label">Количество на складе</label>
                    <input type="text" class="form-control @error('stock_quantity') is-invalid @enderror"
                           id="stock_quantity" name="stock_quantity" aria-describedby="stock_quantityHelp" value="@if (old('stock_quantity')) {{old('stock_quantity')}} @else {{$good->stock_quantity}} @endif">
                    <div id="stock_quantityHelp" class="form-text">Укажите новое количество товара на складе</div>
                    @error('stock_quantity')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label">Бренд</label>
                    <input type="text" class="form-control @error('brand') is-invalid @enderror"
                           id="brand" name="brand" aria-describedby="brandHelp" value="@if (old('brand')) {{old('brand')}} @else {{$good->brand}} @endif">
                    <div id="brandHelp" class="form-text">Укажите бренд товара</div>
                    @error('brand')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Сохранить товар</button>
            </form>
        </div>
    </div>
@endsection
