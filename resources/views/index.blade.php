<!DOCTYPE html>
<html lang="en">

</html>
<x-head />

<body>
    @auth
    <x-header />
    <div class="container">
        <div class="form-cont">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center mb-5">Доступные места для конференций</h3>
                    <div class="container">
                        <div class="row">
                            @foreach ($places as $place)
                            <div class="col-lg-6 col-sm-12 d-flex flex-column align-items-center">
                                <div class="d-flex flex-column align-items-center align-items-lg-start">
                                    <img src="{{ asset($place->image) }}" width="350px" alt="">
                                    <h4>{{$place->title}}</h4>
                                    <p>{{ $place->description }}</p>
                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <x-footer />
    @else
    <div class="container my-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="authForm">
                    <div class="container">
                        <div class="row">
                            <form action="{{ route('auth') }}" method="post">
                                @csrf
                                <div class="col-12 mb-3">
                                    <label for="username" class="form-label">Имя Пользователя</label>
                                    <input type="text" class="form-control" placeholder="username" name="username" value="{{ old('username') }}" />
                                    @error('username')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="password" class="form-label">Пароль</label>
                                    <input type="text" class="form-control" placeholder="password" name="password" />
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Авторизоваться</button>
                                </div>
                                <div class="col-12">
                                    Ещё нет аккаунта? <a href="{{ route('registerForm') }}">Зарегистрироваться</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endauth

    <x-scripts />
</body>

</html>