<?php

namespace App\Http\Controllers;

use App\Models\Detailsorder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;

class OrderController extends Controller
{
    public function update_order(Request $request,$id_detailsorder){
        $data = array();
        $data['quantity'] = $request->quantity;
        DB::table('tbl_detailsorder')->where('id_detailsorder',$id_detailsorder)->update($data);
        Session::put('message','Cập nhật số lượng sản phẩm thành công');
        return redirect()->back();
    }

    public function update_status(Request $request,$id_order){

        $data = array();
        $data['total_order']=$request->total_order;
        $data['status_order'] = $request->payment_option;
        DB::table('tbl_order')->where('id_order',$id_order)->update($data);
        Session::put('message','Cập nhật đơn hàng thành công');
        return redirect()->back();

    }
    public function delete_order($id_order){
//        Detailsorder::destroy($id_order);
//        Order::destroy($id_order);
//        Session::put('message','xóa đơn hàng thành công.');
//        return redirect()->back();



        DB::beginTransaction();
        try {
//            $d_order= Detailsorder::find($id_order);
            $order=Order::find($id_order);

//            $d_order->delete();
            $order->delete();
            DB::commit();
            return redirect()->back()->with('message','Xóa thành công.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('message','Thương hiệu hiện đang có sản phẩm không thể xóa được.');
        }
    }



}
