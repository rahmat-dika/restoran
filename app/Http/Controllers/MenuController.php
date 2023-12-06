<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use Illuminate\Validation\Validator;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;


class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::where('flag', 1)->get();
        $data = [
            'menu' => $menu,
        ];
        return view('menu', $data)->with('data', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'food_name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
            'pict_food' => 'image|file|mimes:jpeg,png,jpg,gif,svg'
        ]);
        
        $pict_food = time() . '.' . $request->pict_food->extension();
        $request->pict_food->move(public_path('assets/pict_food'), $pict_food);

        $data_menu = [
            'food_name' => $request->food_name,
            'category' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
            'pict_food' => $pict_food,
            'flag' => 1,
            // 'created_by' => Auth::user()->id_user,
        ];
        
        Menu::create($data_menu);
        Alert::success('Success!!', 'Berhasil Menambahkan Menu');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'food_name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
            'pict_food' => 'image|file|mimes:jpeg,png,jpg,gif,svg'
        ]);
        
        if ($request->hasFile('pict_food')) {
            $pict_food = time() . '.' . $request->pict_food->extension();
            $request->pict_food->move(public_path('assets/pict_food'), $pict_food);

            $data_menu = [
                'food_name' => $request->food_name,
                'category' => $request->category,
                'price' => $request->price,
                'description' => $request->description,
                'pict_food' => $pict_food,
                // 'created_by' => Auth::user()->id_user,
            ];
            
        }else{
            $data_menu = [
                'food_name' => $request->food_name,
                'category' => $request->category,
                'price' => $request->price,
                'description' => $request->description,
                // 'created_by' => Auth::user()->id_user,
            ];
            
        }
        Menu::where('id_menu', $request->id_menu)->update($data_menu);
        Alert::success('Success!!', 'Berhasil Mengubah Menu');
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $data = [
            'flag' => 0,
            // 'updated_by' => Auth::user()->id_user,
        ];
        
        Menu::where('id_menu', $request->id_menu)->update($data);
        Alert::success('Success!!', 'Berhasil Menghapus Menu');
        return redirect()->back()->with('success', 'Berhasil Menghapus Berita!!');
    }
}