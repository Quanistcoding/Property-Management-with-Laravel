<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FeatureImage;
use Illuminate\Http\Request;

class FeatureImageController extends Controller {
    public function index() {
        $images = FeatureImage::all()[0];

        return view('admin.feature_images', compact('images'));
    }

    public function save(Request $request) {
        $images1 = $request->file('imageUrl1');
        $images2 = $request->file('imageUrl2');
        $images3 = $request->file('imageUrl3');

        if ($images1 != null) {
            $name = hexdec(uniqid()) . '.' . $images1->getClientOriginalExtension();
            $save_url = 'upload/featureImages/' . $name;
            $images1->move('upload/featureImages/', $name);
            FeatureImage::findOrFail(1)->update([
                'imageUrl1' => $save_url
            ]);
        }

        if ($images2 != null) {
            $name = hexdec(uniqid()) . '.' . $images2->getClientOriginalExtension();
            $save_url = 'upload/featureImages/' . $name;
            $images2->move('upload/featureImages/', $name);

            FeatureImage::findOrFail(1)->update([
                'imageUrl2' => $save_url
            ]);
        }

        if ($images3 != null) {
            $name = hexdec(uniqid()) . '.' . $images3->getClientOriginalExtension();
            $save_url = 'upload/featureImages/' . $name;
            $images3->move('upload/featureImages/', $name);
            FeatureImage::findOrFail(1)->update([
                'imageUrl3' => $save_url
            ]);
        }

        $notification = array(
            'message' => 'Images updeted.',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.feature_images.index')->with($notification);
    }
}
