<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    // use Notifiable;
    //
    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array
    //  */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];
    //
    // /**
    //  * The attributes that should be hidden for arrays.
    //  *
    //  * @var array
    //  */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
    public function detailStudent($snum = 1){
      $student = Self::where('snum',$snum)->get();
      return $student;
    }

    public function listStudent(){
      $student = Self::all();
      return $student;
    }

    public function updateStudent($sname='test',$osnum=1,$snum=1,$date='1',$image='test'){
      //$student = Self::findOrFail($snum);
       $student = Self::where('snum',$osnum)->update([
         'sname' => $sname,
         'snum' => $snum,
         'date' => $date,
         'image' => $image,
       ]);
      // $student = Self::all();
      // $student->update([
      //   'sname' => $sname,
      //   'snum' => $snum,
      //   'date' => $date,
      //   'image' => $image,
      // ]);
      return $student;
    }
    public function listMember(){
      $student = Self::all();
      return $student;
    }
    public function listTeam(){
      $student = Self::all();
      return $student;
    }
}