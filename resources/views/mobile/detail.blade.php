@extends('layouts.mobile')
@section('css')
    <link href="{{asset('/css/detail.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('js')
    <script type="text/javascript" src="{{asset('/js/mobile/detail.js')}}" ></script>
@endsection
@section('content')
    <div class="good-show">
        <div class="good-detail">
            <section class="ect-margin-tb ect-margin-lr">
                <h4 class="title pull-left"><strong>{{$good['name']}}</strong></h4>
            </section>
            <section class="ect-margin-tb ect-margin-lr">
                <span class="time">{{$good['created_at']}}</span>
                <span class="view">{{$good['view']}}查看</span>
            </section>
            <div class="focus goods-focus ect-padding-lr ect-margin-tb goods-optio">
                <div class="bd">
                    <ul id="Gallery">
                        <li><a href="javascript:void(0);"><img src="{{$good['surface']}}" alt=""></a></li>
                    </ul>
                </div>
                <div class="bd">
                    <?php echo $good['desc'];?>
                </div>
            </div>

        </div>
        <form method="post" onsubmit="javascript:return false;" id="buy">
            <div class="good-style">
                <section class="ect-margin-tb ect-margin-lr">
                    <h4 class="title pull-left"><strong>在线快速订购</strong></h4>
                </section>
                <section class="ect-margin-tb ect-margin-lr choose">
                    <h4 class="title pull-left"><strong>选择产品</strong></h4>
                </section>
                <ul>
                    @foreach($good['production'] as $production)
                        <li><input type="radio" name="production" value="{{$production['id']}}">{{$production['desc']}}</li>
                    @endforeach
                </ul>
                <section class="ect-margin-tb ect-margin-lr choose">
                    <h4 class="title pull-left"><strong>选择型号</strong></h4>
                </section>
                <ul>
                    @foreach($good['size'] as $size)
                        <li><input type="radio" name="size" value="{{$size['id']}}">{{$size['desc']}}</li>
                    @endforeach
                </ul>
                <section class="ect-margin-tb ect-margin-lr choose">
                    <h4 class="title pull-left"><strong>顾客信息</strong></h4>
                </section>
                <ul>
                    <li>顾客姓名：<input type="text" class="text" name="user_name" placeholder="请输入收件人姓名"></li>
                    <li>手机号码：<input type="text" maxlength="11" class="text" name="phone" placeholder="请输入手机号码"></li>
                    <li>收件地址：<textarea class="address" name="address"></textarea></li>
                    <li class="feedback-buyer">买家留言：<textarea maxlength="200" class="feedback" name="feedback" placeholder="请输入您的留言，最多200个字"></textarea></li>
                </ul>
            </div>
        </form>
		<div class="ect-padding-lr ect-padding-tb goods-submit">
			<div>
                <input type="submit" class="btn btn-info ect-btn-info ect-colorf ect-bg" value="提交订单">
			</div>
		</div>
        <div class="ect-padding-lr ect-padding-tb goods-submit">
            <p>温馨提示：为了保证您能及时收到产品，请正确填写您的个人信息。</p>
		</div>
    </div>
@endsection
