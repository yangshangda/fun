<?php


   
    // public function uploadThumb(){
    //    // echo 'aaa';die;
    //     //准备上传目录
    //     //$file['temp'] = 'http://localhost/Fun1/Public/upload/temp/';
    //     $file['temp'] = './Public/upload/temp/';
    //     file_exists($file['temp']) or mkdir($file['temp'],0777,true);
    //     //上传文件
    //     $Upload = new \Think\Upload(array(
    //         'exts' => array('jpg'),
    //         'rootPath' => $file['temp'],
    //         'autoSub' => false,
    //     ));
    //     $rst = $Upload->upload();
    //     echo json_encode($rst);die;
    //     if($rst===false){
    //         return $Upload->getError();
    //     }
    //     //生成文件信息
    //     $file['name'] = $rst['thumb']['savename'];
    //     $file['save'] = date('Y-m/d/');
    //     //$file['path1'] = 'http://localhost/Fun1/Public/upload/'.$file['save'];
    //     $file['path1'] = './Public/upload/'.$file['save'];
    //     $file['path2'] = './Public/upload/thumb/'.$file['save'];
    //     //$file['path2'] = 'http://localhost/Fun1/Public/upload/thumb/'.$file['save'];
    //     //创建保存目录
    //     file_exists($file['path1']) or mkdir($file['path1'],0777,true);
    //     file_exists($file['path2']) or mkdir($file['path2'],0777,true);
    //     //生成缩略图
    //     $Image = new \Think\Image(); 
    //     $Image->open($file['temp'].$file['name']);
    //     $Image->thumb(350,300,2)->save($file['path1'].$file['name']);//大图
    //     $Image->open($file['temp'].$file['name']);
    //     $Image->thumb(176,120,2)->save($file['path2'].$file['name']);//小图
    //     //删除临时文件
    //     unlink($file['temp'].$file['name']);
    //     //删除原来的图片文件
    //     //$this->delImage($gid);
    //     //保存缩略图
    //     // $this->where("gid=$gid")->save(array(
    //     //     'thumb'=> $file['save'].$file['name'],
    //     // ));
    //     $thumb= $file['save'].$file['name'];
    //     echo json_encode($thumb);
    // }


    /* 获取文件后缀 */
    function getExt($url)
    {
        $extension = pathinfo($url, PATHINFO_EXTENSION);
        $extension_arr = explode('?', $extension);
        $ext = array_shift($extension_arr);
        return $ext;
    }


	/**
     * 通用返回
     */
    function response($rst, $msg = '')
    {
        $msg_str = $rst ? '操作成功' : '操作失败';
        if ($msg) $msg_str = $msg;
        if ($rst) {
            echo json_encode(['code' => 1, 'message' => $msg_str]);
        } else {
            echo json_encode(['code' => -1, 'message' => $msg_str]);
        }
    }
    /**
     * 图片上传
     * @return string 图片的地址
     */
     function uploadImg($id,$im,$type) {

        $save_path = '../Public/upload/temp/'.date('Y-m/d/');
        file_exists($save_path) or mkdir($save_path,0777,true);

        $savename = $id.'_'.time().mt_rand(1000000,9999999).'.'.$type;
        $savefile = $save_path.$savename;
        imagejpeg($im, $savefile);
        imagedestroy($im);
        return 'http://localhost/Fun1/Public/upload/temp/'.date('Y-m/d/').$savename;

    }

    function getBoxWidth($font_size,$font,$text){
        $box = imagettfbbox($font_size, 0, $font, $text);
        return $box[2] - $box[0];
    }

    function getBoxLeft($font_size, $font_family, $content) {
    $box = imagettfbbox($font_size, 0, $font_family, $content);
    $width = $box[2] - $box[0];
    return $width;
}

    
    // /**
    //  * 音频上传接口
    //  * @return json 音频地址
    //  */
    // public function uploadAudio() {
    // 	$app = I('app');
    //     // 调用文件上传接口
    //     $tempFile = $_FILES['upload']['tmp_name'];
    //     $filename = $_FILES['upload']['name'];
    //     $offset = strrpos($filename, '.');
    //     $ext = substr($filename, $offset);
    //     $newTempFile = $_FILES['upload']['tmp_name'] . $ext;
    //     //var_dump($tempFile);
    //     move_uploaded_file($tempFile, $newTempFile);
    //     $rst = $this->upload('audio', $newTempFile, $app);
    //         // echo $rst;die;
    //         if ($rst) {
    //             $this->response($rst, $rst);
    //         } else {
    //             $this->response(0, $rst);
    //         }
    //     // }
    // }

    // /**
    //  * 视频上传
    //  * @return string 视频地址
    //  */
    // public function uploadVideo() {
    // 	$app = I('app');
    //     // 调用文件上传接口
    //     $tempFile = $_FILES['upload']['tmp_name'];
    //     $filename = $_FILES['upload']['name'];
    //     $offset = strrpos($filename, '.');
    //     $ext = substr($filename, $offset);
    //     $newTempFile = $_FILES['upload']['tmp_name'] . $ext;
    //     //var_dump($tempFile);
    //     move_uploaded_file($tempFile, $newTempFile);
    //     $rst = $this->upload('video', $newTempFile, $app);
    //     // var_dump($rst);
    //     if ($rst) {
    //         $this->response($rst, $rst);
    //     } else {
    //         $this->response(0);
    //     }
    // }

    // /**
    //  * 文件上传
    //  * @return string 地址
    //  */
    // public function uploadFile() {
    //     $app = I('app');
    //     // 调用文件上传接口
    //     $tempFile = $_FILES['upload']['tmp_name'];
    //     $filename = $_FILES['upload']['name'];
    //     $offset = strrpos($filename, '.');
    //     $ext = substr($filename, $offset);
    //     $newTempFile = $_FILES['upload']['tmp_name'] . $ext;
    //     //var_dump($tempFile);
    //     move_uploaded_file($tempFile, $newTempFile);
    //     $rst = $this->upload('file', $newTempFile, $app);
    //     if ($rst) {
    //         $this->response($rst, $rst);
    //     } else {
    //         $this->response(0);
    //     }
    // }

    // /**
    //  * 文件上传
    //  * @return string 地址
    //  */
    // public function uploadFile2($app) {
    //     // 调用文件上传接口
    //     $tempFile = $_FILES['upload']['tmp_name'];
    //     $filename = $_FILES['upload']['name'];
    //     $offset = strrpos($filename, '.');
    //     $ext = substr($filename, $offset);
    //     $newTempFile = $_FILES['upload']['tmp_name'] . $ext;
    //     //var_dump($tempFile);
    //     move_uploaded_file($tempFile, $newTempFile);
    //     $rst = $this->upload('file', $newTempFile, $app);
    //     return $rst;
    // }

    // /**
    //  * 文件上传
    //  * @return string 地址
    //  */
    // public function uploadFileForBiu() {
    //     $app = I('app');
    //     // 调用文件上传接口
    //     $tempFile = $_FILES['upload']['tmp_name'];
    //     $filename = $_FILES['upload']['name'];

    //     $offset = strrpos($filename, '.');
    //     $ext = substr($filename, $offset);
    //     $newTempFile = $_FILES['upload']['tmp_name'] . $ext;
    //     //var_dump($tempFile);
    //     move_uploaded_file($tempFile, $newTempFile);
    //     $rst = $this->upload('file', $newTempFile, $app);
    //     if ($rst) {
    //         $url = $rst['url'];
    //         $size = round($_FILES['upload']['size']/1024);
    //         $ret = ['url' => $url, 'size' => $size];
    //         $this->response(1, '上传成功', $ret);
    //     } else {
    //         $this->response(0);
    //     }
    // }

    // public function fileUpload(){

    //     $this->title = 'FileTools';
    //     $this->sub_title = 'fileUpload';
    //     $this->display('fileUpload');
    // } 


