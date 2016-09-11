<?php namespace App\Service;

use App\Model\Good;
use App\Model\Size;
use App\Model\Production;
use App\Model\GoodView;

class GoodService
{

    public function getList($where = [], $page = 1, $limit = 20)
    {
        $offest = ($page - 1) * $limit;
        $query = Good::query()
            ->sell();
        if ($where) {
            $query = $query->where($where);
        }
        return $query->offset($offest)
            ->limit($limit)
            ->orderBy('id', 'desc')
            ->get()
            ->toArray();
    }

    public function getTotal($where = [])
    {
        if ($where) {
            return Good::query()
                ->where($where)
                ->sell()
                ->count();
        }
        return Good::query()->sell()->count();
    }


    public function show($id)
    {
        $good = Good::query()->find($id)->toArray();
        $good['size'] = Size::query()
            ->where('good_id', $id)
            ->use()
            ->get()
            ->toArray();
        $good['production'] = Production::query()
            ->where('good_id', $id)
            ->use()
            ->get()
            ->toArray();
        return $good;
    }


    public function down($id)
    {
        return Good::query()
            ->where('id', $id)
            ->update(['status' => Good::STATUS_DOWN]);
    }

    public function store($data = [])
    {
        return $this->process(new Good(), $data);
    }

    public function edit($id, $data = [])
    {
        $good = Good::query()
            ->find($id);
        Production::query()
            ->where('good_id', $id)
            ->update(['status' => Production::STATUS_DELETE]);
        Size::query()
            ->where('good_id', $id)
            ->update(['status' => Size::STATUS_DELETE]);
        return $this->process($good, $data);

    }

    private function process($good, $data =[])
    {
        $good->name = $data['name'];
        $good->surface = $data['surface'];
        $good->classification_id = $data['classification_id'];
        $good->desc = $data['desc'];
        $good->status = Good::STATUS_SELL;
        if ($good->save()) {
            $production = explode("\n", $data['production']);
            foreach($production as $p) {
                $production_model = new Production();
                $production_model->good_id = $good->id;
                $production_model->desc = $p;
                $production_model->status = Production::STATUS_USE;
                $production_model->save();
            }
            $size = explode("\n", $data['size']);
            foreach($size as $s) {
                $size_model = new Size();
                $size_model->good_id = $good->id;
                $size_model->desc = $s;
                $size_model->status = Size::STATUS_USE;
                $size_model->save();
            }
        }
        return false;
    }


    public function showViewCount($good_id)
    {
        return GoodView::query()
            ->where('good_id', $good_id)
            ->count();
    }

    public function storeView($good_id, $ip)
    {
        $view = new GoodView();
        $view->good_id = $good_id;
        $view->ip = $ip;
        return $view->save();
    }
}
