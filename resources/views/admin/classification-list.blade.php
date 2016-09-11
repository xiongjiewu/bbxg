@extends('layouts.app')
@extends('layouts.admin')
@section('body')
<div class="panel panel-default">
    <!-- Default panel contents -->
      <div class="panel-heading"><a href="{{route('admin.classification.add')}}">+添加分类</a></div>
      <table class="table">
        <thead>
          <tr>
            <th width="100">ID</th>
            <th width="200">名称</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
            @foreach($classification as $c)
                <tr>
                    <td>{{$c['id']}}</td>
                    <td>{{$c['name']}}</td>
                    <td>
                    <a href="{{route('admin.classification.add', ['classification_id' => $c['id']])}}">编辑</a>
                        |
                        <a href="javascript:void(0);" class="action" action="delete" id="{{$c['id']}}">删除</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <script type="text/javascript" src="{{asset('/js/admin/order-list.js')}}" ></script>
@endsection
