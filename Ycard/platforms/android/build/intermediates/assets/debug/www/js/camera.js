


function change_img(std_img_id) {


  var destinationType = navigator.camera.DestinationType;
  var pre_img = document.getElementById(std_img_id);
  var user_plag = false;


  // 사진 얻을 방법 선택 부분
  // 버튼 선택하게 함

  // 사진 선택 부분
  // 사진찍기를 누르면
  // if(user_plag)
//     Camera.sourceType = navigator.camera.PictureSourceType.CAMERA;
  // // 앨범에서 선택을 누르면
  // else
      Camera.sourceType = navigator.camera.PictureSourceType.PHOTOLIBRARY;


  // 사진 얻음
  navigator.camera.getPicture(onSuccess, onFail, {quality: 50, destinationType: destinationType.FILE_URI, sourceType: Camera.sourceType});

}

// 성공, 사진 수정해줌
function onSuccess(imageData) {
alert(destinationType);
  pre_img.src = imageData;
}

// 실패, 실패알림 메세지 띄우고 소스 초기화
function onFail(message) {
  alert("사진을 로드하는 데 실패했습니다 TT: "+message);
}
