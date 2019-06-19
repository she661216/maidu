<?php

namespace app\store\model;
use think\Model;

use think\Request;


class Role extends Model
{
    public function role()
    {
        $request = Request::instance();
        return $this->paginate(100, false, ['query' => $request->request()]);
    }
  
}
