<?php

$raw = file_get_contents('php://input');

$user_data = json_decode($raw, true);

//オブジェクトからuserIDのみを抽出
$user_id = $user_data['events'][0]['source']['userId'];

//ファイルの位置を予め変数に入れる
$file_url = './log/line_user_test.txt';

$nakami = '生hook data:' . $raw . "\n";
$nakami2 = 'ユーザー識別id(decode版):' . $user_data['events'][0]['source']['userId'] . "\n";

//hookしてきた中身を判別
$event_type = $user_data['events'][0]['type'];

//file_put_contentsで検証
file_put_contents($file_url, $nakami . "\n" . $user_id, FILE_APPEND);

file_put_contents($file_url, $nakami2, FILE_APPEND);
