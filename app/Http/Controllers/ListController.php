<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Service\GoodService;
use App\Service\BuyService;
use Illuminate\Http\Request;
use App\Service\ClassificationService;

class ListController extends BaseController
{
    public function index(Request $request)
    {
        $limit = 20;
        $classify_id = $request->get('c_id',null);
        $page = $request->get('page', 1);
        $where = [];
        if ($classify_id) {
            $where['classification_id'] = $classify_id;
        }
        $good_service = new GoodService();
        $goods = $good_service->getList($where, $page, $limit);
        foreach($goods as &$good) {
            $good['url'] = route('good.detail',['id' => $good['id']]);
            $good['desc'] = mb_substr(strip_tags($good['desc']), 0, 55, 'UTF-8');
            $good['view'] = $good_service->showViewCount($good['id']);
        }
        $total = $good_service->getTotal($where);
        $has_pre = ($page > 1) ? true : false;
        $has_next = ceil($total / $limit) >= ($page + 1) ? true : false;
        $classification_service = new ClassificationService();
        $classification = $classification_service->getAll();
        foreach($classification as &$c) {
            $c['url'] = route('good.list', ['c_id' => $c['id']]);
            $c['class'] = ($c['id'] == $classify_id) ? 'selected' : '';
        }
        return view('mobile.list', [
            'goods' => $goods,
            'total' => $total,
            'has_next' => $has_next,
            'has_pre' => $has_pre,
            'page' => $page,
            'classify_id' => $classify_id,
            'classification' => $classification,
        ]);
    }

    public function show($id, Request $request)
    {
        $good_service = new GoodService();
        $good = $good_service->show($id);
        $good['view'] = $good_service->showViewCount($id);
        $good_service->storeView($id, $request->getClientIp());
        return view('mobile.detail', ['good' => $good]);
    }

    public function store($id, Request $request)
    {
        $production_id = $request->get('production', null);
        if (!$production_id) {
            return response(['msg' => '请选择产品']);
        }
        $size_id = $request->get('size', null);
        if (!$size_id) {
            return response(['msg' => '请选择型号']);
        }
        $user_name = trim($request->get('user_name', ''));
        if (!$user_name) {
            return response(['msg' => '请填写顾客姓名']);
        }
        $phone = trim($request->get('phone', ''));
        if (!$phone) {
            return response(['msg' => '请填写手机号码']);
        }
        $address = trim($request->get('address', ''));
        if (!$address) {
            return response(['msg' => '请填写收件地址']);
        }
        $data = [
            'good_id' => $id,
            'production_id' => $production_id,
            'size_id' => $size_id,
            'user_name' => $user_name,
            'phone' => $phone,
            'address' => $address,
            'feedback' => $request->get('feedback', '')
        ];
        $buy_service = new BuyService();
        $buy_service->store($data);
        return response(['msg' => '购买成功，感谢您对我们的支持，我们会尽快电话您确认购买情况，再次感谢！']);
    }
}
