<!DOCTYPE html>
<html lang="en">
<x-head />

<body>
    <x-header class="mb-5" />
    <h2 class="text-center mb-3">Админ панель</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <form action="{{ route('createPlace') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h3 class="mb-3">Создание места</h3>
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label" for="title">Название</label>
                                <input class="form-control" name="title" placeholder="Название места">
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="image">Изображение</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label" for="description">Описание</label>
                                <textarea class="form-control" name="description" placeholder="Краткое описание"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Создать</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-lg-6 col-sm-12">
                <h3 class="mb-lg-5 mb-sm-3">Все заявки</h3>
                @foreach ($orders as $order)
                <div class="order-form mb-3 form-control p-3">
                    <div class="order-user">
                        <span>{{ $order->user->fullname }} ({{ $order->date }})</span>
                    </div>
                    место: <span class="badge bg-secondary">{{ $order->place->title }}</span>
                    <div class="order-status d-flex justify-content-between">
                        <form action="{{ route('updateOrder', $order->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <span>Статус заявки: </span>
                                <select class="form-select" name="status">
                                    <option value="new" {{ $order->status=='new' ? 'selected' : '' }}>Новое</option>
                                    <option value="created" {{ $order->status=='created' ? 'selected' : '' }}>Создано</option>
                                    <option value="done" {{ $order->status=='done' ? 'selected' : '' }}>Выполнено</option>
                                </select>

                            </div>
                            <button type="submit" class="btn btn-primary">Обновить</button>
                        </form>


                    </div>
                    <div class="comments">
                        <h4>Комментарии</h4>
                        <textarea class="form-control" disabled>
                            @foreach ($order->comments as $comment)
                                {{$comment->user->fullname.': '. $comment->content}} ({{$comment->created_at}})
                            @endforeach
                        </textarea>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="row">
            <div class="col-12"></div>
        </div>
    </div>
    <x-footer/>
    <x-scripts />
</body>

</html>