<script>
  function submitChat() {
    if(forms.msg.value == '' ) {
      alert("ALL FIELDS ARE MANDATORY!!!");
      return;
    }
    
    var msg = forms.msg.value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById('incoming_msg').innerHTML = xmlhttp.responseText;
      }
    }
    xmlhttp.open('GET','user_cha_send.php?msg='+msg,true);
    xmlhttp.send();
    forms.msg.value = '';
  }

  $(document).ready(function(e){
    $.ajaxSetup({
      cache: false
    });
    $( "#msg_area").keyup(function(e) {
      var code = e.keyCode || e.which;
     if(code == 13) { //Enter keycode
       submitChat();
     }
   });


    setInterval( function(){$('#incoming_msg').load('user_load.php'); },1000 );
  });
</script>