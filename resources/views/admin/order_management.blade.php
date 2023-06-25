@extends('layout_admin')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê đơn hàng
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Tên người đặt</th>
                        <th>Tổng giá tiền</th>
                        <th>Tình trạng</th>
                        <th>Quản lý</th>

                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all_order as $key => $order)
                        <tr>
                            <td>{{$order->id_order}}</td>
                            <td>{{ $order->name_customer }}</td>
                            <td>{{ $order->total_order }}</td>
                            <td>{{ $order->status_order }}</td>

                            <td>
                                <a href="{{URL::to('/view-order/'.$order->id_order)}}" class="active styling-edit" ui-toggle-class="">
                                    <i class="fa fa-pencil-square-o text-success text-active"></i></a>
{{--                                <a onclick="return confirm('Bạn có chắc là muốn xóa đơn hàng không?')" href="{{URL::to('/delete-order/'.$order->id_order)}}" class="active styling-edit" ui-toggle-class="">--}}
{{--                                    <i class="fa fa-times text-danger text"></i>--}}
{{--                                </a>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
