<header class="m-3">
    <div class="container">
        <div class="row text-center">
            <div class="col-4">
                Просмотр заявок
            </div>
            <div class="col-4">
                Формирование заявки
            </div>

            @if (auth::user()->role=='admin')
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