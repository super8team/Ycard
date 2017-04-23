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
        $user = $student->updateStudent($req->get('sname'),$req->get('osnum'),$req->get('snum'),$req->get('date'),$req->get('image'));
        //return response()->json($user);

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
