<!DOCTYPE html>
<html lang="en">
    <x-head />

<body>
    <x-header class="mb-5"/>
    <h2 class="text-center">Просмотр заявок</h2>
    @isset($orders)
    @foreach ($orders as $order)
        <span>Место {{ $order->place->title }}</span>
        <span>Дата {{ $order->date }}</span>
        <span>Способ Оплаты {{ $order->payMethod=='card'?'СБП':'Наличные' }}</span>
    @endforeach
    @endisset
    <x-scripts />
</body>
</html>