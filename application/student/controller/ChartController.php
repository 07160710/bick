<?php
namespace app\student\controller;

class ChartController extends CommonController
{

    public function index()
    {
        // 获取用户名
        $userName = session('authority')['userName'];
        $this->assign('userName', $userName);
        $this->assign('menuName', 'chart');
        return view();
    }
}
?>