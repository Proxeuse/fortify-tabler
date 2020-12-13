<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    /**
     * Display the Edit Profile page
     * 
     * @return \Illuminate\View\View
     */
    public function editProfile(){
        $devices = \DB::table('sessions')->where('user_id', \Auth::user()->id)->get()->reverse();
        return view('profile.edit', ['devices' => $devices]);
    }

    /**
     * Update the Avatar
     * 
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateAvatar(Request $request){
        // validate
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048|dimensions:min_width=200,min_height=200',
        ]);

        // remove old avatar from storage
        $this->removeOldAvatar(true);

        // process avatar and redirect back
        if($this->processAvatar($request)) {
            return \Redirect::back()->with('success', 'Updated the avatar successfully!');
        } else {
            return \Redirect::back()->withErrors(['avatar', 'Failed to update the avatar']);
        }
    }

    /**
     * Process the resize and storage of the image
     * 
     * @param $request
     * @return boolean
     */
    private function processAvatar($request){
        // get file
        $file = $request->file('avatar');
        // get filename name with extension
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        // remove unwanted characters
        $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
        $filename = preg_replace("/\s+/", '-', $filename);
        // create unique file name
        $uniqueFileName = substr(md5($filename), 0, 15).'_'.time().'.'.$file->getClientOriginalExtension();

        // resize avatar
        $resize = Image::make($file)->fit(400, null, function($constraint){
            $constraint->upsize();
        })->encode('png');
        // save avatar to public storage
        $save = \Storage::put("public/avatars/{$uniqueFileName}", $resize->__toString());

        // if avatar has been stored successfully
        if($save){
            // update user table
            $user = \Auth::user();
            $user->avatar = $uniqueFileName;
            $user->save();
            // return success
            return true;
        } else {
            return false;
        }
    }

    /**
     * Remove avatar currently in use
     * 
     * @param $internalRequest
     * @return boolean
     * @return \Illuminate\Http\Response
     */
    public function removeOldAvatar($internalRequest = false){
        $user = \Auth::user();
        // if user has an avatar currently in use
        if($user->avatar){
            // delete avatar from storage
            \Storage::delete('public/avatars/'.$user->avatar);
        }
        $user->avatar = null;
        $user->save();
        
        // if request comes from front-end 
        if($internalRequest){
            return true;
        } else {
            return \Redirect::back()->with('success', 'The avatar has been deleted successfully!');
        }
    }

    /**
     * Remove unused device
     * 
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function removeDevice(Request $request, $id){
        $delete = \DB::table('sessions')->where('id', $id)->delete();
        return \Redirect::back()->with('success', 'The device has been deleted successfully!');
    }
}
