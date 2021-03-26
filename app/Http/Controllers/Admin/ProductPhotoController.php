<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductPhoto;

class ProductPhotoController extends Controller
{
    public function delete(Request  $request){
        
        
        $photoName = $request->get('photoName');

        //Removo dos arquivos
        if(Storage::disk('public')->exists($photoName)){
            Storage::disk('public')->delete($photoName);
        }
        
        //Removo a imagem do banco
        $removePhoto = ProductPhoto::where('image', $photoName);
        $productId = $removePhoto->first()->product_id;
        
        $removePhoto->delete();

        flash('Imagem removida com sucesso!')->success();
        return redirect()->route('admin.products.edit', ['product'=>$productId]);
    }
}
