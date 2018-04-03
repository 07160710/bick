<?php
namespace app\student\controller;
use think\Controller;

class CommonController extends Controller
{
    public function _initialize(){
        if(!session('authority')){
            $this->error("请先登录",url("login/index"));
        }
    }
}
?>