<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\GoodService;
use App\Service\ClassificationService;

class HomeController extends Controller
{
    private $tab;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->tab = 1;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $good_service = new GoodService();
        $goods = $good_service->getList();
        $classification_service = new ClassificationService();
        foreach($goods as &$good) {
            $good['desc'] = strip_tags(mb_substr($good['desc'], 0, 70, 'UTF-8'));
            $good['classification'] = $classification_service->show($good['classification_id']);
        }
        $total = $good_service->getTotal();
        return view('admin.home', [
            'goods' => $goods,
            'total' => $total,
            'tab' => $this->tab,
        ]);
    }

    public function down($id)
    {
        $good_service = new GoodService();
        $good_service->down($id);
        return response(['status' => 'ok', 'msg' => '操作成功']);
    }

    public function add(Request $request)
    {
        $good_service = new GoodService();
        $id = $request->get('id');
        $good = [];
        if ($id) {
            try {
                $good = $good_service->show($id);
                $good['production_desc'] = implode("\n", array_column($good['production'], 'desc'));
                $good['size_desc'] = implode("\n", array_column($good['size'], 'desc'));
            } catch (\Exception $e) {

            }
        }
        $classification_service = new ClassificationService();
        $classification = $classification_service->getAll();
        return view('admin.good-add', [
            'classification' => $classification,
            'good' => $good,
            'tab' => $this->tab,
        ]);
    }

    public function addAction(Request $request)
    {
        $params = $request->all();
        if (empty($params['name'])) {
            return response(['status' => 'error', 'msg' => '请输入名称']);
        }
        if (empty($params['desc'])) {
            return response(['status' => 'error', 'msg' => '请输入描述']);
        }
        if (empty($params['classification_id'])) {
            return response(['status' => 'error', 'msg' => '请选择分类']);
        }
        if (empty($params['surface'])) {
            return response(['status' => 'error', 'msg' => '请输入封面图']);
        }
        if (empty($params['production'])) {
            return response(['status' => 'error', 'msg' => '请输入产品']);
        }
        if (empty($params['size'])) {
            return response(['status' => 'error', 'msg' => '请输入型号']);
        }
        $good_id = $request->get('good_id');
        $good_service = new GoodService();
        if ($good_id) {
            $good_service->edit($good_id, $params);
        } else {
            $good_service->store($params);
        }
        return response(['status' => 'ok', 'msg' => '操作成功']);

    }
}
