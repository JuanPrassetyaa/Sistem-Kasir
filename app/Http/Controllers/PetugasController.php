<?php

namespace App\Http\Controllers;

use App\Exports\DataExport;
use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PetugasController extends Controller
{
    public function penjualan()
    {
        $user = Auth::user();
        $namaPengguna = $user->nama;
        $img = $user->img;
        $role = $user->role;
        $penjualans = Penjualan::with(['pelanggan', 'detailPenjualan.product'])->get();
        $pelanggans = Pelanggan::all();
        return view('petugas.penjualan', compact('penjualans', 'pelanggans', 'namaPengguna', 'img', 'role', 'user'));
    }


    public function dashboard()
    {
        $user = Auth::user();
        $namaPengguna = $user->nama;
        $img = $user->img;
        $role = $user->role;
        $products = Produk::all();
        return view('petugas.dashboard-petugas', compact('products', 'namaPengguna', 'img', 'role', 'user'));
    }

public function struk($penjualan_id )
    {
        $penjualan = Penjualan::findOrFail($penjualan_id);  
        $detail_penjualan = DetailPenjualan::where('penjualan_id',$penjualan_id)->get();
        return view('petugas.struk', compact('penjualan', 'detail_penjualan'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'namapelanggan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'bayar' => 'required',
            'quantity' => 'required|min:1',
        ]);

        $total_price = 0;

        foreach ($request->product_id as $product) {
            $produk = Produk::findOrFail($product);
            $total_price += $produk->harga * $request->quantity[$product];
        }


        $pelanggan = Pelanggan::create([
            'namapelanggan' => $request->namapelanggan,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'bayar' => $request->bayar,
        ]);

        $created_by_user_id = auth()->id();

        $penjualan = Penjualan::create([
            'total_price' => $total_price,
            'product' => $produk->id,
            'pelanggan_id' => $pelanggan->id,
            'created_by_user_id' => $created_by_user_id,
        ]);

        foreach ($request->product_id as $product) {
            $produk = Produk::findOrFail($product);
            $subTotal =  $produk->harga * $request->quantity[$product];
            DetailPenjualan::create([
                'penjualan_id' => $penjualan->id,
                'produk_id' => $product,
                'quantity' => $request->quantity[$product],
                'subtotal' => $subTotal,
            ]);
            $produk->stock -= $request->quantity[$product];
            $produk->save();
        }

        // Kurangi stok produk

        return redirect()->route('struk',$penjualan->id)->with('success', 'Transaksi berhasil disimpan.');
    }



    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama.' . $id => 'required',
            'alamat.' . $id => 'required',
            'telepon.' . $id => 'required',
        ]);


        $data['nama'] = $request->input('nama.' . $id);
        $data['alamat'] = $request->input('alamat.' . $id);
        $data['telepon'] = $request->input('telepon.' . $id);

        Pelanggan::whereId($id)->update($data);

        return redirect()->route('pelanggan-list')->withSuccess('Successfully Updated Purchase');
    }



    public function destroy($id)
    {
        $penjualans = Penjualan::find($id);
        $penjualans->delete();
        return back()->with("History deleted successfully.");
    }

}
