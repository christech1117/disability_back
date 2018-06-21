<?php

use Illuminate\Database\Seeder;
use App\PersonObstacleType;

class PersonObstacleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            # 第一大類
            ['type' => '1', 'sub_type' => '智能障礙者', 'score' => 6],
            ['type' => '1', 'sub_type' => '植物人', 'score' => 9],
            ['type' => '1', 'sub_type' => '失智症', 'score' => 10],
            ['type' => '1', 'sub_type' => '自閉症', 'score' => 11],
            ['type' => '1', 'sub_type' => '慢性精神病', 'score' => 12],
            ['type' => '1', 'sub_type' => '頑性癲癇症', 'score' => 14],
            ['type' => '1', 'sub_type' => '其他', 'score' => 0],
            # 第二大類
            ['type' => '2', 'sub_type' => '視覺障礙', 'score' => 1],
            ['type' => '2', 'sub_type' => '聽覺障礙', 'score' => 2],
            ['type' => '2', 'sub_type' => '平衡機能障礙', 'score' => 3],
            ['type' => '2', 'sub_type' => '其他', 'score' => 0],
            # 第三大類
            ['type' => '3', 'sub_type' => '聲音或語言機能障礙', 'score' => 4],
            ['type' => '3', 'sub_type' => '其他', 'score' => 0],
            # 第四大類
            ['type' => '4', 'sub_type' => '重要器官失去功能-心臟', 'score' => 7],
            ['type' => '4', 'sub_type' => '重要器官失去功能-造血機能', 'score' => 7],
            ['type' => '4', 'sub_type' => '重要器官失去功能-呼吸器官', 'score' => 7],
            ['type' => '4', 'sub_type' => '其他', 'score' => 0],
            # 第五大類
            ['type' => '5', 'sub_type' => '重要器官失去功能-吞嚥機能', 'score' => 7],
            ['type' => '5', 'sub_type' => '重要器官失去功能-胃', 'score' => 7],
            ['type' => '5', 'sub_type' => '重要器官失去功能-腸道', 'score' => 7],
            ['type' => '5', 'sub_type' => '重要器官失去功能-肝臟', 'score' => 7],
            ['type' => '5', 'sub_type' => '其他', 'score' => 0],
            # 第六大類
            ['type' => '6', 'sub_type' => '重要器官失去功能-腎臟', 'score' => 7],
            ['type' => '6', 'sub_type' => '重要器官失去功能-膀胱', 'score' => 7],
            ['type' => '6', 'sub_type' => '其他', 'score' => 7],
            # 第七大類
            ['type' => '7', 'sub_type' => '肢體障礙', 'score' => 5],
            ['type' => '7', 'sub_type' => '其他', 'score' => 0],
            # 第八大類
            ['type' => '8', 'sub_type' => '顏面損傷', 'score' => 8],
            ['type' => '8', 'sub_type' => '其他', 'score' => 0],
            # 未分類
            ['type' => '0', 'sub_type' => '多重障礙者', 'score' => 13],
            ['type' => '0', 'sub_type' => '罕見疾病', 'score' => 15],
            ['type' => '0', 'sub_type' => '其他經中央衛生主管機關認定之障礙者', 'score' => 16],
        ];
        foreach ($items as $key => $item) {
            PersonObstacleType::create([
                'type' => $item['type'],
                'sub_type' => $item['sub_type'],
                'score' => $item['score'],
            ]);
        }
    }
}
