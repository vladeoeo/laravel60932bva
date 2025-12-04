@extends("layout")
@section('content')
    <div class="container-fluid">
        <h2>Список товаров</h2>

        <div class="table">
            <div class="table_zag">
                <h2 class="id">ID</h2>
                <h2 class="name">Наименование</h2>
                <h2 class="brand">Бренд</h2>
                <h2 class="price">Цена</h2>
                <h2 class="category">Категория</h2>
                <h2 class="destv">Действие</h2>
            </div>
            <div class="table_info">
                @foreach($goods as $good)
                    <div class="table_row">
                        <h3 class="id">{{$good->product_id}}</h3>
                        <h3 class="name">{{$good->name}}</h3>
                        <h3 class="brand">{{$good->brand}}</h3>
                        <h3 class="price">{{$good->price}}</h3>
                        <h3 class="category">{{$good->category->name}}</h3>
                        <div class="destv" style="display: flex;flex-direction: column;gap: 5px">
                            <a style="text-decoration: none" href="{{url('good/destroy/'.$good->product_id)}}">Удалить</a>
                            <a style="text-decoration: none" href="{{url('good/edit/'.$good->product_id)}}">Редактировать</a>
                            <a style="text-decoration: none" href="{{url('good/review/'.$good->product_id)}}">Отзывы</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{$goods->links()}}

    </div>
@endsection
