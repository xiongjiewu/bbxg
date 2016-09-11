@extends('layouts.app')
@extends('layouts.admin')
@section('body')
    <script type="text/javascript" src="{{asset('/js/xheditor/xheditor.js')}}" ></script>
    <script type="text/javascript" src="{{asset('/js/xheditor/xheditor_lang/zh-cn.js')}}" ></script>
	<div class="bs-example">
        <form role="form" id="add" onsubmit="javascript:return false;">
            <input type='hidden' id="good_id" name="good_id" value="{{$good['id'] or ''}}"></input>
            <div class="form-group">
                <label for="name">名称</label>
                <input type="text" required autofocus name="name" class="form-control" id="name" placeholder="商品名称" value={{$good['name'] or ''}}>
            </div>
            <div class="form-group">
                <label for="desc">描述</label>
                <textarea name="desc" class="form-control" rows="10" id="desc">{{$good['desc'] or ''}}</textarea>
            </div>
            <div class="form-group">
                <label for="desc">产品<font color="red">(多条以回车分隔)</font></label>
                <textarea name="production" class="form-control" rows="10" id="production">{{$good['production_desc'] or ''}}</textarea>
            </div>
             <div class="form-group">
                 <label for="desc">型号<font color="red">(多条以回车分隔)</font></label>
                <textarea name="size" class="form-control" rows="10" id="size">{{$good['size_desc'] or ''}}</textarea>
            </div>
            <div class="form-group">
                <label for="surface">封面图</label>
                <input type="text" required autofocus name="surface" class="form-control" id="surface" placeholder="封面图地址" value={{$good['surface'] or ''}}>
                <p class="help-block">请填写封面图图片地址</p>
            </div>
			<div class="form-group">
                <label for="assification_id">分类</label>
				<select class="form-control" required autofocus name="classification_id" id="classification_id">
                    @if (empty($good))
                        <option value="0">请选择分类</option>
                    @endif;
                    @foreach($classification as $c)
                        <option @if (!empty($good) && $good['classification_id'] == $c['id']) {{'selected'}}@endif value="{{$c['id']}}">{{$c['name']}}</option>
                    @endforeach
				</select>
			</div>
            <button type="submit" class="btn btn-default">提交</button>
        </form>
    </div>
    <script>
        var editor = $("#desc").xheditor();
    </script>
    <script type="text/javascript" src="{{asset('/js/admin/add.js')}}" ></script>
@endsection

