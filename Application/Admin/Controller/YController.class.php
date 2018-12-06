<?php 
namespace Admin\Controller;
use Think\Controller;
class YController extends Controller{

	public function delete(){
		$ydianyin_music = M('ydianyin_music');
		$ydianyin_music->where(1==1)->delete();
		echo 'ok';die;
	}
	public function state(){
		$ydianyin_music = M('ydianyin_music');
		$data['state'] = 1;
		$ydianyin_music->where(1==1)->save($data);
		echo 'ok';die;
	}
	public function changeState(){
		$ydianyin_music = M('ydianyin_music');
		$where['cdnurl'] = '';
		$data['state'] = 0;
		$ydianyin_music->where($where)->save($data);
		echo 'ok';die;
	}

//http://localhost/Fun/Admin/Y/lsddGrap
public function lsddGrap(){

        // $types = [
        //     0 => '最新铃声',
        //     1 => '最热铃声',
        //     3 => '影视广告',
        //     4 => '动漫游戏',
        //     5 => '短信通知',
        //     7 => '搞笑类别',
        //     22 => '最多下载',
        //     99 => '苹果最热榜',
        // ];
        // $topPage = 50;
        $mp3_url = 'http://app.y2002.com/API/V2/Processer.ashx';
        $ydianyin_music = M('ydianyin_music');
        $app = 'vzm';
        //$basedir = '/tmp/dianyin/';

        $data1['m'] = 'c_a';
        $data1['pz'] = 50;
        $data1['tp'] = '1';

        for($i = 1;$i<7;$i++) {

        $data1['pi'] = $i;
        $result = $this->postData($mp3_url,$data1);
        $result = json_decode($result,ture)['data'];
        
        foreach ($result as $key => $v) {

        	// foreach ($value as $k => $v) {
        	 	//var_dump($v['id']);
        	 //echo '<br/>';
        	  //入库逻辑,数据库自增cid为页面id
		         $where = [
		             'musicid' => $v['id'],
		         ];
		         $has = $ydianyin_music->where($where)->count();

          //   	//var_dump($info);die;
		        
            // 	$fileName = $basedir . time() . '_' . mt_rand(10000,99999) . '.' . $ext;
          //   	$content = file_get_contents($url);
          //   	file_put_contents($fileName, $content);
          //   	//$file = $this->httpcopy($url);
          //   	$upRes = $this->upload('file', $fileName, $app);
          //   	$cdnUrl = $upRes['url'];

          //   	if(empty($cdnUrl)) continue;
          		
          		
				//var_dump($upRes);die;
		        //$data = [];
		        $data['cid'] = $v['id'];
		        $data['musicid'] = $v['id'];
		        //$data['musicid'] = $v['id'];
		        $data['name'] = $v['songname'];
		        $data['url'] = 'http://y2-a-p.qq190.net'.$v['songurl'];
		        $data['cdnurl'] = '';
		        $data['page'] = $data1['pi'];
		        $data['type'] = $v['typeid'];
		        $data['typename'] = $v['typeid'];
		        $data['create_time'] = $v['uploadtime'];
		        $data['update_time'] = date('Y-m-d H:i:s');
		        //$data['duration'] = $duration;
		        //存在就略过
		        if(empty($has)){
		        	$ydianyin_music->add($data);
		        //var_dump(json_encode($ydianyin_music->getLastSql()));
		        }else{
		        	//$ydianyin_music->save($data);
		        }
		       
		    //}
        }
        echo '第'.$i.'页已扫完';


        }
        //echo 'finish_sql';

        $where1['state'] = 0;
        $where1['cdnurl'] = '';
        $array = $ydianyin_music->where($where1)->getField('cid,url');
        //echo '<br/>';
        //$array = json_decode($array,ture);
        foreach ($array as $key => $value) {
        	 // var_dump($key);
        	 // var_dump($value);
        	 // echo '<br/>';
        	// var_dump($array[$key]['url']);die;
        	if($value) {
        		$where2['cid'] = $key;
        		$data2['cdnurl'] = $this->uploadCdn($value);
        		$data2['state'] = 1;
        		if(empty($data2['cdnurl'])) {
        			$data2['cdnurl'] = '';
        			$data2['state'] = 0;
        		}
        		$ydianyin_music->where($where2)->save($data2);
        	}
        	
        }
        //var_dump($array);
        echo 'finish_cdnurl';die;
     }




