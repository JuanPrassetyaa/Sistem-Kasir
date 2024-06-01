<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function store(Request $request)
    {
        $validatedData= $request->validate([
            'namaproduk' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'img' => 'required',
        ]);
        $image = $request->file('img');
        $imgName = time().rand().'.'.$image->extension();
        if(!file_exists(public_path('/fotoProduk'.$image->getClientOriginalName()))){
            $destinationPath = public_path('/fotoProduk');
            $image->move($destinationPath, $imgName);
            $uploaded = $imgName;
        }else{
            $uploaded = $image->getClientOriginalName();
        }

        Produk::create([
            'namaproduk'=> $request->namaproduk,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'img' => $uploaded,
        ]);

        return redirect()->route('dashboard')->withSuccess('Success menambahakan Product')->withInput();
    }

    public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'namaproduk.'.$id => 'required',
        'harga.'.$id => 'required',
        'stock.'.$id => 'required',
    ]);


    $data['namaproduk'] = $request->input('namaproduk.'.$id);
    $data['harga'] = $request->input('harga.'.$id);
    $data['stock'] = $request->input('stock.'.$id);

    Produk::whereId($id)->update($data);

    return redirect()->route('dashboard')->withSuccess('Successfully Updated Product');
}


//DELETE -----------------------------------------------------------------------------------------------------------------------------

public function destroy($id)
{
    $data = Produk::find($id);

    if ($data) {
        $data->delete();
    }

    return redirect()->route('dashboard')->withSuccess('Success Menghapus Produk')->withInput();
}

}
