@extends("layout")
@section('content')
    <div class="container-fluid">
        <h2 class="h2_rev_cr">Добавление отзыва</h2>
        <form method="POST" action="{{ url('/good/review/'.$reviews_id) }}">
            @csrf
            <div class="mb-3 rev_cr">
                <label for="rating" class="form-label">Оценка товара от 0 до 5</label>
                <input class="form-control" type="text" name="rating" value="{{old('rating')}}">
                @error('rating')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3 rev_cr">
                <label for="comment" class="form-label">Комментарий</label>
                <input class="form-control" type="text" name="comment" value="{{old('comment')}}">
                @error('comment')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <button class="btn btn-primary" type="submit">Сохранить отзыв</button>
        </form>
    </div>
@endsection
