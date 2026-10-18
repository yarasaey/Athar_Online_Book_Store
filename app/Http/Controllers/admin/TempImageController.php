<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TempImage;
use Image;


class TempImageController extends Controller
{
    public function create(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $newName = time() . '.' . $ext;

            $tempImage = new TempImage();
            $tempImage->name = $newName;
            $tempImage->save();

            $image->move(public_path('/temp'), $newName);

            $sourcePath = public_path('/temp/' . $newName);
            $destPath = public_path('/temp/thumb/' . $newName);
           // $img = \Image::make($sourcePath)->fit(300, 275);
           // $img->save($destPath);

            return response()->json([
                'status' => true,
                'image_id' => $tempImage->id,
                'ImagePath' => asset('/temp/thumb/' . $newName),
                'message' => 'Image uploaded successfully'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'No image uploaded'
        ], 422);
    }
   
}
