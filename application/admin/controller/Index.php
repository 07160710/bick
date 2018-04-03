<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Config;
class Index extends Common
{
    public function index()
    {
        return view();
    }
    public function test(){
        echo  Config::get('hzj');
    }
}
