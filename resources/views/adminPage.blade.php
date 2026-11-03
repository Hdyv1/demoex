<!DOCTYPE html>
<html lang="en">
<x-head />

<body>
    <x-header class="mb-5" />
    <h2 class="text-center mb-3">Админ панель</h2>
    <section class="my-5 py-5">

        <div class="container my-3">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <form action="{{ isset($place)?route('updatePlace', $place->id):route('createPlace') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h3 class="mb-3">{{ isset($place)?'Редактирование':'Создание'}} места</h3>
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label" for="title">Название</label>
                                    <input class="form-control" name="title" placeholder="Название места" value="{{ isset($place)?$place->title:old('title') }}">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="image">Изображение</label>
                                    <input type="file" class="form-control" name="image">
                                    @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label" for="description">Описание</label>
                                    <textarea class="form-control" name="description" placeholder="Краткое описание">{{ isset($place)?$place->description:old('description') }}</textarea>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary">{{ isset($place)?'Редактировать':'Создать'}} </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <h3 class="mb-lg-5 mb-sm-3">Все места</h3>
                    @foreach ($places as $place)
                    <div class="order-form mb-3 form-control p-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="order-user">
                                        <p class="fw-semibold fs-4">{{$place->title}}</p>
                                        <div class="d-flex">
                                            <p>Описание:</p>
                                            <span class="text-break mx-1">{{ $place->description }}</span>
                                        </div>
                                    </div>
                                    <div class="container mt-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <div>
                                                    <form action="{{ route('updatePlaceForm', $place->id) }}" method="get">
                                                        @csrf
                                                        <input type="text" hidden>
                                                        <button type="submit" class="btn btn-primary">Редактировать</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <form action="{{ route('deletePlace', $place->id) }}" method="post">
                                                        @csrf
                                                        <input type="text" hidden>
                                                        <button type="submit" class="btn btn-danger">Удалить</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <img src="{{ asset($place->image) }}" alt="" width="250px">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="col-12">
                    <h3 class="mb-lg-5 mb-sm-3">Все заявки</h3>
                    @foreach ($orders as $order)
                    <div class="order-form mb-3 form-control p-3">
                        <div class="order-user">
                            <span>{{ $order->user->fullname }} ({{ date('d.m.Y',strtotime($order->date)) }})</span>
                        </div>
                        <div class="d-flex flex-column">
                            <div>
                                место: <span class="badge bg-secondary">{{ $order->place->title }}</span>
                            </div>
                            <div>
                                Название мероприятия: <span class="badge bg-primary">{{ $order->name }}</span>
                            </div>
                        </div>

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
                        @if($order->comments!='[]')
                        <div class="comments">
                            <h4>Комментарии</h4>
                            <div class="form-control fw-light">
                                @foreach ($order->comments as $comment)
                                <p>{{$comment->user->fullname.': '. $comment->content}} ({{date('d.m.Y H:i:s', strtotime($comment->created_at))}})</p>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="row">
                <div class="col-12"></div>
            </div>
        </div>
    </section>
    <x-footer />
    <x-scripts />
</body>

</html>