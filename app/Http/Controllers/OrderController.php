<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\GoodService;
use App\Service\ClassificationService;
use App\Service\BuyService;

class OrderController extends Controller
{
    private $tab;

    private $limit = 20;

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
        $page = $request->get('page', 1);
        $buy_service = new BuyService();
        $order = $buy_service->getList([], $page, $this->limit);
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

    public function export(Request $request)
    {
        $page = $request->get('page', 1);
        $buy_service = new BuyService();
        $order = $buy_service->getList([], $page, $this->limit);
        $excel_data = [];
        $excel_data[] = [
            '商品ID',
            '客户名字',
            '手机号码',
            '收货地址',
            '商品ID',
            '分类',
            '留言',
        ];
        foreach($order as $value) {
            $excel_data[] = [
                $value['id'],
                $value['user_name'],
                $value['phone'],
                $value['address'],
                $value['good_id'],
                $value['classification']['name'],
                $value['feedback'],
            ];
        }
		$a = \Excel::create('订单报表', function ($excel) use ($excel_data) {
            $excel->setTitle('订单报表');
            $excel->setCreator('百宝星阁')->setCompany('百宝星阁');
            $excel->setDescription('百宝星阁订单报表');
            $excel->sheet('订单报表', function ($sheet) use ($excel_data) {
                $sheet->fromArray($excel_data, null, 'A1', false, false);
            });
        });
        $a->download('xls');
    }
}
