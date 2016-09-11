@extends('layouts.mobile')
@section('css')
    <link href="{{asset('/css/list.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class='list'>
        <div class='menus'>
            @foreach($classification as $c)
                <a class="{{$c['class']}}" href="{{$c['url']}}">{{$c['name']}}</a>
            @endforeach
        </div>
    </div>
    <div class="show">
        <ul class="item">
            @foreach($goods as $good)
                <li>
                    <a href="{{$good['url']}}">
                        <img src="{{$good['surface']}}">
                    </a>
                    <dl>
                        <dt>
                            <h4 class="title title-a">
                                <a href="{{$good['url']}}">{{$good['name']}}</a>
                            </h4>
                        </dt>
                        <dt>
                            <h4 class="title">
                                {{$good['desc']}}
                            </h4>
                        </dt>
                        <dd>
                            <span class="time">{{$good['created_at']}}</span>
                            <span class="view">{{$good['view']}}次查看</span>
                        </dd>
                    </dl>
                </li>
            @endforeach
        </ul>
    </div>
	<ul class="pager ect-margin-lr ect-page">
        @if ($has_pre)
            <li class="pull-left"><a href="{{route('good.list', ['page' => $page - 1, 'c_id' => $classify_id])}}">上一页</a></li>
        @else
            <li class="pull-left"><a href="javascript:void(0)">上一页</a></li>
        @endif
        @if($has_next)
            <li class="pull-right"><a href="{{route('good.list', ['page' => $page + 1, 'c_id' => $classify_id])}}">下一页</a></li>
        @else
            <li class="pull-right"><a href="javascript:void(0)">下一页</a></li>
        @endif
	</ul>
@endsection
