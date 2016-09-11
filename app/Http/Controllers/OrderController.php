<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\GoodService;
use App\Service\ClassificationService;
use App\Service\BuyService;

class OrderController extends Controller
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
        $this->tab = 2;
    }

    public function index(Request $request)
    {
        $limit = 20;
        $page = $request->get('page', 1);
        $buy_service = new BuyService();
        $order = $buy_service->getList([], $page, $limit);
        return view('admin.order-list', [
            'order' => $order,
            'tab' => $this->tab,
        ]);
    }

    public function action($id, $action)
    {
        $buy_service = new BuyService();
        if ($action == 'delete') {
            $buy_service->delete($id);
        } elseif ($action == 'sending') {
            $buy_service->send($id);
        } elseif ($action == 'complete') {
            $buy_service->complete($id);
        } else {
            return response(['status' => 'error', 'msg' => '行为错误']);
        }
        return response(['status' => 'ok', 'msg' => '操作成功']);

    }
}
