<?php

function get_user($id) {
	
	    $user = App\Models\User::find($id);

	    if(!$user) {
		   return '';
	    }

	    return $user;
}

function resize_image($image,$name){

	    Intervention\Image\Facades\Image::class;
	    Intervention\Image\ImageServiceProvider::class;
	
	    $destinationPath = 'public/assets/uploads/t';
        $img = Image::make($image->path());
        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$name);
        
		
		$destinationPath = 'public/assets/uploads/b';
        $img = Image::make($image->path());
        $img->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$name);
   
		$destinationPath = 'public/assets/uploads/m';
        $img = Image::make($image->path());
        $img->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$name);
	
}
function unlink_image($image){
	
	    unlink("public/assets/uploads/t/".$image);
	    unlink("public/assets/uploads/o/".$image);
		unlink("public/assets/uploads/b/".$image);
		unlink("public/assets/uploads/m/".$image);
}





