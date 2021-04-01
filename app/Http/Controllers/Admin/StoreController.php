<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Store;
use App\Http\Requests\StoreRequest;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
   use UploadTrait;

    public function __construct()
    {
       $this->middleware('user.has.store')->only(['create', 'store']);
    }
   
   
    public function index()
{
    $user = auth()->user();
    $store = Store::where('user_id', $user->id)->first();

    return view('admin.stores.index', compact('store'));
}

    public function create()
    {
        $users = \App\Models\User::all(['id', 'name']);

        return view('admin.stores.create', compact('users'));
    }

    public function store(StoreRequest $request)
    {       
        $data = $request->all();
        $user = auth()->user();

        if($request->hasFile('logo')){
            $data['logo'] = $this->imageUpload($request->file('logo'));
        }
        $store = DB::transaction(function () use ($request, $user) {
            
            $request->merge([
                'user_id' => $user->id
            ]);
            $store = Store::create($request->all());
           
            return $store; 
          });
          
    
    flash('Loja Criada com Sucesso')->success();
     return redirect()->route('admin.stores.index');
     
     $validated = $request->validated();
        
    }

    public function edit($store)
    {
        $store = \App\Models\Store::find($store);

        return view('admin.stores.edit', compact('store'));
    }
    
    public function update(StoreRequest $request, $store)
    {
        $data = $request->all();
        $store = \App\Models\Store::find($store);
        
        if($request->hasFile('logo')){
            if(Storage::disk('public')->exists($store->logo)){
                Storage::disk('public')->delete($store->logo);
            }

            $data['logo'] = $this->imageUpload($request->file('logo'));
        }
        $store->update($data);

        flash('Loja Atualizada com Sucesso')->success();
        return redirect()->route('admin.stores.index');
    }

    public function destroy($store)
    {
        $store = \App\Models\Store::find($store);
        $store->delete();

        flash('Loja Removida com Sucesso')->success();
        return redirect()->route('admin.stores.index');
    }

    
}
