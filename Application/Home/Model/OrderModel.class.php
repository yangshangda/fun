<?php
namespace Home\Model;
use Think\Model;
class OrderModel extends Model {
	//核对订单列表
	public function getCart($uid,$checked){
		//拼接完整表名
		$goods = C('DB_PREFIX').'goods';
		$cart  = C('DB_PREFIX').'shopcart';
		$sql = "select g.gname,g.price,g.thumb,g.stock,c.scid,c.addTime,c.gid,c.num,c.checked from $cart as c
		left join $goods as g
		on g.gid=c.gid
		where uid=$uid and checked=$checked";
		return $this->query($sql);
	}
}