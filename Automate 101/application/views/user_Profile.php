<?php
//include 'header.php';
?>

<div id="editUserData" style="display: none;" >
	<form class="form-horizontal" id="editUserDataForm">
		<fieldset>

			<!-- Form Name -->
			<legend>
				Edit Your Personal Infromation
			</legend>
			<input id="userID" name="userID" value = "<?php
            echo $userName;
			?>" class="form-control input-md" type="text" style="display: none;">

			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-3 control-label" for="txtFnameEdit">First Name</label>
				<div class="col-md-7">
					<input id="txtFnameEdit" name="txtFnameEdit" placeholder="<?php
                    echo $fName;
					?>" class="form-control input-md" type="text">

				</div>
			</div>

			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-3 control-label" for="txtLnameEdit">Last Name</label>
				<div class="col-md-7">
					<input id="txtLnameEdit" name="txtLnameEdit" placeholder="<?php
                    echo $lName;
					?>" class="form-control input-md" type="text">

				</div>
			</div>

			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-3 control-label" for="txtEmailEdit">E mail</label>
				<div class="col-md-7">
					<input id="txtEmailEdit" name="txtEmailEdit" placeholder="<?php
                    echo $email;
					?>" class="form-control input-md" type="text">

				</div>
			</div>

			<!-- Button (Double) -->
			<div class="form-group">
				<label class="col-md-3 control-label" for="btnSaveUserData"></label>
				<div class="col-md-8">
					<button id="btnSaveUserData" name="btnSaveUserData" class="btn btn-success">
						Submit
					</button>
					<button id="btnCancelUserData" name="btnCancelCancelUserData" class="btn btn-danger">
						Cancel
					</button>
				</div>
			</div>

		</fieldset>
	</form>

</div>

<div id="changePassword" style="display: none;" >
	<form class="form-horizontal" id="changePasswordForm">
		<fieldset>

			<!-- Form Name -->
			<legend>
				Change Password
			</legend>
			<input id="userID" name="userID" value = "<?php
            echo $userName;
			?>" class="form-control input-md" type="text" style="display: none;">

			<!-- Password input-->
			<div class="form-group">
				<label class="col-md-3 control-label" for="txtCurrentPasswordEdit">Current Password</label>
				<div class="col-md-7">
					<input id="txtCurrentPasswordEdit" name="txtCurrentPasswordEdit" placeholder="" class="form-control input-md" type="password">

				</div>
			</div>

			<!-- Password input-->
			<div class="form-group">
				<label class="col-md-3 control-label" for="txtNewPasswordEdit">New Password</label>
				<div class="col-md-7">
					<input id="txtNewPasswordEdit" name="txtNewPasswordEdit" placeholder="" class="form-control input-md" type="password">

				</div>
			</div>

			<!-- Password input-->
			<div class="form-group">
				<label class="col-md-3 control-label" for="txtConfirmNewPasswordEdit">Confirm Password</label>
				<div class="col-md-7">
					<input id="txtConfirmNewPasswordEdit" name="txtConfirmNewPasswordEdit" placeholder="" class="form-control input-md" type="password">

				</div>
			</div>

			<!-- Button (Double) -->
			<div class="form-group">
				<label class="col-md-3 control-label" for="btnChangePassword"></label>
				<div class="col-md-8">
					<button id="btnChangePasswordSubmit" name="btnChangePasswordSubmit" class="btn btn-success">
						Submit
					</button>
					<button id="btnCancelPassword" name="btnCancelPassword" class="btn btn-danger">
						Cancel
					</button>
				</div>
			</div>

		</fieldset>
	</form>

</div>

<div id="changeAvatar" style="display: none;" >
	<form class="form-horizontal" id="changeAvatarForm">
		<fieldset>

			<!-- Form Name -->
			<legend>
				Change Your Avatar
			</legend>
			<input id="userID" name="userID" value = "<?php
            echo $userName;
			?>" class="form-control input-md" type="text" style="display: none;">

			<!-- File Button -->
			<div class="form-group">
				<label class="col-md-4 control-label" for="txtAvatarEdit">Avatar</label>
				<div class="col-md-4">
					<input id="txtAvatarEdit" name="txtAvatarEdit" class="input-file" type="file">
				</div>
			</div>

		</fieldset>
	</form>
	<div class="row" >
		<div class="col-md-12 column">

		</div>
	</div>
</div>

<div class="row clearfix">
<div class="col-md-12 column">
<div class="row clearfix">
<div class="col-md-8 column">
<table class="table">

<tbody>
<tr class="success">

<td> First Name </td>
<td> <?php
echo $fName;
?></td>

</tr>
<tr class="">

<td> Last Name </td>
<td> <?php
echo $lName;
?> </td>
</tr>
<tr class="success">

<td> E-Mail </td>
<td>  <?php
echo $email;
?></td>

</tr>
<trclass="danger">
<td></td>
</tr>

<tr class="danger">
<td> <button id="btnChangePassword" type="button" class="btn btn-danger ">Change Password</button> </td>
<td> <button id="btnEditUserProfile" type="button" class="btn btn-warning ">Edit User Profile</button> </td>
</tr>

</tbody>
</table>
</div>
<div class="col-md-4 column">
<img class="img-circle" width="200" height="200" src="data:image/png;base64,<?php echo $avatar; ?>" >
<td> <button id="btnChangeAvatar" type="button" class="btn btn-warning btn-lg">Change Avatar</button> </td>
</div>
</div>
</div>

<?php
//include 'header.php';
?>