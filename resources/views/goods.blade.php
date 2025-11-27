@extends("layout")
@section('content')
    <div class="container">
        <h2>Список товаров</h2>
        <div class="wrapper">
            <table border="1" style="display: flex; flex-direction: column; justify-content: space-between">
                <thead>
                <td style="width: 184px">id</td>
                <td style="width: 184px">Наименование</td>
                <td style="width: 184px">Бренд</td>
                <td style="width: 184px">Цена</td>
                <td style="width: 184px">Категория</td>
                </thead>
                @foreach($goods as $good)
                    <tr>
                        <td style="width: 190px; border-top:3px solid #EEE">{{$good->product_id}}</td>
                        <td style="width: 190px; border-top:3px solid #EEE">{{$good->name}}</td>
                        <td style="width: 190px; border-top:3px solid #EEE">{{$good->brand}}</td>
                        <td style="width: 190px; border-top:3px solid #EEE">{{$good->price}}</td>
                        <td style="width: 190px; border-top:3px solid #EEE">{{$good->category->name}}</td>
                        <td style="width: 190px; border-top:3px solid #EEE">
                            <div class="wrapper2" style="display: flex;flex-direction: column;gap: 5px">
                                <a style="text-decoration: none" href="{{url('good/destroy/'.$good->product_id)}}">Удалить</a>
                                <a style="text-decoration: none" href="{{url('good/edit/'.$good->product_id)}}">Редактировать</a>
                                <a style="text-decoration: none" href="{{url('good/review/'.$good->product_id)}}">Отзывы</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{$goods->links()}}
        </div>
    </div>
@endsection
