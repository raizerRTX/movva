<?php
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `drivers_list` where id = '{$_GET['id']}' ");
    $qry2 = $conn->query("SELECT * from `drivers_meta` where driver_id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
	if($qry2->num_rows > 0){
        while($row = $qry2->fetch_assoc()){
            	${$row['meta_field']}=$row['meta_value'];
        }
    }
}
?>

<style>
	img#cimg{
		height: 25vh;
		width: 15vw;
		object-fit: scale-down;
		object-position: center center;
	}
</style>
<div class="card card-outline card-info">
	<div class="card-header">
		<h3 class="card-title"><?php echo isset($id) ? "Update ": "Create New " ?> driver</h3>
	</div>
	<div class="card-body">
		<form action="" id="driver-form">
			<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
			<div class="row">
				<div class="col-6">
				<!---
					<div class="form-group">
						<label for="age" class="control-label">License No.</label>
						<input type="text" maxlength="50" class="form-control form" required name="age" />//////value="<?php echo isset($age) ? $age : '' ?>">
						
					</div>
					--->
					<div class="form-group">
						<label for="lastname" class="control-label">Last Name</label>
						<input type="text" class="form-control form" required name="lastname" value="<?php echo isset($lastname) ? $lastname : '' ?>">
					</div>
					<div class="form-group">
						<label for="firstname" class="control-label">First Name</label>
						<input type="text" class="form-control form" required name="firstname" value="<?php echo isset($firstname) ? $firstname : '' ?>">
					</div>
					<div class="form-group">
						<label for="middlename" class="control-label">Middle Name</label>
						<input type="text" class="form-control form" name="middlename" value="<?php echo isset($middlename) ? $middlename : '' ?>">
					</div>
					<div class="form-group">
						<label for="dob" class="control-label">DOB</label>
						<input type="date" class="form-control form" required name="dob" value="<?php echo isset($dob) ? date("Y-m-d",strtotime($dob)) : '' ?>">
					</div>
					<div class="form-group">
						<label for="present_address" class="control-label">Present City</label>
						<select name="present_city" id="present_city" class="custom-select select2">
						<option <?php echo (isset($present_city) && $present_city == 'City') ? 'selected' : '' ?>></option>
							<option <?php echo (isset($present_city) && $present_city == 'Caloocan City') ? 'selected' : '' ?>>Caloocan City</option>
							<option <?php echo (isset($present_city) && $present_city == 'Malabon City') ? 'selected' : '' ?>>Malabon City</option>
							<option <?php echo (isset($present_city) && $present_city == 'Navotas City') ? 'selected' : '' ?>>Navotas City</option>
							<option <?php echo (isset($present_city) && $present_city == 'Valenzuela City') ? 'selected' : '' ?>>Valenzuela City</option>
							<option <?php echo (isset($present_city) && $present_city == 'Quezon City') ? 'selected' : '' ?>>Quezon City</option>
							<option <?php echo (isset($present_city) && $present_city == 'Marikina City') ? 'selected' : '' ?>>Marikina City</option>
							<option <?php echo (isset($present_city) && $present_city == 'Pasig City') ? 'selected' : '' ?>>Pasig City</option>
							<option <?php echo (isset($present_city) && $present_city == 'Taguig City') ? 'selected' : '' ?>>Taguig City</option>
							<option <?php echo (isset($present_city) && $present_city == 'Makati City') ? 'selected' : '' ?>>Makati City</option>
							<option <?php echo (isset($present_city) && $present_city == 'Manila City') ? 'selected' : '' ?>>Manila City</option>
							<option <?php echo (isset($present_city) && $present_city == 'Mandaluyong City') ? 'selected' : '' ?>>Mandaluyong City</option>
							<option <?php echo (isset($present_city) && $present_city == 'San Juan City') ? 'selected' : '' ?>>San Juan City</option>
							<option <?php echo (isset($present_city) && $present_city == 'Pasay City') ? 'selected' : '' ?>>Pasay City</option>
							<option <?php echo (isset($present_city) && $present_city == 'Paranaque City') ? 'selected' : '' ?>>Paranaque City</option> 
							<option <?php echo (isset($present_city) && $present_city == 'Las Pinas City') ? 'selected' : '' ?>>Las Pinas City</option>
							<option <?php echo (isset($present_city) && $present_city == 'Muntinlupa City') ? 'selected' : '' ?>>Muntinlupa City</option>
							<option <?php echo (isset($present_city) && $present_city == 'Pateros') ? 'selected' : '' ?>>Pateros</option>
						</select>
					</div>
					<div class="form-group">
						<label for="permanent_address" class="control-label">Permanent Address</label>
						<textarea rows="3" class="form-control" style="resize:none" required name="permanent_address"><?php echo isset($permanent_address) ? $permanent_address : '' ?></textarea>
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label for="sex" class="control-label">Sex</label>
						<div class="form-group">
					<input type="radio" name="sex"<?php if (isset($sex) && $sex=="female") echo "checked";?>value="female"> Female <input type="radio" name="sex"<?php if (isset($sex) && $sex=="male") echo "checked";?>value="male"> Male 
					</div>
					<div class="form-group">
						<label for="age" class="control-label">Age</label>
						<input type="number" class="form-control form" required name="age" value="<?php echo isset($age) ? $age : '' ?>">
					</div>
					<div class="form-group">
						<label for="contact" class="control-label">Contact Number</label>
						<input type="number" maxlength="13" class="form-control form" required name="contact" value="<?php echo isset($contact) ? $contact : '' ?>">
					</div>
					<div class="form-group">
						<label for="license_type" class="control-label">License Type</label>
						<select name="license_type" id="license_type" class="custom-select select2">
							<option <?php echo (isset($license_type) && $license_type == 'Student') ? 'selected' : '' ?>>Student</option>
							<option <?php echo (isset($license_type) && $license_type == 'Non-Professional') ? 'selected' : '' ?>>Non-Professional</option>
							<option <?php echo (isset($license_type) && $license_type == 'Professional') ? 'selected' : '' ?>>Professional</option>
						</select>
					</div>
					<div class="form-group">
						<label for="" class="control-label">Photo</label>
						<div class="custom-file">
						<input type="hidden" name="image_path" value="<?php echo isset($image_path) ? $image_path : '' ?>">
						<input type="file" class="custom-file-input rounded-circle" id="customFile" name="img" onchange="displayImg(this,$(this))">
						<label class="custom-file-label" for="customFile">Choose file</label>
						</div>
					</div>
					<div class="form-group d-flex justify-content-center">
						<img align="center" src="<?php echo validate_image(isset($image_path) ? $image_path : '') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
					</div>
				</div>
			</div>
			
		</form>
	</div>
	<div class="card-footer">
		<button class="btn btn-flat btn-primary" form="driver-form">Save</button>
		<a class="btn btn-flat btn-default" href="?page=drivers">Cancel</a>
	</div>
</div>
<script>
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        	_this.siblings('.custom-file-label').html(input.files[0].name)
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$(document).ready(function(){
		$('#driver-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_driver",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						location.href = "./?page=drivers";
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body").animate({ scrollTop: _this.closest('.card').offset().top }, "fast");
                            end_loader()
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
                        console.log(resp)
					}
				}
			})
		})
	})
</script>