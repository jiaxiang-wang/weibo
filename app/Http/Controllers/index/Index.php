<?php 
namespace App\Http\Controllers\index;

//引入控制器类
use App\Http\Controllers\Controller;
//引入数据库类
use Illuminate\Support\Facades\DB;
//首页
class Index extends Controller
{
    public function index(){
        
        //如果文件不存在
        if(!file_exists('data.txt')){
            //创建这个文件
            file_put_contents('data.txt','');
        }
        //并且把整个文件读入到一个变量中
        $txt = file_get_contents('data.txt','');
        //如果变量的值不为空
        if($txt){
            $data = json_decode($txt,true);
            /* echo '<pre>';
            print_r($data);
            exit(); */
        }else{
            //搜索表
            $data['search'] = DB::table('test')->shuzu_get();
            //导航表 cate 为0的记录
            $data['nav'] = DB::table('nav')->where('cate',0)->shuzu_get();
            //导航表 cate 为1的记录
            $data['nav_items'] = DB::table('nav')->where('cate',1)->shuzu_get();
            //轮播图片
            /* 图片数量 */
            $data['lunbo_num'] = DB::table('lunbo')->where('status',0)->count();
            //轮播
            $data['lunbo'] = DB::table('lunbo')->where('status',0)->shuzu_get();
            //新闻咨询
            $data['news'] = DB::table('news')->where('status',0)->shuzu_get();
            /* echo '<pre>';
            print_r($data);
            exit(); */
            //把数据存到文件中
            file_put_contents('data.txt',json_encode($data));
        }
        return view('/index/index',$data);
    }
    public function content(){
        return view('/index/content');
    }
    public function nav(){
        return view('/index/nav');
    }
}