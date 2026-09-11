<!DOCTYPE html>
<html lang="en">
<x-head />

<body>
    <x-header class="mb-5" />
    <h2 class="text-center">Просмотр заявок</h2>
    <div class="container">
        <div class="row form-cont">
            @isset($orders)
            @foreach ($orders as $order)
            <div class="col-12 form-control mb-3 p-3">

                <div class="order">
                    <h5>Место - {{ $order->place->title }} ({{ $order->date }})</h5>
                    <p>Способ Оплаты {{ $order->payMethod=='card'?'СБП':'Наличные' }}</p>
                    <p>
                        Статус заявки: <span class="badge {{ $order->status=='new'?'text-bg-primary':($order->status=='created'?'text-bg-secondary':'text-bg-success') }}">{{ $order->status=='new'?'Новое':($order->status=='created'?'Создано':'Завершено') }}</span>
                    </p>
                </div>
                @if ($order->status=='done')
                <form action="{{ route('createComment', $order->id) }}" method="post">
                    <textarea placeholder="Здесь вы можете оставить отзыв" class="form-control mb-3" name="content"></textarea>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                    @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </form>
                @isset($order->comments)
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h4>Отзывы</h4>
                            @foreach ($order->comments as $comment)
                            <div class="form-control col-12 mb-3">
                                <div class="comment-header d-flex align-items-center">
                                    <h6>{{ $comment->user->fullname }}</h6> <span>{{$comment->created_at}}</span>
                                </div>

                                {{ $comment->content }}

                            </div>

                            @endforeach
                        </div>
                    </div>
                </div>
                @endisset
                @endif

            </div>
            @endforeach
            @else
            <h2 class="text-center">У вас еще нет ниодной заявки</h2>
            @endisset
        </div>
    </div>

    <x-footer class="fixed-bottom"/>
    <x-scripts />
</body>

</html>