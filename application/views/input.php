<?php
$this->load->view('includes/header');
?>
<form class="form-horizontal" method="post" name="form_data1" id="form_data1" action="" enctype="multipart/form-data">
  <fieldset>
    <legend>กรอกข้อมูลการแจ้งซ่อมบำรุง</legend>
    <div class="form-group">
      <label for="inputName" class="col-lg-2 control-label">ชื่อผู้แจ้งซ่อม</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" name="inputName" id="inputName" placeholder="ชื่อ" required>
      </div>
    </div>
    <div class="form-group">
      <label for="inputMail" class="col-lg-2 control-label">อีเมลล์</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" name="inputMail" id="inputMail" placeholder="asdsad@hmail.com" required>
      </div>
    </div>
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">ประเภท</label>
      <div class="col-lg-2">
        <select class="form-control" name="type" id="type" required>
          <option value="">--โปรดระบุ--</option>
          <option value="ทั่วไป">ทั่วไป</option>
          <option value="คอมพิวเตอร์และอุปกรณ์ต่อพ่วง">คอมพิวเตอร์และอุปกรณ์ต่อพ่วง</option>
          <option value="เครื่องเสียงและไมโครโฟน">เครื่องเสียงและไมโครโฟน</option>
          <option value="ระบบเครือข่าย">ระบบเครือข่าย</option>
          <option value="โปรเจคเตอร์">โปรเจคเตอร์</option>
          <option value="ระบบไฟฟ้าและอุปกรณ์ไฟฟ้า">ระบบไฟฟ้าและอุปกรณ์ไฟฟ้า</option>
          <option value="เครื่องปรับอากาศ">เครื่องปรับอากาศ</option>
          <option value="ระบบน้ำประปา">ระบบน้ำประปา</option>
          <option value="อาคารสถานที่ (ประตู หน้าต่าง ฯลฯ)">อาคารสถานที่ (ประตู หน้าต่าง ฯลฯ)</option>
          <option value="ระบบโทรศัพท์">ระบบโทรศัพท์</option>
          <option value="อุปกรณ์สำนักงาน (โต๊ะ เก้าอี้ ฯลฯ)">อุปกรณ์สำนักงาน (โต๊ะ เก้าอี้ ฯลฯ)</option>

        </select>
      </div>
      <label for="select" class="col-lg- control-label"></label>
      <div class="col-lg-4">
        <input type="text" class="form-control" name="desc_type" id="desc_type" placeholder="กรุณาระบุให้อะเอียด" required>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPhone" class="col-lg-2 control-label">เบอร์โทรติดต่อกลับ</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" name="inputPhone" id="inputPhone" placeholder="08888888XX" required>
      </div>
    </div>
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">สถานที่</label>
      <div class="col-lg-2">
        <select class="form-control" name="place" id="place" required>
          <option value="">ตึก</option>
          <option value="สาขาวิศวกรรมโยธาและสิ่งแวดล้อม /สาขาวิศวกรรมคอมพิวเตอร์">สาขาวิศวกรรมโยธาและสิ่งแวดล้อม /สาขาวิศวกรรมคอมพิวเตอร์</option>
          <option value="คณะบริหารธุรกิจและศิลปะสาสตร์">คณะบริหารธุรกิจและศิลปะสาสตร์</option>
          <option value="ตึกศึกษา">ตึกศึกษา</option>
          <option value="คณะวิศวกรรมศาสตร์ /สาขาวิศวกรรมไฟฟ้า /อิเล็กทรอนิกส์ /โทรคมนาคม">คณะวิศวกรรมศาสตร์ /สาขาวิศวกรรมไฟฟ้า /อิเล็กทรอนิกส์ /โทรคมนาคม</option>
          <option value="สาขาวิศวกรรมอุตสาหการ">สาขาวิศวกรรมอุตสาหการ</option>
          <option value="อาคารอำนวยการ">อาคารอำนวยการ</option>
          <option value="อาคารวิทยบริการ /ห้องสมุด">อาคารวิทยบริการ /ห้องสมุด</option>
          <option value="อาคารปฏิบัติการวิศวกรรมไฟฟ้า">อาคารปฏิบัติการวิศวกรรมไฟฟ้า</option>
          <option value="ฯลฯ">ฯลฯ</option>

        </select>
      </div>
      <label for="select" class="col-lg- control-label"></label>
      <div class="col-lg-2">
        <select class="form-control" name="place_build" id="place_build" required>
          <option value="">ชั้น</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          
        </select>
      </div>
      <label for="select" class="col-lg- control-label"></label>
      <div class="col-lg-2">
        <select class="form-control" name="place_room" id="place_room" required>
          <option value="">ห้อง</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="inputnum" class="col-lg-2 control-label">หมายเลขครุภัณฑ์</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" name="inputnum" id="inputnum" placeholder="กรอกหมายเลขครุภัณฑ์(ถ้ามี)" required>
      </div>
    </div>
    <div class="form-group">
      <label for="inputtext" class="col-lg-2 control-label">ปัญหาที่พบ</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" name="title" id="title" placeholder="...." required>
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">รายละเอียดเพิ่มเติม</label>
      <div class="col-lg-6">
        <textarea class="form-control" rows="3" name="desc" id="desc" required></textarea>
        <span class="help-block">คุณสามารถใส่ข้อความได้มากกว่า 1 บรรทัด</span>
        <label >คลิกปุ่มเพื่อแนบไฟล์รูป</label><br>
        <div class="form-group">
         <div class="col-lg-6">
          <input type="file" class="btn btn-default" name="file" id="file" multiple="true" required>
          <p class="help-block">Example block-level help text here.</p>
        </div>
      </div>
    </div>
  </div>


  <div class="form-group">
    <div class="col-lg-6 col-lg-offset-2">
      <button type="submit" class="btn btn-success">ตกลง</button>
      <button type="reset" class="btn btn-default">ยกเลิก</button>

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
        } else {

          $('#form_data1').trigger('reset');
          
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

<?php
$this->load->view('includes/footer');
?>
