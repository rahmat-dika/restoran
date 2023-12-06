<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Order;
use App\Models\DetailOrder;
use App\Models\VwDetail;
use Illuminate\Validation\Validator;
use Exception;


class PesananController extends Controller
{
    public function index()
    {
        $order = Order::where('flag', 1)->where('status_order', 'Belum Bayar')->orderBy('created_at', 'DESC')->get();
        $data = [
            'order' => $order,
        ];
        return view('pesanan', $data)->with('data', $data);
    }

    public function riwayat()
    {
        $order = Order::where('flag', 1)->where('status_order', 'Sudah Bayar')->get();
        $data = [
            'order' => $order,
        ];
        return view('riwayat_pesanan', $data)->with('data', $data);
    }

    public function create()
    {
        $menu = Menu::where('flag', 1)->get();
        $data = [
            'menu' => $menu,
        ];
        return view('add_pesanan', $data)->with('data', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_name' => 'required',
            'table' => 'required',
        ]);
        
        $data_order = [
            'order_name' => $request->order_name,
            'table' => $request->table,
            'flag' => 1,
            // 'created_by' => Auth::user()->id_user,
        ];
        
        $createOrder = Order::create($data_order);

        $data = [
            'id_order' => $createOrder->id,
        ];
        
        return response()->json($data);
    }

    public function detail(Request $request)
    {
        $request->validate([
            'id_order' => 'required',
            'id_food' => 'required',
            'total' => 'required',
        ]);
        
        $data_detail = [
            'id_order' => $request->id_order,
            'id_food' => $request->id_food,
            'total' => $request->total,
            'flag' => 1,
            // 'created_by' => Auth::user()->id_user,
        ];
        
        $detailOrder = DetailOrder::create($data_detail);
        $tableDetail = VwDetail::where('id_order', $detailOrder->id_order)->where('flag', 1)->get();
        $totalHarga = VwDetail::where('id_order', $detailOrder->id_order)->where('flag', 1)->sum('total_price');
        
        $data = [
            'order_id' => $request->id_order,
            'id_order' => $detailOrder->id,
            'table_detail' => $tableDetail,
            'total_harga' => $totalHarga,
        ];
        
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $data_edit = [
            'total' => $request->total,
        ];
        
        Detail::where('id_detail', $request->id_detail)->update($data_edit);

        $tableDetail = VwDetail::where('id_order', $detailOrder->id_order)->where('flag', 1)->get();
        
        $data = [
            'table_detail' => $tableDetail,
        ];
        
        return response()->json($data);
    }

    public function delete(Request $request)
    {
        $data_hapus = [
            'flag' => 0,
            // 'updated_by' => Auth::user()->id_user,
        ];
        
        Detail::where('id_detail', $request->id_detail)->update($data_menu);
        Menu::where('id_menu', $request->id_menu)->update($data);
        
        return response()->json($data);
    }

    public function pay($id)
    {
        $total = VwDetail::where('id_order', $id)->where('flag', 1)->sum('total_price');
        $order = Order::where('id_order', $id)->first();
        $detail = VwDetail::where('id_order', $id)->where('flag', 1)->get();
        
        $data = [
            'total_payment' => $total,
            'status_order' => 'Belum Bayar'
            // 'updated_by' => Auth::user()->id_user,
        ];
        
        Order::where('id_order', $id)->update($data);

        $data_order = [
            'order' => $order,
            'detail' => $detail,
            'total' => $total,
        ];
        // dd($data);
        
        return view('pay_pesanan', $data_order)->with('data_order', $data_order);
    }

    public function tunai(Request $request)
    {
        $data = [
            'total_payment' => $request->total_payment,
            'status_order' => 'Sudah Bayar'
            // 'updated_by' => Auth::user()->id_user,
        ];
        
        Order::where('id_order', $request->id_order)->update($data);
        $order = Order::where('id_order', $request->id_order)->first();

        $data = [
            'order' => $order->id_order
        ];
        
        return response()->json($data);
    }

    public function struk($id, $kembalian)
    {
        $order = Order::where('id_order', $id)->first();
        $detail = VwDetail::where('id_order', $id)->where('flag', 1)->get();
        
        $data = [
            'order' => $order,
            'detail' => $detail,
            'kembalian' => $kembalian,
        ];
        
        return view('struk', $data)->with('data', $data);
    }
}