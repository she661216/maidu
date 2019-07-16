<?php

namespace app\common\model;
use think\Request;
/**
 * 商家用户模型
 * Class StoreUser
 * @package app\common\model
 */
class Vouchers extends BaseModel
{
    protected $name = 'vouchers';

    public function remove()
    {
        return $this->delete();
    }
  
    public function getList()
    {
    
        $request = Request::instance();
        return $this->order(['create_time' => 'desc'])->where('state','neq','4')
            ->paginate(15, false, ['query' => $request->request()]);
    }
  
    public function add_vouchers($data)
    {
      
        if(!is_numeric( $data['number'])||strpos( $data['number'],".")!==false){
            return $this->renderError('请输入正确的数量');
        }
        $data['wxapp_id']  = self::$wxapp_id;
        
        $n =  $data['number'];
        unset($data['number']);
        
        for ($x=0; $x <= $n; $x++) {
            $all[] = $data;
            $key = time();
            $all[$x]['key']  = chr(rand(65, 90)).chr(rand(65, 90)).chr(rand(65, 90)).$key.mt_rand(10,99);
          } 
        $res =  $this->saveAll($all);
        return $res;
    }

  
}
