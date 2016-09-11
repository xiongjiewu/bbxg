@extends('layouts.app')
@extends('layouts.admin')
@section('body')
<div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading"><a href="{{route('admin.good.add')}}">+添加商品</a></div>
      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th width="50">ID</th>
            <th width="200">名称</th>
            <th>封面图</th>
            <th>描述</th>
            <th width="80">分类</th>
            <th width="100">操作</th>
          </tr>
        </thead>
        <tbody>
            @foreach($goods as $good)
                <tr>
                    <td>{{$good['id']}}</td>
                    <td>{{$good['name']}}</td>
                    <td><img width="100" height="100" src="{{$good['surface']}}"></img></td>
                    <td>{{$good['desc']}}</td>
                    <td>{{$good['classification']['name']}}</td>
                    <td>
                    <a href="{{route('admin.good.add', ['id' => $good['id']])}}">编辑</a>
                        |
                        <a href="javascript:void(0);" class="down" id="{{$good['id']}}">下架</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <script type="text/javascript" src="{{asset('/js/admin/home.js')}}" ></script>
@endsection
