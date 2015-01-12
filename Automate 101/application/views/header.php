<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Automate 101 </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link type="text/css" href="styles/reset.css" rel="stylesheet" media="all" />
		<link type="text/css" href="styles/text.css" rel="stylesheet" media="all" />
		<link type="text/css" href="styles/960.css" rel="stylesheet" media="all" />
		<link type="text/css" href="styles/style.css" rel="stylesheet" media="all" />
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="css/jquery-ui.min.css" rel="stylesheet" media="all" />
		<link type="text/css" href="css/toastr.min.css" rel="stylesheet" media="all" />

		
		<!-- <script type="text/javascript" src="js/bootstrap-modal-popover.js"></script> -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript"  src="js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="js/jquery.quick.pagination.min.js"></script>
		<script type="text/javascript"  src="js/toastr.min.js"></script>
		<script type="text/javascript"  src="js/scripts.js"></script>
		
	</head>
	<body>
		<p id='loggedUserID' style="display: none;"><?php echo $username; ?></p>
		<div id="advancedSearch" style="display: none;">
		   <form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Advanced Search</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtQeusTitle">Question Title</label>  
  <div class="col-md-5">
  <input id="txtQeusTitle" name="txtQeusTitle" placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtQeusSum">Question Summery</label>  
  <div class="col-md-5">
  <input id="txtQeusSum" name="txtQeusSum" placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtKeyWord">KeyWord</label>  
  <div class="col-md-5">
  <input id="txtKeyWord" name="txtKeyWord" placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="btnAdvancedSearch"></label>
  <div class="col-md-8">
    <button id="btnAdvancedSearch" name="btnAdvancedSearch" class="btn btn-primary">Search</button>
    <button id="btnCancelSearch" name="btnCancelSearch" class="btn btn-danger">Cancel</button>
  </div>
</div>

