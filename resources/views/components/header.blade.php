<header class="m-3">
    <div class="container header">
        <div class="row text-center d-flex align-items-center">
            <div class="col-lg-3 col-12-sm mb-3 mb-lg-0">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('storage/assets/images/etazhi-logotip-vektor-48.jpg') }}" width="64" height="64" alt="">
                </a>
            </div>
            <div class="col-lg-2 col-sm-3 mb-4 mb-lg-0">
                <a class="a-btn" href="{{ route('orders') }}">Просмотр заявок</a>
                
            </div>
            <div class="col-lg-3 col-sm-3 mb-4 mb-lg-0">
                <a class="a-btn" href="{{ route('order') }}">Формирование заявки</a>
                
            </div>
            @if (Auth::user()->role=='admin')
            <div class="col-lg-3 col-sm-3 mb-4 mb-lg-0">
                <a class="a-btn" href="{{ route('admin') }}">Панель администратора</a>
            </div>
            @endif
            <div class="col-lg-1 col-sm-3 mb-4 mb-lg-0">
                <a class="a-btn" href="{{ route('logout') }}">Выйти</a>
            </div>
        </div>
    </div>
</header>