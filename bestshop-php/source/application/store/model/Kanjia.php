<?php

namespace app\store\model;

use app\common\model\BaseModel as BaseModel;

/**
 * 配送模板模型
 * Class Delivery
 * @package app\common\model
 */
class Kanjia extends BaseModel
{
   
    public function getDetail($id)
    {
        return  $this->where(['kanjia_id'=>$id])->select();
    }

    public function edit($data) {
        if($data['kanjia_id'] == 1){
            if (empty($data['amount1']) || empty($data['chance1'])) {
                $this->error = '选项一必须配置';
                return false;
            }
        }
       
        if ($this->where(['kanjia_id'=>$data['kanjia_id']])->update($data)) {
            return true;
        }
        return false;
    }
}
