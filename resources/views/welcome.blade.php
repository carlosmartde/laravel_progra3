@extends('layout')

@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .card {
            background: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-align: center;
            margin-top: 10px;
        }
        .card i {
            font-size: 18px;
            color: #4a69bd;
            margin-bottom: 15px;
        }
        .card h3 {
            margin: 10px 0;
        }
        .card p {
            color: #777;
        }
    </style>
<body>
<br>
<h1 class="h3 mt-10">Dashboard</h1>

<div class="dashboard">
    <div class="card">
        <i class="fas fa-shopping-cart"></i>
        <h3>Ventas Hoy</h3>
        <p>120 ventas</p>
    </div>
    <div class="card">
        <i class="fas fa-store"></i>
        <h3>Tiendas Activas</h3>
        <p>8 tiendas</p>
    </div>
    <div class="card">
        <i class="fas fa-users"></i>
        <h3>Clientes Registrados</h3>
        <p>1,542 usuarios</p>
    </div>
</div>
<div class="dashboard">
    <div class="card">
        <i class="fas fa-money-bill-wave"></i>
        <h3>Ingresos Hoy</h3>
        <p>$5,430.00</p>
    </div>
    <div class="card">
        <i class="fas fa-truck-fast"></i>
        <h3>Órdenes Enviadas</h3>
        <p>75 pedidos</p>
    </div>
    <div class="card">
        <i class="fas fa-tags"></i>
        <h3>Productos en Oferta</h3>
        <p>23 productos</p>
    </div>
</div>

</body>
</html>
@endsection
