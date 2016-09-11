<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\GoodService;
use App\Service\ClassificationService;
use App\Service\BuyService;

class ClassificationController extends Controller
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
        $this->tab = 3;
    }

    public function index(Request $request)
    {
        $classification_service = new ClassificationService();
        $classification = $classification_service->getAll();
        return view('admin.classification-list', [
            'classification' => $classification,
            'tab' => $this->tab,
        ]);
    }

    public function add(Request $request)
    {
        $classification_id = $request->get('classification_id');
        $classification = [];
        if ($classification_id) {
            $classification_service = new ClassificationService();
            try {
                $classification = $classification_service->show($classification_id);
            } catch(\Exception $e) {

            }
        }
        return view('admin.classification-add', [
            'classification' => $classification,
            'tab' => $this->tab,
        ]);
    }

    public function addAction(Request $request)
    {
        $classification_id = $request->get('classification_id');
        $name = $request->get('name');
        if (!$name) {
            return response(['status' => 'error', 'msg' => '名称不能为空']);
        }
        $classification_service = new ClassificationService();
        if ($classification_id) {
            $classification_service->edit($classification_id, ['name' => $name]);
        } else {
            $classification_service->store( ['name' => $name]);
        }
        return response(['status' => 'ok', 'msg' => '操作成功']);
    }
}
