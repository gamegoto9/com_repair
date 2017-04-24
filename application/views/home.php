<?php
$this->load->view('includes/header');
?>

<style type="text/css">
  .table th {
   text-align: center;   
 }
</style>
<fieldset>
  <legend>เหตุที่แจ้งซ่อม</legend>
  <div id="dataTableNotify"></div> 
</fieldset>


<!-- Modal -->
<div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-admin" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">ข้อมูล</h4>
      </div>
      <div class="modal-body">


        <div id="div_show">

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalShow2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-admin" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">ข้อมูล</h4>
      </div>
      <div class="modal-body">


        <div id="div_show2">

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="save_status();">บันทึก</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">ยกเลิก</button>

      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    loadDataTableNotify();
  });

  function myFunction() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[4];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }

  function loadDataTableNotify(){
    $("#dataTableNotify").load('loadDataTableNotify/');
  }

  function showModal(xid) {
    var sdata = xid;
    $('#div_show').load('data_goods_repair/'+ sdata);
    $('#modalShow').modal('show');
  }

  function showModal2(xid) {
    var sdata = xid;
    $('#div_show2').load('cheng_status/'+ sdata);
    $('#modalShow2').modal('show');
  }


  function save_status(){
    console.log($('#id_goods_status').val());

    var faction = "<?php echo site_url('comrepair/update_status/'); ?>";
    var fdata = {id_goods: $("#id_goods_status").val(),status_form: $("#status_form").val()};
    $.post(faction, fdata, function(jdata) {

      if (jdata.is_successful) {

        $.pnotify({
          title: 'แจ้งให้ทราบ!',
          text: jdata.msg,
          type: 'success',
          opacity: 1,
          history: false

        });

         $('#modalShow2').modal('hide');
         loadDataTableNotify();


      } else {
        $.pnotify({
          title: 'แจ้งให้ทราบ!',
          text: jdata.msg,
          type: 'error',
          opacity: 1,
          history: false

        });


      }

    }, 'json');


  return false;
}


</script>


<?php
$this->load->view('includes/footer');
?>

