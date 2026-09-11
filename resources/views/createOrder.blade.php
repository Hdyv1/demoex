<!DOCTYPE html>
<html lang="en">
<x-head />

<body>
    <x-header class="mb-5" />
    <h2 class="text-center mb-3">Создание заявки</h2>
    <div class="container">
        <div class="row">
            <div class="col-12 form-control p-3">
                <form action="{{ route('createOrder') }}" method="post">
                    @csrf
                    <div class="container">
                        <div class="row">

                            <div class="col-6">
                                <label class="form-label" for="place">Выберите место проведения</label>
                                <select class="form-select" name="place">
                                    <option selected>Откройте меню выбора места</option>
                                    @foreach ($places as $place)
                                    <option value="{{ $place->id }}">{{$place->title }}</option>
                                    @endforeach
                                </select>
                                @error('place')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="date">Выберите дату проведения</label>
                                <input type="date" class="form-control" name="date">
                                @error('date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label" for="payMethod">Способ оплаты</label>
                                <select class="form-select" name="payMethod">
                                    <option selected value="cash">Наличные</option>
                                    <option value="card">СБП</option>
                                </select>
                                @error('payMethod')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Отправить</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-scripts />
</body>

</html>