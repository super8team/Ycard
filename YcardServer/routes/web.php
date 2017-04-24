<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/imgUpload', function () {
  // // DB에 저장을 위해 file네임 받아옴
  //     $file_name = $_FILES["file"]["name"];
  //
  //     $target_dir = "/".$file_name; //업로드 경로
  //
  //
  //     //임시경로의 파일을 옮김
  //     move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir);
      $uploaddir = 'C:\xampp\htdocs\Ycard\YcardServer\public\\'; //어느 폴더에 넣을것인가 경로
        $uploadfile = $uploaddir . basename($_FILES["file"]["name"]);
        // 위의 경로에 업로드한 파일의 이름을 합침 basename은 파일이름이 파일만의 이름이 되도록
        // 확장자나 경로를 뺀 본래 파일명으로 자름

        if(move_uploaded_file($_FILES["file"]["tmp_name"], $uploadfile)){ //임시저장 파일에서 실제경로로 파일을 복사 함과 동시에 보안성 검사
          echo "파일이 유효하고, 성공적으로 업로드 되었다 \n";

        }else{
          echo "파일 업로드 공격의 가능성이 있다 \n";
        }

});

Route::get('detail','CardController@detailView');
Route::get('listView','CardController@listView');
Route::get('updateStudent','CardController@updateStudent');
Route::get('listTeam','CardController@listTeam');
Route::get('listMember','CardController@listMember');
//Route::get('imgUpload','CardController@imgUpload');
