<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UploadsManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
class UploadController extends Controller
{
    protected $manager ;

    public function __construct(UploadsManager $manager)
    {
        $this->manager = $manager;
    }
    /**
     *  上传管理页面
     */
    public function index(Request $request)
    {
        $this->checkAuth();
        $folder = $request->get('folder');
        $data = $this->manager->folderInfo($folder);
        //dd(config('blog.webpath'));
        return view('admin.upload',$data);
    }

    // 添加如下四个方法到UploadController控制器类
    /**
     * 创建新目录
     */
    public function createFolder(Requests\UploadNewFolderRequest $request)
    {
        $this->checkAuth();
        $new_folder = $request->get('new_folder');
        $folder = $request->get('folder').'/'.$new_folder;

        $result = $this->manager->createDirectory($folder);

        if ($result === true) {
            return redirect()
                ->back()
                ->withSuccess("Folder '$new_folder' created.");
        }

        $error = $result ? : "An error occurred creating directory.";
        return redirect()
            ->back()
            ->withErrors([$error]);
    }

    /**
     * 删除文件
     */
    public function deleteFile(Request $request)
    {
        $this->checkAuth();
        $del_file = $request->get('del_file');
        $path = $request->get('folder').'/'.$del_file;

        $result = $this->manager->deleteFile($path);

        if ($result === true) {
            return redirect()
                ->back()
                ->withSuccess("File '$del_file' deleted.");
        }

        $error = $result ? : "An error occurred deleting file.";
        return redirect()
            ->back()
            ->withErrors([$error]);
    }

    /**
     * 删除目录
     */
    public function deleteFolder(Request $request)
    {
        $this->checkAuth();
        $del_folder = $request->get('del_folder');
        $folder = $request->get('folder').'/'.$del_folder;

        $result = $this->manager->deleteDirectory($folder);

        if ($result === true) {
            return redirect()
                ->back()
                ->withSuccess("Folder '$del_folder' deleted.");
        }

        $error = $result ? : "An error occurred deleting directory.";
        return redirect()
            ->back()
            ->withErrors([$error]);
    }

    /**
     * 上传文件
     */
    public function uploadFile(Requests\UploadFileRequest $request)
    {
        $this->checkAuth();
        $file = $_FILES['file'];
        $fileName = $request->get('file_name');
        $fileName = $fileName ?: $file['name'];
        $path = str_finish($request->get('folder'), '/') . $fileName;
        $content = File::get($file['tmp_name']);

        $result = $this->manager->saveFile($path, $content);

        if ($result === true) {
            return redirect()
                ->back()
                ->withSuccess("File '$fileName' uploaded.");
        }

        $error = $result ? : "An error occurred uploading file.";
        return redirect()
            ->back()
            ->withErrors([$error]);
    }

    public function uploadImage(Request $request)
    {
        $this->checkAuth();
        if (isset($_FILES['editormd-image-file'])){
            $file = $_FILES['editormd-image-file'];
        }
        if(isset($_FILES['imageUpload'])){
            $file = $_FILES['imageUpload'];
        }
        $fileName = $request->get('file_name');
        $fileName = $fileName ?: $file['name'];
        $fileExt = pathinfo($fileName,PATHINFO_EXTENSION);
        //生成文件名
        $fileName = $this->makeFileName() .'.'. $fileExt;
        $path = str_finish('image', '/') . $fileName;

        $content = File::get($file['tmp_name']);
        $uploadResult = $this->manager->saveFile($path, $content) ;
        $completeUrl = $this->manager->fileWebpath($path) ;

        if ($this->createThumbnail($path,array('width'=>100,'height'=>100),0) === false){
            $uploadResult = false;
        }

        if ($uploadResult === true)
        {
            $result = array('success'   =>  1,
                            'message'   => 'Upload Successed!',
                            'url'       => $completeUrl,
                            'webkitRelativePath'    =>$completeUrl,
                            );
        }else{
            $result = array('success'   =>  0,
                            'message'   =>"An error occurred uploading file."
                            );
        }
        return json_encode($result);

    }

    private function checkAuth()
    {
        if(Auth::check() == false)
        {
            abort(404);
        }

    }

    /*
     * 生成文件名
     */
    private function makeFileName()
    {
        $name = 'img'.time().random_int(1000,9999);
        return $name;
    }

    /*
     * 生成缩略图
     *  $path = string                          原图路径
     *  $spec = array('width','height')         缩略图规格
     *  $func = int                             方法 0-crop, 1-resize
     */
    private function createThumbnail($path,$spec,$func)
    {
        $fileInfo = pathinfo($path);
        $img = Image::make('uploads/'.$path);
        if($spec['width'] > $img->width() || $spec['height'] > $img->height()){
            return false;
        }
        $img->sharpen(15);
        //算出长短边倍数,并标记哪边短

        if($img->width() < $img->height()){
            //$sourceImg['whichMin'] = 'width';
            $sourceImg['min'] = $img->width();
            $sourceImg['max'] = $img->height();
        }else{
            //$sourceImg['whichMin'] = 'height';
            $sourceImg['min'] = $img->height();
            $sourceImg['max'] = $img->width();
        }
        $imgMultiple = $sourceImg['max'] / $sourceImg['min'];
        //根据要求缩略图规格,算出目标图片尺寸
        if($spec['width'] <= $spec['height']){
            $targetImg['width'] = $spec['width'];
            $targetImg['height'] = round($targetImg['width'] * $imgMultiple);
            $imgX = 0;
            $imgY = round($targetImg['height']/2 - $spec['height']/2);

        }else{
            $targetImg['height'] = $spec['height'];
            $targetImg['width'] = round($targetImg['height'] * $imgMultiple);
            $imgY = 0;
            $imgX = round($targetImg['width']/2 - $spec['width']/2);
        }
        //dd(compact('targetImg','imgX','imgY'));
        $img->resize($targetImg['width'],$targetImg['height']);
//        $imgX = round($img->width()/2-$spec['width']/2);
//        $imgY = round($img->height()/2+$spec['height']/2);
        $img->crop($spec['width'],$spec['height'],$imgX,$imgY);

//
//        switch($func)
//        {
//            case 0:
//                $imgX = round($img->width()/2-$spec['width']/2);
//                $imgY = round($img->height()/2+$spec['height']/2);
//                $img->crop($spec['width'],$spec['height'],$imgX,$imgY);
//            case 1:
//                $img->resize($spec['width'],$spec['height']);
//        }
        $baseName = str_replace('.'.$fileInfo['extension'],'',$fileInfo['basename']);
        $baseName = $baseName . '_' . $spec['width'] . 'x' . $spec['height'] . '.';
        $img->save('uploads/'.$fileInfo['dirname'].'/'. $baseName . $fileInfo['extension']);

        return true;
    }
}
