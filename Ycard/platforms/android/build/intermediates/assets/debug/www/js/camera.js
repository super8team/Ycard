
var pre_img;
var options= {};
  document.addEventListener("deviceready", onDeviceReady, false);
function change_img(std_img_id) {


  pre_img = document.getElementById(std_img_id);
  var source;


  // 사진 얻을 방법 선택 부분
  // 버튼 선택하게 함
  $("body").append('<div id="dialog-confirm" title="고르세요 ㅎ.ㅎ">'+
                    '</div>');

   $( "#dialog-confirm" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        "촬영ㅎ.ㅎ": function() {
          source = navigator.camera.PictureSourceType.CAMERA;
          getPhoto(source);
          $(this).dialog( "close" );
        },
        "앨범에서선택ㅎ.ㅎ": function() {
          source = navigator.camera.PictureSourceType.PHOTOLIBRARY;
          getPhoto(source);
          $(this).dialog( "close" );
        }
      }
    });
}



function getPhoto(source) {
 // 사진 얻음
  var destinationType = navigator.camera.DestinationType;
  Camera.sourceType = source;
  navigator.camera.getPicture(uploadPhoto, onFail, {quality: 50, destinationType: destinationType.FILE_URI, correctOrientation: true, sourceType: Camera.sourceType});
}

// 성공, 사진 수정해줌
function onSuccess(imageData) {
  pre_img.src = imageData;
}


// 실패, 실패알림 메세지 띄우고 소스 초기화
function onFail(message) {
  alert("사진을 로드하는 데 실패했습니다 TT: "+message);
}
