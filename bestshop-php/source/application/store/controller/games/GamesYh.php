<?php

namespace app\store\controller\games;
use app\common\model\Games as GamesModel;
use app\store\controller\Controller;
use app\common\model\Goods as GoodsModel;
/**
 * 清理缓存
 * Class Index
 * @package app\store\controller
 */
class GamesYh extends Controller
{
    public function index()
    {

         $model = new GamesModel;
         $list = $model->getListByType(2);
         
         $goods = new GoodsModel;
         $goods_list =$goods->getList();

         return $this->fetch('index', compact('list','goods_list'));

    }

     
     public function update($game_id,$state)
     {
         if(!$game_id){
             return $this->renderError('活动id有误');
         }
         $model = GamesModel::get($game_id);
         if (!$model->update_state($game_id,$state)) {
             return $this->renderError('更新失败');
         }
         return $this->renderSuccess('更新成功');
     }
 
     public function delete($game_id)
     {
         if(!$game_id){
             return $this->renderError('活动id有误');
         }
         $model = GamesModel::get($game_id);
         if (!$model->remove()) {
             return $this->renderError('删除失败');
         }
         return $this->renderSuccess('删除成功');
     }
}
