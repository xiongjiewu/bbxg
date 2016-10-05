<?php namespace App\Service;

use App\Model\Buy;
use App\Service\ClassificationService;
use App\Service\GoodService;
use App\Model\Size;
use App\Model\Production;

class BuyService
{
    public function store($data = [])
    {
        $buy = new Buy();
        foreach($data as $key => $value) {
            $buy->$key = $value;
        }
        $buy->status = 1;
        $buy->save();
        return $buy->id;
    }

    public function getList($where = [], $page = 1, $limit = 20)
    {
        $where['status'] = Buy::STATUS_INIT;
        $offset = ($page - 1) * $limit;
        $list = Buy::query()
            ->where($where)
            ->offset($offset)
            ->limit($limit)
            ->get()
            ->toArray();
        $classification_service = new ClassificationService();
        $good_service = new GoodService();
        foreach($list as &$order) {
            $order['good'] = $good_service->show($order['good_id']);
            $order['classification'] = $classification_service->show($order['good']['classification_id']);
            $order['production'] = Production::query()
                ->find($order['production_id'])
                ->toArray();
            $order['size'] = Size::query()
                ->find($order['size_id'])
                ->toArray();
        }
        return $list;
    }

    public function delete($id)
    {
        return Buy::query()
            ->where('id', $id)
            ->update(['status' => Buy::STATUS_DELETE]);
    }

    public function send($id)
    {
        return Buy::query()
            ->where('id', $id)
            ->update(['status' => Buy::STATUS_SEND]);
    }

    public function complete($id)
    {
        return Buy::query()
            ->where('id', $id)
            ->update(['status' => Buy::STATUS_COMPLETE]);

    }

}
