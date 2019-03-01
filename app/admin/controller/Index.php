<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/28
 * Time: 20:43
 */
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Index as ModelIndex;
use app\common\common;
use think\Validate;
use think\Db;

class Index extends Controller
{

    public function index (){
        $user = new ModelIndex();
        $arr = $user->order("create_time desc")->paginate(10);
        if(!$arr){
            try{
                Db::name('user')->find();
            }catch(\Exception $e){
                $this->error('执行错误');
            }
        }
        $this->assign("arr",$arr);
        return $this->fetch();
    }

    public function upload(){
        //获取表单上传文件
        $file = request()->file('file');
        $user = new common();
        $upload = $user->upload($file);
        $this->success($upload,"admin/Index/index");
    }


}