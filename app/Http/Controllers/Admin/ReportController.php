<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Import Library PDF

class ReportController extends Controller
{
    // CETAK LAPORAN BULANAN (PDF)
    public function exportPdf()
    {
        // Ambil data pesanan yang statusnya 'paid' atau 'done'
        // Kita ambil data bulan ini saja biar relevan
        $orders = Order::with(['user', 'product'])
            ->whereIn('status', ['paid', 'done'])
            ->whereMonth('created_at', date('m')) // Bulan ini
            ->whereYear('created_at', date('Y'))  // Tahun ini
            ->latest()
            ->get();

        // Hitung total pendapatan
        $totalRevenue = $orders->sum('total_price');

        // Load view PDF dan kirim datanya
        $pdf = Pdf::loadView('admin.reports.monthly', compact('orders', 'totalRevenue'));

        // Download file PDF dengan nama 'laporan-penjualan.pdf'
        return $pdf->download('laporan-penjualan-' . date('F-Y') . '.pdf');
    }

    // CETAK STRUK PEMBAYARAN (Per Transaksi)
    public function printReceipt($id)
    {
        $order = Order::with(['user', 'product'])->findOrFail($id);

        // Kita pakai stream() biar langsung terbuka di browser, bukan download
        $pdf = Pdf::loadView('admin.reports.receipt', compact('order'));

        // Set ukuran kertas struk (misal ukuran thermal 58mm/80mm, disesuaikan custom)
        $pdf->setPaper([0, 0, 226, 400], 'portrait');

        return $pdf->stream('struk-order-' . $order->id . '.pdf');
    }
}
