<?php

namespace app\common\model;
use think\Request;

/**
 * 活动表
 * Class Delivery
 * @package app\common\model
 */
class Games extends BaseModel
{
   
    public function remove()
    {
        return $this->delete();
    }
  
    //更新状态
    public function update_state($game_id,$state)
    {
        return $this->where(['game_id'=>$game_id])->update([
            'state' => $state
        ]);;
    }

    public function getListByType($type)
    {
        $request = Request::instance();

        return $this->order(['create_time' => 'desc'])->where('type','eq',$type)->paginate(15, false, ['query' => $request->request()]);
   
    }
    public function add_games($data)
    {
        if(!is_numeric( $data['num'])||strpos( $data['num'],".")!==false){
            return $this->renderError('请输入正确的库存');
        }
 
        $data['wxapp_id']  = self::$wxapp_id;
        
        $res =  $this->save($data);
        return $res;
    }


}
