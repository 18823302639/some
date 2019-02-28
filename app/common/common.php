<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/28
 * Time: 21:17
 */

namespace app\common;

use think\Validate;
use think\Controller;
use think\Db;
use app\admin\model\Index as ModelIndex;

class common extends Controller
{

    public function upload($file)
    {
        //import('phpexcel.PHPExcel', EXTEND_PATH);//方法二
        vendor("PHPExcel.PHPExcel"); //方法一
        $objPHPExcel = new \PHPExcel();

        $info = $file->validate(['size' => 156782, 'ext' => 'xlsx,xls,csv'])->move(ROOT_PATH . 'public' . DS . 'excel');
        if ($info) {
            $exclePath = $info->getSaveName();  //获取文件名
            $file_name = ROOT_PATH . 'public' . DS . 'excel' . DS . $exclePath;   //上传文件的地址
            $name = $info->getFilename();
            if ($name == 'xlsx') {
                $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
            } else {
                $objReader = \PHPExcel_IOFactory::createReader('Excel5');
            }

            $obj_PHPExcel = $objReader->load($file_name, $encode = 'utf-8');  //加载文件内容,编码utf-8
            echo "<pre>";
            $excel_array = $obj_PHPExcel->getsheet(0)->toArray();   //转换为数组格式
            array_shift($excel_array);  //删除第一个数组(标题);
            $data = [];
            $i = 0;
            $user = new ModelIndex();
            foreach ($excel_array as $k => $v) {
                $data[$k]['some_name'] = $v[0];
                $data[$k]['inser_time'] = $user->create_time;
                $i++;
            }
            $success = Db::name('tb_some')->insertAll($data); //批量插入数据
            //$i=
            $error = $i - $success;

            return "总{$i}条，成功{$success}条，失败{$error}条。";
            // Db::name('t_station')->insertAll($city); //批量插入数据
        } else {
            // 上传失败获取错误信息
            echo $file->getError();
        }


    }

}