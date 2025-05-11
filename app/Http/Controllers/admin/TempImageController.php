<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TempImage;
use Image;


class TempImageController extends Controller{
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
        $img = \Image::make($sourcePath)->fit(300, 275);
        $img->save($destPath);

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
//   public function create(Request $request){
//     $image = $request->image;
//     if(!empty($image)){
//         $ext = $image->getClientOriginalExtension();
//         $newName = time() . '.' . $ext;

//         $tempImage = new TempImage();
//         $tempImage->name = $newName;
//         $tempImage->save();

//         $image->move(public_path('/temp/'), $newName);

//         $sourcePath = public_path('/temp/' . $newName);
//         $destPath = public_path('/temp/thumb/' . $newName);
//         $img = Image::make($sourcePath)->fit(300, 275);
//         $img->save($destPath);

//         return response()->json([
//             'status' => true,
//             'image_id' => $tempImage->id,
//             'ImagePath' => asset('/temp/thumb/' . $newName),
//             'message' => 'Image uploaded successfully'
//         ]);
//     }
// }

// public function create(Request $request){
//     //هنا بنستقبل الصورة اللي جت من الطلب (سواء من الفورم أو من Dropzon
//     $image = $request->image;

//         if (!empty($image)) {
//             $ext = $image->getClientOriginalExtension();
//             $newName = time() . '.' . $ext;
       
//      //time() بترجع الوقت الحالي بالثواني
//       $tempImage=new TempImage();
//      $tempImage->name=$newName;
//      $tempImage->save();
//       $image->move(public_path().'/temp',$newName);
//       //Generate thumbnail
//       $sourcePath=public_path().'/temp'.$newName;
//       $destPath=public_path().'/temp/thumb/'.$newName;
//       $image =Image::make($sourcePath);
//       $image->fit(300,275);
//       $image->save( $destPath);

//       return response()->json([
//         'status'=>true,
//         'image_id'=>$tempImage->id,
//         'ImagePath'=>asset('/temp/thumb/'.$newName),
//         'message'=>'Image Uploaded successfuly'
//       ]);
     
    

//       }
// }
    
}
