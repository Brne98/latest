<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class FileController extends Controller
{
    public function uploadFile(Request $request): JsonResponse
    {
        $destinationFolder = 'public/files/temporary';

        if (!Storage::exists($destinationFolder)) {
            Storage::makeDirectory($destinationFolder);
        }

        $file = $request->file('file');
        $type = $file->getClientMimeType();
        $fileName = $file->getClientOriginalName();

        if ($type === 'application/pdf')
        {
            Storage::putFileAs('app/'.$destinationFolder, $file, $fileName);
        } else {
            $image = Image::make($file)
                ->resize(3840, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save(storage_path('app/public/images/'.$fileName));

            $thumbnail = Image::make($file)
                ->resize(240, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $thumbnail->save(storage_path('app/public/images/thumbnails/thumbnail_'.$fileName));
        }

        return $this->respondSuccess($fileName);
    }

    public function removeFile($name): JsonResponse
    {
        Storage::disk('public')->delete('images/'.$name);
        return $this->respondSuccess($name);
    }

    public function downloadFile($name)
    {
        $response = new BinaryFileResponse(storage_path('app/public/images/thumbnails/'.$name));
        return $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, $name);
    }
}
