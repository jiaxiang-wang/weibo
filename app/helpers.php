<?php 

/*
获取数据库配置并判断在本地还是在heroku
*/
function get_db_config()
{
    //如果IS_IN_HEROKU配置项存在则获取配置信息
    if(getenv('IS_IN_HEROKU'))
    {
        //获取配置信息
        $url = parse_url(getenv("DATABASE_URL"));
        return $db_config = [
            'connection' => 'pgsql',
            'host' => $url["host"],
            'database' => substr($url["path"],1),
            'username' => $url["user"],
            'password' => $url["pass"],
        ];
    }else{
        return $db_config = [
            'connection' => env('DB_CONNECTION','mysql'),
            'host' => env('DB_HOST','localhost'),
            'database' => env('DB_DATABASE','forge'),
            'username' => env('DB_USERNAME','forge'),
            'password' => env('DB_PASSWORD',''),
        ];
    }
}