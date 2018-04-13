<?php

use App\Models\Category;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    public function run()
    {
        //用户id
        $user_ids = User::all()->pluck('id')->toArray();

        //分类id
        $category_ids = Category::all()->pluck('id')->toArray();

        //获取faker实例
        $faker = app(Faker\Generator::class);

        $topics = factory(Topic::class)->times(50)->make()->each(function ($topic, $index)
             use ($user_ids, $category_ids, $faker) {
                //话题的用户id随机分配
                $topic->user_id = $faker->randomElement($user_ids);
                //话题的分类id分配
                $topic->category_id = $faker->randomElement($category_ids);
            });

        //将数据装换为数组并插入数据库中
        Topic::insert($topics->toArray());
    }

}
