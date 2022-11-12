<?PHP
namespace App\Traits;


Trait ImageTrait{


    protected function saveImage($image,$folder){
        $fileExtention = $image->extension();
        $fileName = time().'.'.$fileExtention;
        $path = $folder;
        $image ->move($path,$fileName);
        return $fileName;
    }
}
