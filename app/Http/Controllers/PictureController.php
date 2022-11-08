<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PHPUnit\Util\Xml\Validator;


class PictureController extends Controller
{
    public function store(): JsonResponse
    {
        $picture = request()->validate([
           'owner_id' => 'required',
            'ad_id' => 'required',
            'title' => 'required',
            'path' => 'required',
            'ad_name' => 'required',
        ]);

        if(!str_contains($picture['path'], './public/images/')){
            $picture['path'] = './public/images/'.$picture['path'];
        }

        Picture::create($picture);

        return $this->respondSuccess($picture, 201);

//      -----------------------------------------------------------------------------------------
//         Da li je ovo ideja?
//          -Metoda make ne postoji u Validatoru
//          -Nepoznata varijabla $request
//          -Sta je file? (Pretpostavljam da je neki file(slika) koja se uploaduje)
//          -Kako prilagoditi to mojoj bazi
//          -Metoda fails() ne postoji
//          -Nemam klasu File, gde je napraviti, od cega se sastoji?
//
//        $validator = Validator::make($request->all(),[
//            'file' => 'required|mimes:doc,docx,pdf,txt,csv|max:2048',
//        ]);
//
//        if($validator->fails()) {
//
//            return response()->json(['error'=>$validator->errors()], 401);
//        }
//
//
//        if ($file = $request->file('file')) {
//            $path = $file->store('public/files');
//            $name = $file->getClientOriginalName();
//
//            //store your file into directory and db
//            $save = new File();
//            $save->name = $file;
//            $save->store_path= $path;
//            $save->save();
//
//            return response()->json([
//                "success" => true,
//                "message" => "File successfully uploaded",
//                "file" => $file
//            ]);
//
//        }
//      ------------------------------------------------------------------

    }

    public function update(Picture $picture)
    {
        $data = request()->validate([
            'owner_id' => [Rule::exists('users', 'id')],
            'ad_id' => [Rule::exists('ads', 'id')],
            'title' => 'required',
            'path' => 'required',
            'ad_name' => [Rule::exists('ads', 'title')]
        ]);

        if(!str_contains($data['path'], './public/images/')){
            $data['path'] = './public/images/'.$data['path'];
        }

        $picture->update($data);

        return $this->respondSuccess($picture, 200);
    }

    public function destroy(Picture $picture): JsonResponse
    {
        $picture->delete();

        return $this->respondSuccess(null, 204);
    }
}
