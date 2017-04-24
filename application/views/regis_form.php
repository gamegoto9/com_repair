<form class="form-horizontal" method="post" name="form_regis" id="form_regis" action="" enctype="multipart/form-data">
  <fieldset>
    <legend>สมัครสมาชิก</legend>
    <div class="form-group">
      <label for="inputName" class="col-lg-3 control-label">ชื่อ - สกุล</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="inputName" id="inputName" placeholder="ชื่อ" required>
      </div>
    </div>
    <div class="form-group">
      <label for="inputMail" class="col-lg-3 control-label">อีเมลล์</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="inputMail" id="inputMail" placeholder="asdsad@hmail.com" required>
      </div>
    </div>
 
    <div class="form-group">
      <label for="inputPhone" class="col-lg-3 control-label">เบอร์โทร</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="inputPhone" id="inputPhone" placeholder="08888888XX" required>
      </div>
    </div>

    
    <div class="form-group">
      <label for="inputnum" class="col-lg-3 control-label">ชื่อผู้ใช้</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="username" id="username"  required>
      </div>
    </div>
    <div class="form-group">
      <label for="inputtext" class="col-lg-3 control-label">รหัสผ่าน</label>
      <div class="col-lg-8">
        <input type="password" class="form-control" name="password" id="password" required>
      </div>
    </div>
    <div class="form-group">
      <label for="inputtext" class="col-lg-3 control-label">ยืนยันรหัสผ่าน</label>
      <div class="col-lg-8">
        <input type="password" class="form-control" name="password_con" id="password_con" required>
      </div>
    </div>

    <div class="form-group">
      <label for="textArea" class="col-lg-3 control-label">รูปภาพ</label>
      <div class="col-lg-8">
        
        <label >คลิกปุ่มเพื่อแนบไฟล์รูป</label><br>
        <div class="form-group">
         <div class="col-lg-8">
          <input type="file" class="btn btn-default" name="file" id="file" multiple="true" required>
          <p class="help-block">Example block-level help text here.</p>
        </div>
      </div>
    </div>
  </div>



</fieldset>
</form>

<script type="text/javascript">
  $(document).ready(function(){
        //initialize the javascript

  });

  $("#form_data1").submit(function(){

    var formData = new FormData($('#form_data1')[0]);

    $.ajax({
      url: "insert_noti",
      type: 'POST',
      data: formData,
      mimeType: "multipart/form-data",
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        //now get here response returned by PHP in JSON fomat you can parse it using JSON.parse(data)

        var posts = JSON.parse(data);
        console.log(posts);


        if (posts.is_successful) {
          $.pnotify({
            title: 'แจ้งให้ทราบ!',
            text: posts.msg,
            type: 'success',
            opacity: 1,
            history: false
          });

          $('#form_data1').trigger('reset');
        } else {

          $.pnotify({
            title: 'เตือน!',
            text: posts.msg,
            type: 'error',
            opacity: 1,
            history: false
          });

         
        }


      },
      error: function(jqXHR, textStatus, errorThrown) {
        //handle here error returned
      }
  });

  return false;

  });

</script>

