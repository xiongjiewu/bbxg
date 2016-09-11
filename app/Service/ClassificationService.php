<?php namespace App\Service;

use App\Model\Classification;

class ClassificationService
{
    public function getAll()
    {
        return Classification::query()
            ->use()
            ->get()
            ->toArray();
    }

    public function show($id)
    {
        return Classification::query()
            ->find($id)
            ->toArray();
    }

    public function store($data = [])
    {
        $classification = new Classification();
        foreach($data as $key => $value) {
            $classification->$key = $value;
        }
        $classification->status = Classification::STATUS_USE;
        return $classification->save();
    }

    public function edit($id, $data = [])
    {
        $classification = Classification::query()
            ->find($id);
        foreach($data as $key => $value) {
            $classification->$key = $value;
        }
        $classification->status = Classification::STATUS_USE;
        return $classification->save();

    }
}
