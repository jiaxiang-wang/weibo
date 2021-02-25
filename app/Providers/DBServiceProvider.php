<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Query\Builder as QueryBuilder;

class DBServiceProvider extends ServiceProvider{
    public function boot(){
        /* 扩展的类名           要扩展的方法   方法内容 */
        QueryBuilder::macro('shuzu_get',function(){
            $data = $this->get()->toArray();
            $res = [];
            foreach($data as $key => $val){
                $val = (array)$val;
                $res[$key]=$val;
            }
            return $res;
        });
        QueryBuilder::macro('shuzu_new',function($index){
            $groups = $this->shuzu_get();
            $groups2 = [];
            foreach($groups as $val){
                $groups2[$val[$index]] = $val;
            }
            return $groups2;
        });
        QueryBuilder::macro('shuzu_first',function(){
            $data = $this->first();
            $data = (array)$data;
            return $data;
        });
        /* 分页 */                            /* 默认10条 */
        QueryBuilder::macro('paging',function($pagesize=10){
            $res = $this->paginate($pagesize);//paginate 方法根据用户浏览的当前页码，自动设置恰当的偏移量 offset 和限制数 limit
            $list = $res->items();//获取当前页的所有项。
            $total = $res->total();//获取总数。
            //转数组
            foreach($list as $key=>$val){
                $list[$key] =(array)$val;
            }
            //返回数据
            return array('total'=>$total,'list'=>$list);
        });
    }
}