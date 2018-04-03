<?php
namespace app\test\controller;

use app\student\model\Student;
use app\test\model\AnswerPaper;
use think\Log;

class IndexController extends CommonController
{

    public function index()
    {
        // 获取用户名
        $userName = session('authority')['userName'];
        // 传递模板参数
        $this->assign('userName', $userName);
        $this->assign('menuName', 'index');
        return view();
    }

    public function editdo()
    {
        $data = input('post.');
        $student = new Student();
        $res = $student->save($data, array(
            'id' => $data['id']
        ));
        if ($res > 0) {
            $this->success("修改成功！！！", url('index/index'));
        } else {
            $this->success("修改失败！！！", url('index/index'));
        }
    }

    public function insert()
    {
        // 表单处理
        if (request()->isPost()) {
            // 取出数据
            $answer['studentid'] = session('tester')['studentId'];
            $answer['paper_id'] = '222';
            $answer['select_question_id'] = '';
            $answer['select_item_id'] = input('itemid');
            $answer['select_status'] = input('selectStatus') == 'true' ? 1 : 0;
            $answerPaper = new AnswerPaper();
            $reult1 = $answerPaper->where([
                'paper_id' => $answer['paper_id'],
                'select_item_id' => $answer['select_item_id']
            ])->find();
            if ($reult1) {
                $result = $answerPaper->save($answer, [
                    'id' => $reult1['id']
                ]);
            } else {
                $result = $answerPaper->save($answer);
            }
            if ($result) {
                $data = [
                    'itemid' => input('itemid'),
                    'selectStatus' => input('selectStatus')
                ];
                return json($data);
            }
        }
    }
}

?>