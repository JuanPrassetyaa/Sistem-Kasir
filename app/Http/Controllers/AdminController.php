<?php

namespace App\Http\Controllers;

use App\Exports\PelangganExport;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk ;
use App\Models\User;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use PDF;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function dashboard()
    {
        $produk = Produk::all();
        $users = User::all();
        $totalUser = User::count();
        $pelanggans = Pelanggan::count();
        $totalProduk = Produk::count();
        $user = Auth::user();
        $namaPengguna = $user->nama;
        $img = $user->img;
        $role = $user->role; 
        return view('admin.dashboard', compact('produk','totalProduk','pelanggans','users','totalUser','img','namaPengguna','role'));
    }

    public function pembelian()
    {
        $user = Auth::user();
        $namaPengguna = $user->nama;
        $img = $user->img;
        $role = $user->role; 
        $penjualans = Penjualan::with(['pelanggan', 'detailPenjualan.product'])->get();
        $pelanggans = Pelanggan::all();
        return view('admin.pembelian', compact('pelanggans','penjualans','img','namaPengguna','role'));
    }

    public function excel()
    {
        return Excel::download(new PelangganExport, 'Data Penjualan - Juan Store' . '.xlsx');
    }

}
