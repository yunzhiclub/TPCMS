<?php
namespace app\index\controller;

use app\index\model\Teacher;
use think\Controller;
/**
* 教师管理
*/
class TeacherController extends Controller
{

    public function index()
    {
        try
        {
            //查询关键字
            $keywords = input('get.keywords');

            // 分页信息
            $config = array('query' => array('keywords'=>$keywords));

            $Teacher = new Teacher;
            $teachers = $Teacher->where('name','like','%'.$keywords.'%')->paginate(3,false,$config);

            // 向V层传数据
            $this->assign('teachers',$teachers);
            // 获取模板信息
            return $this->fetch();

        } catch (\Exception $e)
        {
            // throw $e;
            return '系统错误'.$e->getMessage();
        }

    }

    public function insert()
    {
        $message = '';
        $error = '';
        try
        {
            $teacher = input('post.');

            // 引用teachermodel
            $Teacher = new Teacher;

            // 加入验证信息
            $result = $Teacher->validate(true)->data($teacher)->save();

            // 反馈结果
            if (false === $result)
            {
                return '新增失败'.$Teacher->getError();
            } else {
                return $this->success($teacher['name'].'新增成功',url('index'));
            }
        } catch (\Exception $e) {
            $error = '系统错误:' . $e->getMessage();
        }

        // 判断是否发生错误，返回不同信息。
        if ($error === '')
        {
            return $this->success($message, url('index'));
        } else {
            return $this->error($error);
        }
    }


    public function add()
    {
        try
        {
            return $this->fetch();
        } catch (\Exception $e) {
            return '系统错误'.$e->getMessage();
        }

    }

    public function delete()
    {
        try
        {
            // 接收id并转化为int型
            $id        = input('get.id/d');

            // 获取要删除的对象
            $Teacher = Teacher::get($id);

            //判断对象是否存在
            if (false === $Teacher)
            {
                throw new \Exception ('不存在id为'.$id.'的教师，删除失败');
            }

            //删除获取到的对象
            if (false === $Teacher->delete())
            {
                throw new \Exception ('删除失败:'.$Teacher->getError());
            }

            //程序正确执行，进行跳转
            return $this->success('删除成功',url('index'));
        } catch (\Exception $e)
        {
            //程序执行异常 接收异常并报错
            return $this->error('系统错误'.$e->getMessage());
        }


    }

    public function edit()
    {
        try
        {
            // 获取传入的ID
            $id = input('get.id/d');

            // 在Teacher表模型中获取当前记录
            if (false === $Teacher = Teacher::get($id))
            {
                return $this->error('未找到ID为'.$id.'的数据',url('index/edit'));
            }

             // 将数据传入v层
            $this->assign('teacher',$Teacher);

            // 获取封装好的V层内容
            return $this->fetch();
        } catch (\Exception $e)
        {
            return '系统错误:' . $e->getMessage();
        }


    }

    public function update()
    {
        $message    = '';   // 反馈消息
        $error      = '';   // 反馈错误信息

        try
        {
            // 获取V层传过来的数据
            $teacher = input('post.');

            // 将数据传入Teacher表
            $Teacher = new Teacher;
            $message = '更新成功';

            // 获取异常
            if (false === $Teacher->validate(true)->isUpdate(true)->save($teacher))
            {
                $error = '更新失败'.$Teacher->getError();
            }

        } catch (\Exception $e)
        {
            $error = '系统错误'.$e->getMessage();
        }

        //进行跳转
        if ($error === '')
        {
            return $this->success($message, url('index'));
        }else{
            return $this->error($error);
        }

    }
}
