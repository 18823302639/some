<?php
namespace app\index\controller;

use think\Controller;
use app\admin\model\Index as ModelIndex;

class Index extends Controller
{
    public function index()
    {
        $user = new ModelIndex();
        $arr = $user->order("create_time desc")->page('1,10')->select();
        $this->assign("arr",$arr);
        return $this->fetch();
    }



}
