<?php

namespace app\store\controller\store;

use app\store\controller\Controller;
use app\store\model\StoreUser as StoreUserModel;
use app\store\model\Role as roleModel;

use think\Request;
/**
 * 商户管理员控制器
 * Class StoreUser
 * @package app\store\controller
 */
class User extends Controller
{
    /**
     * 更新当前管理员信息
     * @return array|mixed
     * @throws \think\exception\DbException
     */
    public function renew()
    {
        $model = StoreUserModel::detail($this->store['user']['store_user_id']);
        if ($this->request->isAjax()) {
            if ($model->renew($this->postData('user'))) {
                return $this->renderSuccess('更新成功');
            }
            return $this->renderError($model->getError() ?: '更新失败');
        }
        return $this->fetch('renew', compact('model'));
    }
    public function tabel()
    {
        $model = new StoreUserModel;
        $list = $model->getList();
        
        $role = new roleModel;
        $list_role =$role->role();

        return $this->fetch('tabel', compact('list','list_role'));
    }

    public function delete($store_user_id)
    {
        if($store_user_id == '0'){
            return $this->renderError('该账号不允许删除');
        }
        $model = StoreUserModel::get($store_user_id);
        if (!$model->remove()) {
            return $this->renderError('删除失败');
        }
        return $this->renderSuccess('删除成功');
    }
    public function editRole()
    {
        $data =    $this->postData('name_role');
        $role = new roleModel;
      
        foreach($data as $item){
            $mo[] = array('menu_id'=>$item,'state'=>'1');
        }

        $res =  $role->saveAll($mo);
        if( $res){
            return $this->renderSuccess('更新成功');
        }else{
            return $this->renderError('更新失败');
        }

    }
    public function add()
    {
        $model = new StoreUserModel;
        $data =    $this->postData('user');
       
       if ($data['password'] !== $data['password_confirm']) {
        $this->error = '确认密码不正确';
        return $this->renderError('确认密码不正确');
    }
        $res =  $model->save([
            'user_name' => $data['user_name'],
            'password' => yoshop_hash($data['password']),
            'role_id' =>  $data['role_id'],
            'wxapp_id' => $wxapp_id,
        ]);

        if( $res){
            return $this->renderSuccess('更新成功');
        }else{
            return $this->renderError('更新失败');
        }
      
    }
}
