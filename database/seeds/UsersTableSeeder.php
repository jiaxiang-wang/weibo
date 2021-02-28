<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory 这个辅助函数来生成一个使用假数据的用户对象
        factory(User::class)->times(50)->create();
        //times 是由 FactoryBuilder 类 提供的 API。times 接受一个参数用于指定要创建的模型数量，create 方法来将生成假用户列表数据插入到数据库中
        $user = User::find(1);
        $user->name = 'Summer';
        $user->email = 'summer@example.com';
        $user->save();
    }
}
