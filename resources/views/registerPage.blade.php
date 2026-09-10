<!DOCTYPE html>
<html lang="en">

</html>
<x-head />

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="authForm">
                    <div class="container">
                        <div class="row">
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="col-12 mb-3">
                                    <label for="fullname" class="form-label">Полное имя</label>
                                    <input type="text" class="form-control" placeholder="fullname" name="fullname" value="{{ old('fullname') }}" />
                                    @error('fullname')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="username" class="form-label">Имя Пользователя</label>
                                    <input type="text" class="form-control" placeholder="userName" name="username" value="{{ old('username') }}"/>
                                    @error('username')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"/>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phonenumber" class="form-label">Номер телефона</label>
                                    <input type="text" class="form-control" placeholder="phoneNumber" name="phonenumber" value="{{ old('phonenumber') }}"/>
                                    @error('phonenumber')
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
                                    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                                </div>
                                <div class="col-12">
                                    Уже есть аккаунт? <a href="{{ route('index') }}">Авторизоваться</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-scripts />
</body>

</html>