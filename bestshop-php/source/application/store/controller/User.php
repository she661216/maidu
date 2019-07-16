<?php

namespace app\store\controller;

use app\store\model\User as UserModel;

/**
 * 用户管理
 * Class User
 * @package app\store\controller
 */
class User extends Controller
{
    /**
     * 用户列表
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $model = new UserModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }
    public function update($user_id,$state)
    {
        if(!$user_id){
            return $this->renderError('用户id有误');
        }
        $model = UserModel::get($user_id);
        if (!$model->update_state($user_id,$state)) {
            return $this->renderError('更新失败');
        }
        return $this->renderSuccess('更新成功');
    }
}
