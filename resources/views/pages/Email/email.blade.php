<body>
<table align="center" border="1" cellpadding="0" cellspacing="0"
       width="550" bgcolor="white" style="border:2px solid black;">
    <tbody>
    <tr>
        <td align="center">
            <table align="center" border="0" cellpadding="0"
                   cellspacing="0" class="col-550" width="550">
                <tbody>
                <tr>
                    <td align="center" style="background-color: #4cb96b;
										height: 50px;">
                        <a href="#" style="text-decoration: none;">
                            <p style="color:white;
												font-weight:bold;">
                                KnQ
                            </p>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr style="height: 300px;">
        <td align="center" style="border: none;
						border-bottom: 2px solid #4cb96b;
						padding-right: 20px;padding-left:20px">

            <p style="font-weight: bolder;font-size: 42px;
							letter-spacing: 0.025em;
							color:black;">
                Kính chào quý khách!
                <br> Đây là đơn hàng của bạn
            </p>
        </td>
    </tr>

    <tr>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
    </tr>
    @foreach($data['cart'] as $item)
        <tr>
            <td class="text-center">
                {{$item->name}}
            </td>
            <td>
                {{$item->qty}}
            </td>
            <td>
                {{$item->price}}
            </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="3">
            Tổng cộng: {{$data['total']}}
        </td>
    </tr>

    <tr style="height: 200px;">
        <td align="center" style="border: none;
						border-bottom: 2px solid #4cb96b;
						padding-right: 20px;padding-left:20px">

            <p style="font-weight: bolder;font-size: 24px;
							letter-spacing: 0.025em;
							color:black;">
                Chân thành cám ơn quý khách đã lựa chọn KnQ! Chúng tôi sẽ liên hệ với quý khách sớm nhất để hoàn tất việc đặt hàng!
            </p>
        </td>
    </tr>
    </tbody>
</table>
</body>
