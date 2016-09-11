@section('content')
    <div class="container">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" @if (empty($tab) || $tab == 1)class="active" @endif><a href="{{route('admin.home')}}">商品列表</a></li>
            <li role="presentation" @if (!empty($tab) && $tab == 2)class="active" @endif ><a href="{{route('admin.order.list')}}">订单列表</a></li>
            <li role="presentation" @if (!empty($tab) && $tab == 3)class="active" @endif ><a  href="{{route('admin.classification.list')}}">分类列表</a></li>
        </ul>
        @yield('body')
    </div>
@endsection

