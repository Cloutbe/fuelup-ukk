<!DOCTYPE html>
<html>
<head>
    <title>Struk #{{ $order->id }}</title>
    <style>
        body { font-family: 'Courier New', monospace; font-size: 10px; margin: 0; padding: 5px; }
        .header { text-align: center; border-bottom: 1px dashed #000; padding-bottom: 5px; margin-bottom: 5px; }
        .item { display: flex; justify-content: space-between; margin-bottom: 3px; }
        .total { border-top: 1px dashed #000; margin-top: 5px; padding-top: 5px; text-align: right; font-weight: bold; }
        .footer { text-align: center; margin-top: 10px; font-size: 8px; }
    </style>
</head>
<body>
    <div class="header">
        <strong>FUEL UP COFFEE</strong><br>
        Jl. Kopi Nikmat No. 1<br>
        Date: {{ $order->created_at->format('d/m/Y H:i') }}<br>
        Order ID: #{{ $order->id }} | Meja: {{ $order->table_number }}
    </div>

    <div style="margin-bottom: 5px;">
        <strong>{{ $order->product->name }}</strong><br>
        {{ $order->quantity }} x Rp {{ number_format($order->product->price, 0, ',', '.') }}
    </div>

    <div class="total">
        Total: Rp {{ number_format($order->total_price, 0, ',', '.') }}
    </div>

    <div class="footer">
        Terima Kasih!<br>
        Silakan Datang Kembali ☕
    </div>
</body>
</html>
