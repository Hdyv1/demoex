<header class="m-3">
    <div class="container">
        <div class="row text-center">
            <div class="col-4">
                <a href="{{ route('orders') }}">Просмотр заявок</a>
                
            </div>
            <div class="col-4">
                <a href="{{ route('order') }}">Формирование заявки</a>
                
            </div>

            @if (Auth::user()->role=='admin')
            <div class="col-4">
                Панель администратора
            </div>
            @endif
            <div class="col-12">
                <a href="{{ route('logout') }}">Выйти</a>
            </div>
        </div>
    </div>
</header>