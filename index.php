<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Phát Trực Tiếp Lên Facebook</title>
</head>
<body>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '1075578035837051',
        xfbml      : true,
        version    : 'v2.6'
      });
    };

    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "//connect.facebook.net/vi_VN/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
  </script>
  <button id="liveButton">Tạo kênh phát Trực Tiếp trên Facebook</button>
  <script>
  document.getElementById('liveButton').onclick = function() {
    FB.ui({
      display: 'popup',
      method: 'live_broadcast',
      phase: 'create',
  }, function(response) {
      if (!response.id) {
        alert('dialog canceled');
        return;
      }
      alert("Kênh đã được tạo. Vui lòng chọn hiển thị Popup nếu trình duyệt có thông báo.");
      //alert('stream url:' + response.secure_stream_url);
      FB.ui({
        display: 'popup',
        method: 'live_broadcast',
        phase: 'publish',
        broadcast_data: response,
      }, function(response) {
      alert("video status: \n" + response.status);
      });
    });
  };
  </script>
</body>
</html>