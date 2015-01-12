/**
 * @author Sachith Punchihewa
 */

$(document).ready(function() {
	//=== static modals==========================================================================
	var dialog, dialog2, loading, reportForm, changePassword, changeAvatar, changeUserData;

	dialog = $('#singinForm').dialog({
		autoOpen : false,
		show : {
			effect : "blind",
			duration : 1000
		},
		hide : {
			effect : "explode",
			duration : 1000
		},
		height : 400,
		width : 350,
		modal : true,
	});
	//==========================================================================
	dialog2 = $('#singupForm').dialog({
		autoOpen : false,
		show : {
			effect : "blind",
			duration : 1000
		},
		hide : {
			effect : "explode",
			duration : 1000
		},
		height : 600,
		width : 400,
		modal : true,
	});

	var loading_div = '<div><img src="images/ajax_loader.gif"  style="width:304px;height:228px"></div>';
	loading = $(loading_div).dialog({
		autoOpen : false,
		height : 400,
		width : 400,
		modal : true,
	});

	//==============================================================================

	reportForm = $('#reportForm').dialog({
		autoOpen : false,
		show : {
			effect : "fadeIn",
			duration : 1000
		},
		hide : {
			effect : "fadeOut",
			duration : 1000
		},
		height : 400,
		width : 450,
		modal : true,
	});

	//=== end modals==========================================================================

	// initializing main function of the application========
	//============================================
	var beforeResult;

	var bindEvents = function() {
		//=========================================================
		$('#btnSubmitQuestion').unbind("click");
		$('#btnResetAns').bind("click", function() {
			$('#newAnswer').trigger("reset");

		});
		//=========================================================
		$('#btnSubmitQuestion').unbind("click");
		$('#btnCancelAns').bind("click", function() {
			viewQuesionLoad(questionID);
		});
		//=========================================================
		$('#btnSubmitQuestion').unbind("click");
		$('#btnSubmitAnswer').bind("click", clickOnPostAnswer);
		//=========================================================
		$('#btnSubmitQuestion').unbind("click");
		$('#btnReset').bind("click", function() {
			$('#newQuestion').trigger("reset");

		});
		//=========================================================
		$('#btnSubmitQuestion').unbind("click");
		$('#btnCancel').bind("click", function() {
			LoadPrevConternt();
		});
		//=========================================================
		$('#btnSubmitQuestion').unbind("click");
		$('#btnSubmitQuestion').bind("click", clickOnPostQuestion);
		//=========================================================
		$('.btnLikeQ').unbind("click");
		$('.btnLikeQ').click(function() {

			var questionID = $(this).attr('questionID');
			likeQuestion(questionID);
		});
		//=========================================================
		$('.btnDislikeQ').unbind("click");
		$('.btnDislikeQ').click(function() {
			var questionID = $(this).attr('questionID');
			dislikeQuestion(questionID);

		});
		//=========================================================
		$('.btnLikeA').unbind("click");
		$('.btnLikeA').click(function() {
			var answerID = $(this).attr('answerID');
			likeAnswer(answerID);
		});
		//=========================================================
		$('#btnPostAnswer').unbind("click");
		$('#btnPostAnswer').bind("click", postAnswerOnClick);
		//=========================================================
		$('.btnDislikeA').unbind("click");
		$('.btnDislikeA').click(function() {
			var answerID = $(this).attr('answerID');
			dislikeAnswer(answerID);
		});
		//=========================================================
		$('.reportThisQuestion').unbind("click");
		$('.reportThisQuestion').click(function() {
			var questionID = $(this).attr('questionID');
			var userID = $('#loggedUserID').text();
			$('#quectionIDforReport').text(questionID);
			$('#UserForReport').text(userID);
			reportForm.dialog('open');

			$('#btnclose').bind("click", function() {
				reportForm.dialog('close');
			});
			$('#btnreport').bind("click", function(e) {
				e.preventDefault();
				clickOnPostReport();
				reportForm.dialog('hide');
			});

		});

		//=========================================================
		$('.questionDiv').unbind("click");
		$('.questionDiv').click(function() {
			var questionID = $(this).attr('quectionid');
			if (questionID != "") {
				viewQuesionLoad(questionID);
			} else {
				toastr.error('The Question you are trying to view is currently unavailable');
			}
		});

		//========================== turn on editable =============
		$("#btnChangePassword").unbind("click");
		$("#btnChangePassword").click(function() {
			changePassword.dialog("open");
		});
		$("#btnEditUserProfile").unbind("click");
		$("#btnEditUserProfile").click(function() {
			changeUserData.dialog("open");
		});
		$("#btnChangeAvatar").unbind("click");
		$("#btnChangeAvatar").click(function() {
			changeAvatar.dialog("open");
		});

		$("#btnCancelUserData").unbind("click");
		$("#btnCancelUserData").click(function() {
			changePassword.dialog("close");
		});
		$("#btnCancelPassword").unbind("click");
		$("#btnCancelPassword").click(function() {
			changeUserData.dialog("close");
		});
		$("#btnCancelAvatar").unbind("click");
		$("#btnCancelAvatar").click(function() {
			changeAvatar.dialog("close");
		});
		//==================== bind modal key events================

		$("#btn-Something").unbind("click");
		$("#btn-Something").click(function(e) {
			e.preventDefault();
			$.ajax({
				type : "POST",
				url : "index.php/userController/changeAvatar",
				data : $('#editUserDataForm').serialize(),
				success : function(data, status) {
					changeAvatar.dialog("close");
					//need to get the questionid and load question view
					
					toastr.success('Your Avatar successfully changed');
				},
				error : function() {
					toastr.error('The avatar you provided is currupted or no a valid image file ');
				}
			});
		});
		$("#btnChangePasswordSubmit").unbind("click");
		$("#btnChangePasswordSubmit").click(function(e) {
			e.preventDefault();
			$.ajax({
				type : "POST",

				url : "index.php/userController/changePassword",
				data : $('#changePasswordForm').serialize(),
				success : function(data, status) {
					changePassword.dialog("close");
					//need to get the questionid and load question view
					toastr.success('Your Password successfully changed');
				},
				error : function() {
					toastr.error('Password Invalied');
				}
			});
		});
		$("#btnSaveUserData").unbind("click");
		$("#btnSaveUserData").click(function(e) {
			e.preventDefault();
			$.ajax({
				type : "POST",
				url : "index.php/userController/updateUser",
				data : $('#editUserDataForm').serialize(),
				success : function(data, status) {
					changeUserData.dialog("close");
					LoadConternt(data);
				},
				error : function() {
					toastr.error('The Oparation failed');
				}
			});

		});
		// to do avatar change
		//==========================================================

	};

	//=========================================================
	$('#userAvatar').click(function() {
		var user = $('#loggedUserID').text();
		$.ajax({
			type : "POST",
			url : "index.php/userController",
			data : {
				'userID' : user
			},
			success : function(data, status) {
				LoadConternt(data);
				//
				//==========================================================================
				changePassword = $('#changePassword').dialog({
					autoOpen : false,
					show : {
						effect : "blind",
						duration : 1000
					},
					hide : {
						effect : "explode",
						duration : 1000
					},
					height : 400,
					width : 450,
					modal : true,
				});

				//==========================================================================
				changeAvatar = $('#changeAvatar').dialog({
					autoOpen : false,
					show : {
						effect : "blind",
						duration : 1000
					},
					hide : {
						effect : "explode",
						duration : 1000
					},
					height : 400,
					width : 400,
					modal : true,
				});

				//==========================================================================
				changeUserData = $('#editUserData').dialog({
					autoOpen : false,
					show : {
						effect : "blind",
						duration : 1000
					},
					hide : {
						effect : "explode",
						duration : 1000
					},
					height : 350,
					width : 450,
					modal : true,
				});

				//==========================================================================
				bindEvents();
				//

			},
			error : function() {
				toastr.error('User Data is Not Availble please try again');
			}
		});
	});

	//=========================================================

	var LoadConternt = function(argument) {
		beforeResult = $('#bodyData').html();
		$('#bodyData').html(argument);
		$("#btnBack").show();
		var loggedUserName = $('#loggedUserID').text();
		if (loggedUserName == "") {
			$('.regUser').css('visibility', 'hidden');
		}
		bindEvents();
	};

	var LoadPrevConternt = function() {
		$('#bodyData').html(beforeResult);
		$("#btnBack").hide();
		bindEvents();

	};

	var loadCatalogs = function(id) {

		$.ajax({
			type : "POST",
			dataType : "json",
			url : "index.php/mainController/loadCatagory",
			success : function(data, status) {
				$.each(data, function(i, value) {
					$('#' + id).append($('<option>').text(value['name']).attr('value', value['catagoryId']));
				});
			},
			error : function() {
				toastr.error('Problem with your network connection occur');
			}
		});
	};

	//   View A Question ==========================================================================
	var viewQuesionLoad = function(data1) {
		$.ajax({
			type : "POST",
			url : "index.php/questionController/viewQuestion",
			data : {
				'questionID' : data1
			},
			success : function(data, status) {
				LoadConternt(data);

			},
			error : function() {
				toastr.error('The Question you are trying to view is currently unavailable');
			}
		});

	};

	//==========================================================================
	//  post a new answer ==========================================================================
	var clickOnPostAnswer = function() {
		$.ajax({
			type : "POST",
			dataType : "json",
			url : "index.php/answerController/postAnswer",
			data : $('#newAnswer').serialize(),
			success : function(data, status) {
				toastr.success('Posting Answer Successfull');
				//need to get the questionid and load question view
				viewQuesionLoad($('#idforQues').val());
			},
			error : function() {
				toastr.error('Unable to post your answer');
			}
		});
	};
	//==========================================================================
	//  click on report ================================================
	var clickOnPostReport = function() {
		$.ajax({
			type : "POST",
			url : "index.php/reportController/reportQuestion",
			data : $('#reportQuestionForm').serialize(),
			success : function(data, status) {
				toastr.success('Your Report is recorded');
				reportForm.dialog('close');
				//need to get the questionid and load question view
			},
			error : function() {
				toastr.error('The Report contain invaied infromation');
			}
		});
	};
	//==========================================================================

	// View Answer form ==========================================================================
	var postAnswerOnClick = function() {
		var questionID = $('#btnPostAnswer').attr('questionid');
		$.ajax({
			url : 'index.php/AnswerController/',
			data : {
				'questionID' : $('#btnPostAnswer').attr('questionid')
			},
			success : function(data) {
				LoadConternt(data);
				var userID = $('#loggedUserID').text();
				$('#idforUser').text(userID);
				$('#idforQues').text(questionID);
				$('#idforUser').val(userID);
				$('#idforQues').val(questionID);

			},
			error : function() {
				toastr.error('Internal server error');
			}
		});

	};
	//==========================================================================

	// posting a new Question ==========================================================================
	var clickOnPostQuestion = function() {

		var userID = $('#loggedUserID').text();
		$.ajax({
			type : "POST",
			dataType : "json",
			url : "index.php/questionController/postQuestion",
			data : $('#newQuestion').serialize(),
			success : function(data1, status) {
				if (data1 == null) {
					toastr.error('The Question you are trying post contain invalied data');
				} else {

					viewQuesionLoad(data1);
				}
			},
			error : function() {
				toastr.error('The Question you are trying post contain invalied data');
			}
		});
		return false;
	};
	//==========================================================================

	// load post new question from ==========================================================================
	var loadPostQuestionView = function() {

		$.ajax({
			url : 'index.php/QuestionController/',
			success : function(data) {
				LoadConternt(data);
				$('#userIDforQues').attr('value', $('#loggedUserID').text());

				//====================================//
				//=== Post Quection view Actions  ====//
				//====================================//
				loadCatalogs('cmbCatagory');

				//====================================
			},
			error : function() {
				toastr.error('The Question you are view is currently not available');
			}
		});

	};

	//==========================================================================

	// load question to the main page ==========================================

	//==========================================================================

	//logout
	var logoutFunction = function() {

		$.ajax({
			type : "POST",

			url : "index.php/auth/logout",
			success : function(data, status) {
				window.location.replace("");

				//$('.loggedIn').css('visibility', 'hidden');

				// //set the name and stuff  pUserName  pUserDetails
				//
				// $('.regUser').css('visibility', 'hidden');
				//
				// //change the buttons to logout
				// $('#loggedUserID').text('');
				// //
				// $('.logOut_link').remove();
				// $('#navBar').prepend('<a id="signin_link" class="signin_link"   ></a><a id="singUP" class=" signup_link navLinkpop"></a>');
				// dialog.dialog('close');
				//
				// $("a.signin_link").bind("click", function() {
				// dialog.dialog("open");
				// });
				// $("a.signup_link").bind("click", function() {
				// dialog2.dialog("open");
				// });

			},
			error : function(data) {
				toastr.error('logging out interrupted !');
			}
		});
	};
	//================= get question to main page =======
	var initQuestion = function(data, cat) {
		var query = "index.php/rest/init/" + data;
		if (cat != 0) {
			query = query + "/catalog/" + cat;
		}

		loading.dialog("open");
		$.ajax({
			type : "POST",
			dataType : "json",
			url : query,
			success : function(data, status) {
				loadQuestionList(data);
			},
			error : function() {
				toastr.error('The Questions you are trying post contain invalied data');
			},
			async : false
		});
	};

	//==========================================================================
	var likeQuestion = function(qId) {
		var userID = $('#loggedUserID').text();
		$.ajax({
			type : "POST",
			
			url : "index.php/questionController/like",
			data : {
				'userID' : userID,
				'questionID' : qId
			},
			success : function(data, status) {
				toastr.success('Voted Successfully');
			},
			error : function() {
				toastr.error('Voting Oparation Failed');
			}
		});

	};

	//==========================================================================

	var dislikeQuestion = function(qId) {
		var userID = $('#loggedUserID').text();
		$.ajax({
			type : "POST",
			
			url : "index.php/questionController/dislike",
			data : {
				'userID' : userID,
				'questionID' : qId
			},
			success : function(data, status) {
				toastr.success('Voted Successfully');
			},
			error : function() {
				toastr.error('Voting Oparation Failed');
			}
		});

	};

	//==========================================================================

	//==========================================================================
	var likeAnswer = function(Id) {
		var userID = $('#loggedUserID').text();
		$.ajax({
			type : "POST",
			
			url : "index.php/answerController/like",
			data : {
				'userID' : userID,
				'answerID' : Id
			},
			success : function(data, status) {
				toastr.success('Voted Successfully');
			},
			error : function() {
				toastr.error('Voting Oparation Failed');
			}
		});

	};
	//==========================================================================
	var dislikeAnswer = function(Id) {
		var userID = $('#loggedUserID').text();
		$.ajax({
			type : "POST",
			
			url : "index.php/answerController/dislike",
			data : {
				'userID' : userID,
				'answerID' : Id
			},
			success : function(data, status) {
				toastr.success('Voted Successfully');
			},
			error : function() {
				toastr.error('Voting Oparation Failed');
			}
		});

	};
	//==========================================================================
	//==========================================================================
	//==========================================================================
	//==========================================================================
	//==========================================================================
	//==========================================================================
	//==========================================================================
	//==========================================================================
	//==========================================================================
	var loadQuestionList = function(data) {

		$.ajax({
			type : "POST",
			data : {
				'data' : data
			},
			async : false,
			url : "index.php/mainController",
			success : function(datanew, statusnew) {
				LoadConternt(datanew);
			},
			error : function() {
				toastr.error('Search Engine is busy');
			}
		});
		loading.dialog("close");
		$("ul.pagination1").quickPagination();
		// setting up the user functions

		//hide logged user functions
		var loggedUserName = $('#loggedUserID').text();
		if (loggedUserName == "") {
			$('.regUser').css('visibility', 'hidden');
		}

	};
	//==========================================================================

	//navigation bar login and registation  button click events
	// ==========================================================================
	$("#btnSortDate").click(function() {
		$(".sortBox > .btn-warning").removeClass("btn-warning").addClass("btn-info");
		$("#btnSortDate").removeClass("btn-info").addClass("btn-warning");
		initQuestion('');
	});
	//==========================================================================

	// ==========================================================================
	$("#btnSortPopu").click(function() {
		$(".sortBox > .btn-warning").removeClass("btn-warning").addClass("btn-info");
		$("#btnSortPopu").removeClass("btn-info").addClass("btn-warning");
		initQuestion('pop');

	});
	//==========================================================================
	// ==========================================================================
	$("#btnSortRepu").click(function() {
		$(".sortBox > .btn-warning").removeClass("btn-warning").addClass("btn-info");
		$("#btnSortRepu").removeClass("btn-info").addClass("btn-warning");
		initQuestion('rep');
	});
	//==========================================================================

	// ==========================================================================
	$("a.signin_link").click(function() {
		dialog.dialog("open");
	});
	//==========================================================================
	$("a.signup_link").click(function() {
		dialog2.dialog("open");
	});
	//==========================================================================
	$("#btnCancelSignin").click(function() {
		dialog.dialog('close');
	});
	//==========================================================================
	$("#btnsignupCancel").click(function() {
		dialog2.dialog('close');
	});
	//==========================================================================
	$("#btnSigninToSignup").click(function() {
		dialog.dialog('close');
		dialog2.dialog("open");
	});
	//==========================================================================

	//==========================================================================
	// load quection posted by the user
	$("#btnMyQuestion").click(function() {
		var user = $('#loggedUserID').text();
		loading.dialog("open");
		$.ajax({
			type : "POST",
			dataType : "json",
			url : "index.php/rest/user/" + user,
			success : function(data, status) {
				loadQuestionList(data);
			},
			error : function() {
				toastr.error('Fetching User Question Failed');
			},
			async : false
		});

	});
	
	$("#btnReports").click(function() {
		toastr.error('There are no Reports Currently ... ');

	});
	
	//==========================================================================

	$("a.logOut_link").click(logoutFunction);

	//==========================================================================

	//login fuction

	$('#btnSubmitSignin').on('click', function(e) {
		e.preventDefault();
		$.ajax({
			type : $('#fromSingIn').attr('method'),
			dataType : "json",
			url : $('#fromSingIn').attr('action'),
			data : $('#fromSingIn').serialize(),
			success : function(data, status) {
				
				$('#loggedUserID').text(data['username']);
				$('.regUser').css('visibility', 'visible');
				$('.loggedIn').css('visibility', 'visible');
				//set the name and stuff  pUserName  pUserDetails
				//change the buttons to logout
				$('#pUserName').html(data['Rank'] + " " + data['UserName']);
				$('#pUserDetails').html("Points : " + data['Points']);
				$('#singUP').remove();
				$('#signin_link').unbind();
				$('#signin_link').switchClass("signin_link", "logOut_link");
				$('#signin_link').bind("click", logoutFunction);
				if (data['type'] == 1) {
					$('.superUser').hide();
				}else{
					
				}
				dialog.dialog('close');
			},
			error : function(data) {
				toastr.error('Login Failed, Try Again ! ');
			}
		});
		return false;
	});
	//

	//singup===================================================

	$('#btnsubmitImage').on('click', function(e) {
		e.preventDefault();
		var imgFile = document.getElementById('txtAvatar');
		if (imgFile.files && imgFile.files[0]) {

			var reader = new FileReader();
			reader.onload = function(event) {
				dataUri = event.target.result;
				if (imgFile.files[0].type.match('image.*')) {
					var imageUridata = dataUri.split(',');
					$('#txtImage').val(imageUridata[1]);
					$('#txtImage').text(imageUridata[1]);
					$('#btnsubmitImage').text("Valid Image");
				} else {
					dataUri = "";
					$('#btnsubmitImage').text("Invalid Image Resubmit");
				}
			};
			reader.onerror = function(event) {
				console.error("File could not be read! Code " + event.target.error.code);
			};
			reader.readAsDataURL(imgFile.files[0]);
		}

	});

	//post quection view appears
	$("#btnPostQuestion").click(loadPostQuestionView);

	// change the catalog;
	$('#cmbCatagoryHeader').change(function() {
		if ($('#cmbCatagoryHeader').val() == '0') {
			$("#btnSortDate").click();
		} else {
			initQuestion('', $('#cmbCatagoryHeader').val());
		}
	});
	//loading init question list of 20 ==
	//======================================
	initQuestion('', 0);
	//=======================================
	// page load funtion triggers
	loadCatalogs('cmbCatagoryHeader');
	//
	//navigation bar search option============================================
	$("#btnSearch").click(function() {
		var cat = $('#cmbCatagoryHeader').val();
		var data = $('#txtSearchText').val();
		var query = "index.php/rest/key/" + data;
		loading.dialog("open");
		$.ajax({
			type : "POST",
			dataType : "json",
			url : query,
			success : function(data, status) {
				loadQuestionList(data);
			},
			error : function() {
				toastr.error('Search Engine is busy');
			},
			async : false
		});

	});
	//=================================================================

	//====
	$("#btnBack").click(LoadPrevConternt);
	$("#btnBack").hide();
	//====

});

