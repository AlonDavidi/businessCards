<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Generator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EntitiesController extends Controller
{
    public function index()
    {
        return response(User::all()->jsonSerialize(), Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $entity = new User();
        $this->setParams($entity, $data);
        $entity->save();

        return response($entity->jsonSerialize(), Response::HTTP_CREATED);
    }

    private function setParams($entity, $data)
    {
        /** @var $entity User */
        $entity->setAttribute('name',$data['name']);
        $entity->setAttribute('role',$data['role']);
        $entity->setAttribute('state',$data['state']);
        $entity->setAttribute('street',$data['street']);
        $entity->setAttribute('country',$data['country']);
        $entity->setAttribute('phone',$data['phone']);
        $entity->setAttribute('image','john-smith');
    }

    public function fetch($id)
    {
        $entity = User::query()->findOrFail($id);
        return response($entity->jsonSerialize(), Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $data = json_decode($request->getContent(), true);
        $entity = User::query()->findOrFail($id);
        $this->setParams($entity, $data);
        $entity->save();

        return response($entity->jsonSerialize(), Response::HTTP_OK);
    }

    public function destroy($id)
    {
        User::destroy($id);

        return response(null, Response::HTTP_OK);
    }

}
