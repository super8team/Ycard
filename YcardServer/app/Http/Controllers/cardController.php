<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Student;
use Illuminate\Http\Request;

class CardController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    //리퀘스트 객체 사용 Type Hinting(타입지정)
    public function detailView(Request $req){ //학생 정보
        $student = new Student;
        //$userId = $req->get('name');
        //$user = \Auth::user(); //미들웨어에 의해서 로그인한사람을 뜻함
        //$users = User::all();
        //$projects = \App\User::where('user_id',$user->id)->get();
        //Student::where('name','test')->get();
        $user = $student->detailStudent($req->get('snum'));
        //return view('project.index')->with('projects',$projects);
        //return response()->json($users,200,[],JSON_PRETTY_PRINT);
        return $req->get('callback')."(".$user.")";
    }
    public function listView(){ //전체학생 리스트
        $student = new Student;
        $user = $student->listStudent();

        return response()->json($user);
    }

    public function updateStudent(Request $req){ // 학생 업데이트
        $student = new Student;

        // // DB에 저장을 위해 file네임 받아옴
        //     $file_name = $_FILES["file"]["name"];
        //       $req->file('image')
        //     $target_dir = "images/".$file_name; //업로드 경로

            // $imageName = $req->file('image')->getClientOriginalExtension();
            //
            //    $req->file('image')->move(
            //        base_path() . '/public/', $imageName
            //    );

            // 임시경로의 파일을 옮김
            //move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir);

        //$user = $student->updateStudent($req->get('sname'),$req->get('id'),$req->get('snum'),$req->get('date'));
        $user = $student->updateStudent($req->get('sname'),$req->get('id'),$req->get('snum'),$req->get('date'),$req->get('image'));
        //$user = $student->updateStudent($req->get('sname'),$req->get('snum'),$req->get('date'));
        //return response()->json($user);



        return $req->get('callback')."(".$user.")";

    }

    public function imgUpload(Request $req){ //사진업로드

      // $imageName = $req->file('name')->getClientOriginalExtension();
      //
      //    $req->file('tmp_name')->move(
      //        base_path() . '/', $imageName
      //    );

         // DB에 저장을 위해 file네임 받아옴
             $file_name = $_FILES["file"]["name"];

             $target_dir = "/".$file_name; //업로드 경로


             //임시경로의 파일을 옮김
             move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir);

    }

    public function listTeam(){ //조별 정보
        $student = new Student;
        $user = $student->listTeam();

        return response()->json($user);
    }

    public function listMember(Request $req){ //한개조의 팀원들
        $student = new Student;
        $user = $student->listMember();

        //return response()->json($user);
        return $req->get('callback')."(".$user.")";
        //return $callback."(".$user.")";
    }

}