</fieldset>
</form>
 
		</div>
		
		
		<div id="reportForm" >
		  <form id ="reportQuestionForm" action="#" class="form-horizontal">
            <fieldset>

            <!-- Form Name -->
            <legend>Report this question</legend>

            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="reportoption">This Question is :</label>
              <div class="col-md-8">
                <select id="reportoption" name="reportoption" class="form-control">
                  <option value="1">Not Relavent To Automation</option>
                  <option value="2">Insulting to a Individual or a Product</option>
                  <option value="3">Contains abusive language </option>
                  
                </select>
              </div>
            </div>
            <textarea class="form-control input-md" id="quectionIDforReport" style="display: none;" name="reportQues"></textarea>
            <textarea class="form-control input-md" id="UserForReport" style="display: none;" name="reportingUser"></textarea>
            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="textarea">Your Comment : </label>
              <div class="col-md-8">                     
                <textarea class="form-control input-md" id="reportsum" name="reportsum"></textarea>
              </div>
            </div>
            </form>
            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="singlebutton"> </label>
              <div class="col-md-8">
                <button id="btnreport" name="btnreport" class="btn btn-success btn-block">Report</button>
              </div>
            </div>

            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="singlebutton"></label>
              <div class="col-md-8">
                <button id="btnclose" name="btnClose" class="btn btn-danger btn-block ">Cancel</button>
              </div>
            </div>
            
            </fieldset>
            
              
		</div>
		
		
		<div id='singinForm' style="display: none;">
			<form id="fromSingIn" data-async role="form" action="index.php/auth/authenticate" method="POST" >
				<div class="form-group" >
					<label for="txtUsrName">Username</label>
					<input class="form-control" id="txtUsrName" name="txtUsrName"  type="text" />
				</div>
				<div class="form-group">
					<label for="txtPassword">Password</label>
					<input class="form-control" id="txtPassword" name="txtPassword" type="password" />
					<a href="" class="text-right">Forgot password</a>
				</div>
				<button id="btnSubmitSignin" type="submit" class="btn btn-success btn-block">
					Sign In
				</button>

			</form>
			<button id ="btnCancelSignin" type="buttom" class="btn btn-danger btn-block">
				Cancel
			</button>
			</br>
			<label >For new users:</label>
			<button id ="btnSigninToSignup" type="buttom" class="btn btn-primary btn-block">
				Sing Up
			</button>
		</div>
		<div id='singupForm' style="display: none;">
			<form id="formsingupForm" role="form" action="index.php/auth/register" method="POST" >
				<div class="form-group">
					<label for="txtEmail">Email address</label>
					<input class="form-control" id="txtEmail" name="txtEmail" type="email" />
				</div>
				<div class="form-group">
					<label for="txtUserName">Username</label>
					<input class="form-control" id="txtUserName" name="txtUserName" type="text" />
				</div>
				<div class="form-group">
					<label for="txtFName">First Name</label>
					<input class="form-control" id="txtFName" name="txtFName" type="text" />
				</div>
				<div class="form-group">
					<label for="txtLName">Last Name</label>
					<input class="form-control" id="txtLName" name="txtLName" type="text" />
				</div>
				<div class="form-group">
					<label for="txtPasswordNew">Password</label>
					<input class="form-control" id="txtPasswordNew" name="txtPasswordNew" type="password" />
				</div>
				<div class="form-group">
					<label for="txtConfPasswordNew">Confirm Password</label>
					<input class="form-control" id="txtConfPasswordNew" name="txtConfPasswordNew" type="password" />
				</div>
				<div class="form-group">
					<label for="txtAvatar">Avatar</label>
					<input id="txtAvatar" name="txtAvatar" type="file" />
					<input id="txtImage" name="txtImage" type="text" style="visibility: hidden;"/>
					<button id="btnsubmitImage" type="buttom" class="btn btn-default btn-block">
                    Submit Image
                    </button>
					<p class="help-block">
						Chose a avatar for your profile from your pc
					</p>
				</div>
				<button id="btnsignupSubmit" type="submit" class="btn btn-primary btn-block">
					Sign Up
				</button>

			</form>
			<button id="btnsignupCancel" type="buttom" class="btn btn-danger btn-block">
				Cancel
			</button>
		</div>

		<!-- sub main -->
		<div class="container ">
			<div class="header_cotainer col-md-12 column ">
				<div class="container_12">
					<div class="grid_3">

					</div>
					<div class="grid_9 pull-right" align="right">
						<div id ="navBar" class="menu_items">
							<?php

                            if ($isLoggedIn == 'NO') {
                                echo '<a align="right" id="signin_link" class="signin_link"   ></a><a align="right" id="singUP" class=" signup_link navLinkpop"    ></a>';
                            } else {
                                echo '<a align="right" id="signin_link" class="logOut_link"  ></a>';
                            }
							?>

							<!--<a id="signIN" class="signin"   ></a><a id="signUP" class="signup"    ></a> -->
							<div class="search" align="right">
								<input id="txtSearchText" type="text" name="search" />
								<input id="btnSearch" type="submit" name="submit" value="Search" />
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row ">
				<div class="col-md-12 column"   >

					<div class="col-md-4 column">
						<img class = "img_responsive"  src="images/AWT_Logo.png" />
					</div>
					<div class="col-md-8 column" >
						<div class="row regUser">
							<div class="col-md-5 column col-md-offset-7">
								<p id = "pUserName" class="lead text-left loggedIn"<?php

                                if ($isLoggedIn == 'NO') {
                                    echo 'style="visibility: hidden"';
                                }
								?> >
									<?php echo $rank . " " . $userName; ?>
								</p>
							</div>

						</div>
						<div class="row regUser"<?php

                        if ($isLoggedIn == 'NO') {
                            echo 'style="visibility: hidden"';
                        }
						?>>
							<div class="col-md-3 column  loggedIn">
								<button id="btnPostQuestion" type="button" class="btn btn-primary btn-lg btn-block">
									Post A Question
								</button>
							</div>
							<div class="col-md-3 column  loggedIn">
								<button  id="btnMyQuestion" type="button" class="btn btn-block btn-lg btn-primary">
									My Questions
								</button>
							</div>
							<div class="col-md-1 column  loggedIn superUser" <?php
                                if ($type != 2 ) {
                                    echo 'style="visibility: hidden"';
                                }
                        ?> >
                                <button  id="btnReports" type="button" class="btn btn-block  btn-danger">
                                    !
                                </button>
                            </div>
							<div class="col-md-5 column " >
								<div class="row  loggedIn ">
									<div id="userAvatar" class="col-md-6 column"><img class="img-circle"  height="140" width="140"  src="data:image/png;base64,<?php echo $avatar; ?>" />
									</div>
									<div class="col-md-6 column">
										<p id="pUserDetails" class="lead text-center" >
											<?php

											if (!($isLoggedIn == 'NO') ){
											echo 'Points :'.$points;
											} else
											?>
										</p>
									</div>
								</div>

							</div>
						</div>
						</br>
						<div class="row ">
							<div class="col-md-4 column">
								<div class="row ">
									<div class="col-md-3 column">
										<p class="lead" >
											Filter:
										</p>
									</div>
									<div class="col-md-9 column">
										<select id ="cmbCatagoryHeader" class="form-control">
											<option value="0">All Catagories</option>

										</select>
									</div>
								</div>
							</div>
							<div class="col-md-5 column col-md-offset-3 " >
								<div class="col-md-2 column">
									<p class="lead" >
										Sort:
									</p>
								</div>
								<div class="col-md-10 column sortBox">
									<button id="btnSortDate" type="button" class=" btn btn-warning btn-xs">
										Date
									</button>
									<button id="btnSortPopu" type="button" class=" btn btn-info btn-xs">
										Pupularity
									</button>
									<button id="btnSortRepu" type="button" class="btn btn-info btn-xs">
										Reputation
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
