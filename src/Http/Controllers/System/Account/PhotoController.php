<?php

namespace Novay\CMS\Http\Controllers\System\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use ProtoneMedia\Splade\Facades\Splade;

class PhotoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasFile('photo')):
            if(!is_null($request->user()->photo))
                DeleteCDN($request->user()->photo);

            $request->user()->update([
                'photo' => UploadCDN(
                    file: $request->photo, 
                    path: 'kukarkab/kerjasama/website/users', 
                    filename: str()->slug($request->name).'-'.uniqid()
                )
            ]);
        endif;

        Splade::toast("Photo updated successfully.");
        return redirect()->back();
    }
}