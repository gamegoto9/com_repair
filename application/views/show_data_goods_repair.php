<!DOCTYPE html>
<!-- content starts -->
<div class="panel panel-info">
	<div class="panel-heading">
		<span class="panel-title">ข้อมูลการส่งซ่อม</span>
	</div>
	<div class="panel-body">
		<div class="row">

			<div class="col-md-12 col-md-offset-0" style="padding: 20px">


				<li class="thumbnail">
					<center>
						<br>

						<img src="<?php echo $data_img['image']; ?>" class="thumbnail" style="width: 100%; height: 450px;">
						
					</center>
				</li>

				<br>
				<div class="panel panel-success">
					<div class="panel-heading">ข้อมูลการส่งซ่อม
					</div>

					<table class="table table-bordered table-striped table-condensed">

						<tbody>
							<?php
							
							foreach ($data as $row) {
								?>
								<tr>
									<td width="250"><span class="thsarabunnew">ผู้แจ้งซ่อม :</span></td>
									<td callspan="3"><span class="thsarabunnew"><?PHP echo $row['name_noti']; ?></span></td>
								</tr>
								<tr>
									<td><span class="thsarabunnew">อีเมลล์ :</span></td>
									<td callspan="3"><span class="thsarabunnew"><?PHP echo $row['email_noti']; ?></span></td>
								</tr>
								<tr>
									<td><span class="thsarabunnew">เบอร์โทรติดต่อ :</span></td>
									<td callspan="3"><span class="thsarabunnew"><?PHP echo $row['tel_noti']; ?></span></td>
								</tr>

								<tr>
									<td><span class="thsarabunnew">ปี-เดือน-วัน ที่แจ้ง :</span></td>
									<td callspan="3"><span class="thsarabunnew"><?PHP echo $row['date_noti']; ?></span></td>
								</tr>

								<tr>
									<td><span class="thsarabunnew">ประเภท :</span></td>
									<td callspan="3"><span class="thsarabunnew"><?PHP echo $row['type_noti']; ?></span></td>
								</tr>
								<tr>
									<td><span class="thsarabunnew">รายละอียด :</span></td>
									<td callspan="3"><span class="thsarabunnew"><?PHP echo $row['desc_type_noti']; ?></span></td>
								</tr>
								
								
								<tr>
									<td><span class="thsarabunnew">สถานที่ :</span></td>
									<td callspan="3"><span class="thsarabunnew"><?PHP echo 'ตึก '.$row['place_noti'].' ชั้น '.$row['place_building_noti'].' ห้อง '.$row['place_room_noti'];?> </span></td>
								</tr>
								<tr>
									<td><span class="thsarabunnew">หมายเลขครุภัณฑ์ Passport Number :</span></td>
									<td callspan="3"><span class="thsarabunnew"><?PHP echo $row['id_goods']; ?></span></td>
								</tr>
								<tr>
									<td><span class="thsarabunnew">ปัญหาที่พบ :</span></td>
									<td callspan="3"><span class="thsarabunnew"><?PHP echo $row['subject_noti']; ?></span></td>
								</tr>
								<tr>
									<td><span class="thsarabunnew">รายละเอียดเพิ่มเติม :</span></td>
									<td callspan="3"><span class="thsarabunnew"><?PHP echo $row['desc_noti']; ?></span></td>
								</tr>
								
								<tr>
									<td><span class="thsarabunnew">เอกสารที่เกี่ยวข้อง :</span></td>
									<td callspan="3"><a class="btn btn-danger" href='http://crruinter.crru.ac.th/student/detial/<?PHP echo $row['std_id']; ?>.pdf' target="_blank">View</a></td>
								</tr>

								

								<?php
							}
							?>
						</tbody>
					</table> 

				</div>

			</div>

			<div class="col-md-4">

			</div>
		</div>
	</div>
</div>

