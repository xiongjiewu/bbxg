@extends('layouts.app')
@extends('layouts.admin')
@section('body')
    <script type="text/javascript" src="{{asset('/js/xheditor/xheditor.js')}}" ></script>
    <script type="text/javascript" src="{{asset('/js/xheditor/xheditor_lang/zh-cn.js')}}" ></script>
	<div class="bs-example">
        <form role="form" id="add" onsubmit="javascript:return false;">
            <input type='hidden' id="classification_id" name="classification_id" value="{{$classification['id'] or ''}}"></input>
            <div class="form-group">
                <label for="name">名称</label>
                <input type="text" required autofocus name="name" class="form-control" id="name" placeholder="商品名称" value={{$classification['name'] or ''}}>
            </div>
            <button type="submit" class="btn btn-default">提交</button>
        </form>
    </div>
    <script type="text/javascript" src="{{asset('/js/admin/classification-add.js')}}" ></script>
@endsection