     public static function postData($url, $data){
        $postdata = http_build_query(
            $data
        );

        $opts = array('http' =>
                      array(
 
                          'method'  => 'POST',
                          'header'  => 'Content-type: application/x-www-form-urlencoded',
                          'content' => $postdata
                      )
 
        );
        $context = stream_context_create($opts);
        $result = file_get_contents($url, false, $context);
        return $result;
    }

    private function uploadCdn($url)
    {
    	//$url = 'http://y2-a-p.qq190.net'.$v['songurl'];
		$info = pathinfo($url);
        $ext = $info['extension'];
        $s = file_get_contents($url);
		$path = 'D:/Users/Administrator/Desktop/tmp/dianyin/'. time() . '_' . mt_rand(10000,99999) . '.' . $ext;  //文件路径和文件名
		file_put_contents($path, $s);
		//var_dump($path);//die;
		$upRes = $this->upload('audio', $path, 'vzm');
     	$cdnUrl = $upRes['audio'];//die;
     	return $cdnUrl;
    }

    //上传文件
    private function upload($type = '', $file_name = '', $app = '')
    {
        $ip = array('221.228.91.142:8080','fileupload.zbisq.com');
        $upload_ip = $ip[array_rand($ip)];
        $start=time();
        if (empty($type)) {
            $type = 'pic';//默认上传图片
        }

        if ($type == 'pic') $url = "http://{$upload_ip}/fileupload?app={$app}&ftype=1&uid=99999&trans=0&time={$start}"; // 图片上传
        if ($type == 'audio') $url = "http://{$upload_ip}/fileupload?app={$app}&ftype=2&uid=99999&trans=0&time={$start}"; // 音频上传
        if ($type == 'video') $url = "http://{$upload_ip}/fileupload?app={$app}&ftype=3&uid=99999&trans=0&time={$start}"; // 视频上传
        if ($type == 'file') $url = "http://{$upload_ip}/fileupload?app={$app}&ftype=4&uid=99999&trans=0&time={$start}"; // 文件上传
        if ($file_name) {
            $ext = $this->getExt($file_name); // 获取文件url后缀
            // $tmp_name = '/tmp/tmp'.md5(mt_rand(1000000,9999999)).mt_rand(1000000,9999999).'.'.$ext;
            $tmp_name = 'D:/Users/Administrator/Desktop/tmp/dianyin/'. time() . '_' . mt_rand(10000,99999) . '.' . $ext;
            file_put_contents($tmp_name, file_get_contents($file_name));
        } else {
            $tmp_name = $_FILES['upload']['tmp_name'];
        }
        if (class_exists('\CURLFile')) {
            $data = array('upload' => new \CURLFile($tmp_name));
        } else {
            $data = array('upload' => '@' . $tmp_name);
        }
        $timeout = 100;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        $rst = curl_exec($ch);
        $res = curl_errno($ch);
        if(file_exists($tmp_name)){
            @unlink($tmp_name);
        }

        //var_dump(curl_error());
        //return curl_error($ch);

        if ($res) {
            return $res;die;
        }
        curl_close($ch);
//        unlink($tmp_name);
        return json_decode($rst, 1);
    }

    /* 获取文件后缀 */
    private function getExt($url)
    {
        $extension = pathinfo($url, PATHINFO_EXTENSION);
        $extension_arr = explode('?', $extension);
        $ext = array_shift($extension_arr);
        return $ext;
    }

    private function httpcopy($url, $file="", $timeout=60) 
    {
		$file = empty($file) ? pathinfo($url,PATHINFO_BASENAME) : $file;
		$dir = pathinfo($file,PATHINFO_DIRNAME);
		!is_dir($dir) && @mkdir($dir,0755,true);
		$url = str_replace(" ","%20",$url);
		  
		if(function_exists('curl_init')) {
		  $ch = curl_init();
		  curl_setopt($ch, CURLOPT_URL, $url);
		  curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		  $temp = curl_exec($ch);
		  if(@file_put_contents($file, $temp) && !curl_error($ch)) {
		    return $file;
		  } else {
		    return false;
		  }
		} else {
		   	$opts = array(
		    	"http"=>array(
			    "method"=>"GET",
			    "header"=>"",
			    "timeout"=>$timeout)
			  );
			  $context = stream_context_create($opts);
			  if(@copy($url, $file, $context)) {
			    //$http_response_header
			    return $file;
			  } else {
			    return false;
			  }
		}
	}

}