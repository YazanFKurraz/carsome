<?php

use App\Models\Language;
use Illuminate\Support\Facades\Config;

define('PAGINATION_COUNT', 10);


function uploadImage($folder, $image)
{
    $image->store('/', $folder);
    $filename = $image->hashName();
    $path = 'images/' . $folder . '/' . $filename;
    return $path;
}

function getPhotoAdmin(){
    return auth('admin')->user()->photo;
}

// function generateCategoryLists($elements, $count)
//{
//
//    foreach ($elements as $element) {
//        $space = "";
//        $style = "";
//        $temp = $count;
//        while ($temp){
//            $space.= "&nbsp&nbsp&nbsp&nbsp";
//            $style.="*";
//            $temp--;
//        }
//        echo '<option value="'. $element->id .'">' . $element->name . $style . $space .'</option>';
//        if(isset($element->manyChild)){
//            if(count($element->manyChild) >= 0)
//                generateCategoryLists($element->manyChild, $count +1);
//        }
//    }
//}
