<table class="table table-responsive" id="myTable" name="myTable">
    <thead class="thead-default">
     <tr>
        <th>ลำดับ</th>
        <th>วันที่</th>
        <th>หมาบเลขคุภัณฑ์</th>
        <th>ปัญหาที่พบ</th>
        <th>ปะเภทครุภัณฑ์</th>
        <th>สถานที่</th>
        <th>ผู้แจ้ง</th>
        <th>สถานะ</th>
        <th>ดูข้อมุล</th>
        <th>Action</th>


      </tr>
    </thead>
    <?php
    $i=0;
    foreach ($data as $row) {
      $i++;
      ?>
      <tr>
        <td ><div align="center"><?php echo $i;?></div></td>
        <td ><div align="center"><?php echo $row["date_noti"];?></div></td>
        <td><div align="left" style="width:100px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;"><?php echo $row["id_goods"];?></div></td>
        <td><div align="left" style="width:90px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;"><?php echo $row["subject_noti"];?></div></td>
        <td><div align="left" style="width:150px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;"><?php echo $row["type_noti"];?></div></td>
        <td><div align="left" style="width:150px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;"><?php echo $row["place_noti"];?></div></td>
        <td><div align="left" style="width:150px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;"><?php echo $row["name_noti"];?></div></td>
        <td><div align="left" style="width:50px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;text-align:center;">
        <?php if($row["status_noti"] == '1')
        {
          ?>
          <i class="fa fa-spinner fa-2x" style="color:orange" data-toggle="tooltip" data-placement="bottom" title="กำลังดำเนินการ"></i>
        <?php
      }else if($row["status_noti"] == '0')
      {?>
        <i class="fa fa-check-circle fa-2x" style="color:green" data-toggle="tooltip" data-placement="bottom" title="เสร็จสิ้น"></i> 
        <?php
      }else{
        ?>
        <i class="fa fa-wrench fa-2x" style="color:red" data-toggle="tooltip" data-placement="bottom" title="ส่งซ่อม"></i>
        <?php
      }?>
      </div></td>
        <td><div align="left" style="width:70px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;text-align:center;"><button type="button" class="btn btn-info btn-sm" onclick="showModal('<?php echo $row['id_noti']; ?>');"><i class="fa fa-user"></i></button></div></td>
        <td><div align="left" style="width:70px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;text-align:center;"><button type="button" class="btn btn-danger btn-sm" onclick="showModal2('<?php echo $row['id_noti']; ?>');"><i class="fa fa-user"></i></button></div></td>
      </tr>

      <?php
    }
    ?> 
  </table> 