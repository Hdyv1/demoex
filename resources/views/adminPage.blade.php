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
                <div class="order-form mb-3">
                    <div class="order-user">
                        <span>name</span>
                        <span>data</span>
                    </div>
                    <span>Название места</span>
                    <div class="order-status d-flex justify-content-between">
                        <span>Статус заявки: </span>
                        Новый
                    </div>
                    
                </div>
                <div class="order-form mb-3">
                    <div class="order-user">
                        <span>name</span>
                        <span>data</span>
                    </div>
                    <span>Название места</span>
                    <div class="order-status d-flex justify-content-between">
                        <span>Статус заявки: </span>
                        Новый
                    </div>
                    
                </div>
                <div class="order-form mb-3">
                    <div class="order-user">
                        <span>name</span>
                        <span>data</span>
                    </div>
                    <span>Название места</span>
                    <div class="order-status d-flex justify-content-between">
                        <span>Статус заявки: </span>
                        Новый
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12"></div>
        </div>
    </div>

    <x-scripts />
</body>

</html>