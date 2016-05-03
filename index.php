<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
<button id="liveButton">Create Live Stream To Facebook</button>
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
    alert('stream url:' + response.secure_stream_url);
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