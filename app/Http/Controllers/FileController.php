<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Image;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class FileController extends Controller
{
    public function uploadFile(Request $request): JsonResponse
    {
        if (!Storage::exists('public/images')) {
            Storage::makeDirectory('public/images/thumbnails');
        }

        $file = $request->file('file');
        $type = $file->getClientMimeType();
        $fileName = $file->getClientOriginalName();

        if ($type === 'application/pdf')
        {
            Storage::putFileAs('app/public/images/thumbnails', $file, $fileName);
        } else {
            $image = Image::make($file)->resize(3840);
            $image->save(storage_path('app/public/images/thumbnails'.$fileName));
        }

        return $this->respondSuccess($fileName);
    }

    public function removeTemporaryFile(Request $request): JsonResponse
    {
        $fileName = $request->get('name');
        Storage::disk('public')->delete('files/temporary/'.$fileName);
        return $this->respondSuccess($fileName);
    }

    public function removeFile($name): JsonResponse
    {
        Storage::disk('public')->delete('files/'.$name);
        return $this->respondSuccess($name);
    }

    public function downloadFile($name)
    {
        $response = new BinaryFileResponse(storage_path('app/public/files/'.$name));
        return $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, $name);
    }
}
