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
                <div class="order-form mb-3">
                    <div class="order-user">
                        <span>{{ $order->user->name }}</span>
                        <span>{{ $order->date }}</span>
                    </div>
                    <span>{{ $order->place->title }}</span>
                    <div class="order-status d-flex justify-content-between">
                        <form action="{{ route('updateOrder', $order->id) }}" method="post">
                            @csrf
                            <div>
                                <span>Статус заявки: </span>
                                <button type="submit" class="btn btn-primary">Обновить</button>
                            </div>
                            <select class="form-select">
                                <option value="new" {{ $order->status=='new' ? 'selected' : '' }}>Новая</option>
                                <option value="created" {{ $order->status=='created' ? 'selected' : '' }}>Создана</option>
                                <option value="completed" {{ $order->status=='completed' ? 'selected' : '' }}>Выполнена</option>
                            </select>
                        </form>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="row">
            <div class="col-12"></div>
        </div>
    </div>

    <x-scripts />
</body>

</html>