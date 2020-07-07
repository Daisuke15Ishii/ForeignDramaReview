<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //レコード1
        $review = new \App\Review([
            'drama_id' => '1',
            'user_id' => '2',
            'total_evaluation' => '5',
            'story_evaluation' => '4',
            'world_evaluation' => '4',
            'cast_evaluation' => '4',
            'char_evaluation' => '4',
            'visual_evaluation' => '4',
            'music_evaluation' => '4',

            'progress' => '1',
            'subtitles' => '1',
            'review_title' => 'テストレビュータイトル',
            'review_comment' => 'テストレビューコメントほげ。テストレビューコメントほげ。テストレビューコメントほげ。テストレビューコメントほげ。テストレビューコメントほげ。',
            'spoiler_alert' => '0',
            'previous' => '1',
        ]);
        $review->save();


        //レコード2
        $review = new \App\Review([
            'drama_id' => '1',
            'user_id' => '1',
            'total_evaluation' => '3',
            'story_evaluation' => '3',
            'world_evaluation' => '2',
            'cast_evaluation' => '3',
            'char_evaluation' => '4',
            'visual_evaluation' => '5',
            'music_evaluation' => '1',

            'progress' => '1',
            'subtitles' => '0',
            'review_title' => 'テストレビュータイトル2',
            'review_comment' => 'テスト2ほげ。テスト2ほげ。テスト2ほげ。テスト2ほげ。テスト2ほげ。テスト2ほげ。',
            'spoiler_alert' => '1',
            'previous' => '2',
        ]);
        $review->save();

        //レコード3
        $review = new \App\Review([
            'drama_id' => '2',
            'user_id' => '2',
            'total_evaluation' => '3',
            'story_evaluation' => '3',
            'world_evaluation' => '2',
            'cast_evaluation' => '3',
            'char_evaluation' => '4',
            'visual_evaluation' => '5',
            'music_evaluation' => '1',

            'progress' => '1',
            'subtitles' => '0',
            'review_title' => 'drama_id2のレビュー1',
            'review_comment' => 'drama_id2のレビューだよほげ。drama_id2のレビューだよほげ。',
            'spoiler_alert' => '1',
            'previous' => '2',
        ]);
        $review->save();

        //レコード4
        $review = new \App\Review([
            'drama_id' => '3',
            'user_id' => '2',
            'total_evaluation' => '3',
            'story_evaluation' => '3',
            'world_evaluation' => '2',
            'cast_evaluation' => '3',
            'char_evaluation' => '4',
            'visual_evaluation' => '5',
            'music_evaluation' => '1',

            'progress' => '1',
            'subtitles' => '0',
            'review_title' => 'drama_id3のレビュー1',
            'review_comment' => 'drama_id3のレビューだよほげ。drama_id3のレビューだよほげ。',
            'spoiler_alert' => '1',
            'previous' => '2',
        ]);
        $review->save();

        //レコード5
        $review = new \App\Review([
            'drama_id' => '4',
            'user_id' => '2',
            'total_evaluation' => '3',
            'story_evaluation' => '3',
            'world_evaluation' => '2',
            'cast_evaluation' => '3',
            'char_evaluation' => '4',
            'visual_evaluation' => '5',
            'music_evaluation' => '1',

            'progress' => '1',
            'subtitles' => '0',
            'review_title' => 'drama_id4のレビュー1',
            'review_comment' => 'drama_id4のレビューだよほげ。drama_id4のレビューだよほげ。',
            'spoiler_alert' => '1',
            'previous' => '2',
        ]);
        $review->save();

        //レコード6
        $review = new \App\Review([
            'drama_id' => '5',
            'user_id' => '2',
            'total_evaluation' => '3',
            'story_evaluation' => '3',
            'world_evaluation' => '2',
            'cast_evaluation' => '3',
            'char_evaluation' => '4',
            'visual_evaluation' => '5',
            'music_evaluation' => '1',

            'progress' => '1',
            'subtitles' => '0',
            'review_title' => 'drama_id5のレビュー1',
            'review_comment' => 'drama_id5のレビューだよほげ。drama_id5のレビューだよほげ。',
            'spoiler_alert' => '1',
            'previous' => '2',
        ]);
        $review->save();

    }
}
