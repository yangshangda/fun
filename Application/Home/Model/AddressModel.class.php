<?php
namespace Home\Model;
use Think\Model;
class AddressModel extends Model {
    /*
     * 将地区信息从字符串保存成数组
     */
    public function getAddrToArray($data) {
        $data['address'] = explode(',', $data['address'], 4);
        return $data;
    }
}
