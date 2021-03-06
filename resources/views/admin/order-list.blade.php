@extends('layouts.app')
@extends('layouts.admin')
@section('body')
<div class="panel panel-default">
      <div class="panel-heading">
          <a href="{{route('admin.order.export')}}">导出</a>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th width="100">订单ID</th>
            <th width="200">客户名字</th>
            <th>手机号码</th>
            <th>收货地址</th>
            <th width="80">商品ID</th>
            <th width="80">商品名称</th>
            <th width="80">产品套餐</th>
            <th width="80">选择型号</th>
            <th width="80">分类</th>
            <th width="80">留言</th>
            <th width="200">操作</th>
          </tr>
        </thead>
        <tbody>
            @foreach($order as $o)
                <tr>
                    <td>{{$o['id']}}</td>
                    <td>{{$o['user_name']}}</td>
                    <td>{{$o['phone']}}</td>
                    <td>{{$o['address']}}</td>
                    <td>{{$o['good_id']}}(<a href="{{route('good.detail', ['id' => $o['good_id']])}}" target="_blank">查看</a>)</td>
                    <td>{{$o['good']['name']}}</td>
                    <td>{{$o['production']['desc']}}</td>
                    <td>{{$o['size']['desc']}}</td>
                    <td>{{$o['classification']['name']}}</td>
                    <td>{{$o['feedback']}}</td>
                    <td>
                        <a href="javascript:void(0);" class="action" action="sending" id="{{$o['id']}}">已发货</a>
                        |
                        <a href="javascript:void(0);" class="action" action="complete" id="{{$o['id']}}">已付款</a>
                        |
                        <a href="javascript:void(0);" class="action" action="delete" id="{{$o['id']}}">取消</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <script type="text/javascript" src="{{asset('/js/admin/order-list.js')}}" ></script>
@endsection
