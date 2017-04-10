<!DOCTYPE html>
<!-- content starts -->
<div class="panel panel-info">
	<div class="panel-heading">
		<span class="panel-title">เปลี่ยสถานะการซ่อมบรุง</span>
	</div>
	<div class="panel-body">
		<div class="row">

			<div class="col-md-12 col-md-offset-0" style="padding: 20px">

				<div class="form-group">
					<label for="sel1">กรุณาเลือกสถานะ :</label>
					<select class="form-control" id="status_form" name="status_form">
						<option value="1">กำลังดำเนินการ</option>
						<option value="0">ดำเนินการเสร็จสิ้น</option>
						<option value="2">ส่งซ่อม</option>
						
					</select>

				

					<input type="hidden" name="id_goods_status" id="id_goods_status" value="<?php echo $id_goods; ?>">
				</div>
		

			</div>

			<div class="col-md-4">

			</div>
		</div>
	</div>
</div>

