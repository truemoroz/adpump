<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{
    public function create()
    {
        $cities = [
            ['id' => 1, 'name' => 'Россия', 'children' => [
                ['id' => 2, 'name' => 'Центр', 'children' => [
                    ['id' => 3, 'name' => 'Московская область', 'children' => [
                      ['id' => 6, 'name' => 'Долгопрудный'],
                      ['id' => 7, 'name' => 'Дубна']
                        ]],
                    ['id' => 4, 'name' => 'Белгородская область']
                ]],
                ['id' => 5, 'name' => 'Северо-Запад']
            ]]
        ];


        City::buildTree($cities);
    }

    public function getAll($depth = 0)
    {

        if($depth == 0) {
            $node = City::all();
            dump($node->toArray());
        } else {
            $root = City::root();
            dump($root->descendants()->limitDepth($depth)->get()->toArray());
        }
    }

    public function children($parentId)
    {
        $parent = City::where('id', '=', $parentId)->first();
        dump($parent->descendants()->get()->toArray());
    }
}
