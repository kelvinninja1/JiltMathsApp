<!doctype html>
<html lang="en">

<head>
	<title>Home | JiltMaths - Learning app</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- <link rel="stylesheet" href="styles.css"> -->
  <link rel="manifest" href="src/includes/manifest.json">
  <meta name="theme-color" content="#ffffff" />

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="static/assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="static/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="static/assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="static/assets/vendor/metisMenu/metisMenu.css">
	<link rel="stylesheet" href="static/assets/vendor/toastr/toastr.min.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="static/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="static/assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="static/assets/img/apple-iconNew.png">
	<link rel="icon" type="image/png" sizes="96x96" href="static/assets/img/faviconNew.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu"></i></button>
				</div>
				<!-- logo -->
				<div class="navbar-brand">
					<a href="./">JiltMaths
            <!-- <img src="static/assets/img/logo.png" alt="DiffDash Logo" class="img-responsive logo"> -->
          </a>
				</div>
				<!-- end logo -->
				<div class="navbar-right">
					<!-- navbar menu -->
					<div id="navbar-menu">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
									<i class="lnr lnr-book"></i>
									<span class="notification-dot"></span>
								</a>
								<ul id="records-view" class="dropdown-menu notifications">

								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
									<i class="lnr lnr-cog"></i>
								</a>
								<ul class="dropdown-menu user-menu menu-icon">
									<li class="menu-heading"><i class="fa fa-fw fa-sliders"></i> MODE SETTINGS</li>

									<li class="interactive-view"><a><i class="fa fa-fw fa-bell"></i> <span class="text-primary">INTERACTIVE MODE</span> is active</a></li>
									<li class="interactive-view"><a><i class="fa fa-fw fa-lock"></i> <span>Make Studying fun by providing alert when answer a question right or wrong</span></a></li>
									<li class="interactive-view"><a><i class="fa fa-fw fa-sliders"></i> <span class="text-warning">Switch To:</span></a></li>
									<li class="menu-button interactive-view">
										<button onclick="changeMode('focus')" class="btn btn-success" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Make Studying more effective by allowing you to focus until you view Assessment." data-original-title="" title=""><i class="fa fa-edit"></i> FOCUS MODE</button>
									</li>

									<li class="focus-view"><a><i class="fa fa-fw fa-edit"></i> <span class="text-success">FOCUS MODE</span> is active</a></li>
									<li class="focus-view"><a><i class="fa fa-fw fa-lock"></i> <span>Make Studying more effective by allowing you to focus until you view Assessment</span></a></li>
									<li class="focus-view"><a><i class="fa fa-fw fa-sliders"></i> <span class="text-warning">Switch To:</span></a></li>

									<li class="menu-button focus-view">
										<button onclick="changeMode('interactive')" class="btn btn-primary" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Make Studying fun by providing alert when answer a question right or wrong." data-original-title="" title=""><i class="fa fa-bell"></i> INTERACTIVE MODE</button>
									</li>

									<li class="menu-heading">ACCOUNT SETTINGS</li>
									<li><a href="#"><i class="fa fa-fw fa-user"></i> <span class="student-name">Student</span></a></li>
									<li class="menu-button">
										<button onclick="resetAccount()" class="btn btn-danger" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="ALERT!!! By reseting your account, all Assessment Record will be reset as well. " data-original-title="" title=""><i class="fa fa-refresh"></i> RESET ACCOUNT</button>
									</li>
								</ul>
							</li>

						</ul>
					</div>
					<!-- end navbar menu -->
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="left-sidebar" class="sidebar">
			<button type="button" class="btn btn-xs btn-link btn-toggle-fullwidth">
				<span class="sr-only">Toggle Fullwidth</span>
				<i class="fa fa-angle-left"></i>
			</button>
			<div class="sidebar-scroll">
				<div class="user-account">
					<div class="dropdown">
						<a href="#" class="dropdown-toggle user-name" data-toggle="dropdown">Hello, <strong><span class="student-name">Student</span></strong> <i class="fa fa-caret-down"></i></a>
						<ul class="dropdown-menu dropdown-menu-right account">
							<li><a onclick="resetRecords()">Clear Records</a></li>
							<li class="divider"></li>
							<li><a onclick="resetAccount()">Reset Accounts</a></li>
						</ul>
					</div>
				</div>
				<nav id="left-sidebar-nav" class="sidebar-nav">
					<ul id="main-menu" class="metismenu">
						<li class=""><a href="./"><i class="lnr lnr-home"></i> <span>Home</span></a></li>
            <li class=""><a data-toggle="modal" data-target="#About-modal"><i class="lnr lnr-question-circle"></i> <span>About</span></a></li>
					</ul>
				</nav>
				<div id="Side-Assesment" style="padding: 30px; text-align: center;">

				</div>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN CONTENT -->
		<div id="main-content">

			<div id="main-contentArea" class="">
				<!-- homepage -->
				<img src="static/assets/img/lazyload.gif" alt="Loading..." class="img img-responsive img-fluid"/>
				<!-- quiz page -->
			</div>
			<!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#About-modal">Large modal</button>
			<br>
			<br> -->
			<div id="About-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
				<div class="modal-dialog modal-md" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">About JiltMaths</h4>
						</div>
						<div class="modal-body">
							<img src="static/assets/img/about.gif" alt="about" class="img img-responsive img-fluid"/>
							<div class="navbar-brand">
								<a href="./" class="text-larger">JiltMaths
			          </a>
							</div>
							<p>is a Web Application take on as a project by Kelvin, Phillip and Seth as an aptitude test for Jilt Technologies. We to provide an app which makes practicing basic maths as easy as it can be. You'll find out that it's quite unique from other websites and apps out there.</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
						</div>
					</div>
				</div>
			</div>

			<div id="startupModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<!-- <div class="modal-header">
						</div> -->
						<div class="modal-body">
							<center><img src="static/assets/img/welcome1.jpg" alt="welcome" class="img img-responsive img-fluid"/></center>
							<h2>Welcome to JiltMaths Study App. I'm here to help making studying for maths as easy as possible. <span class="text-larger text-primary"> Let's get started</span> </h2>
							<div class="margin-bottom-30"></div>
							<div class="margin-bottom-30"></div>

							<img src="static/assets/img/loader.gif" alt="ready" class="img img-responsive" style="height:15%;width:15%"/>

							<form class="search-form help-search-form">
								<input id="startupInput" name="studentInput" class="form-control" placeholder="How can I call You?" type="text">
								<button type="button" class="btn btn-default"><i class="fa fa-fw fa-user"></i></button>
								<label for="studentName">NB: Needed for Identifying you and your records. <br> Hence, personalizing your experience on JiltMaths</label>
							</form>
						</div>
						<div class="modal-footer">3
							<!-- <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button> -->
							<button type="button" onclick="registerAccount()" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-check-circle"></i> Get Started</button>
						</div>
					</div>
				</div>
			</div>

			<div id="assessModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
				<div class="modal-dialog modal-md" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">Assesment Sheet</h4>
						</div>
						<div class="modal-body"><center>
							<img id="assess-loader" src="static/assets/img/loader.gif" alt="about" class="img img-responsive mx-auto" style="height:30%;width:40%"/></center>

							<div id="sheet-heading" class="section-heading">

						  </div>
							<div id="sheet-body" class="section-body">

						  </div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
						</div>
					</div>
				</div>
			</div>

		</div>

		<!-- END MAIN CONTENT -->
		<div class="clearfix"></div>

		<footer>
			<p class="copyright">&copy; 2021 <a href="https://jiltMaths.hosted.buzz" target="_blank">JiltMaths</a>. All Rights Reserved.</p>
		</footer>
	</div>
	<!-- END WRAPPER -->

	<!-- Javascript -->

	<script src="static/assets/vendor/jquery/jquery.min.js"></script>
	<script src="static/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="static/assets/vendor/metisMenu/metisMenu.js"></script>
	<script src="static/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="static/assets/vendor/toastr/toastr.js"></script>
	<script src="static/assets/scripts/common.js"></script>
	<script src="src/includes/app.js"></script>
	<script src="src/includes/main.js"></script>
	<script>
	$(function() {
		toastr.options.timeOut = "500";
		toastr.options.closeButton = true;
		toastr.options.positionClass = 'toast-bottom-right';
		toastr['info']('Hi there, welcome back');

		$('.btn-toastr').on('click', function() {
			$context = $(this).data('context');
			$message = $(this).data('message');
			$position = $(this).data('position');

			if ($context === '') {
				$context = 'info';
			}

			if ($position === '') {
				$positionClass = 'toast-bottom-right';
			} else {
				$positionClass = 'toast-' + $position;
			}

			toastr.remove();
			toastr[$context]($message, '', {
				positionClass: $positionClass
			});
		});

		$('#toastr-callback1').on('click', function() {
			$message = $(this).data('message');

			toastr.options = {
				"timeOut": "300",
				"onShown": function() {
					alert('onShown callback');
				},
				"onHidden": function() {
					alert('onHidden callback');
				}
			};

			toastr['info']($message);
		});

		$('#toastr-callback2').on('click', function() {
			$message = $(this).data('message');

			toastr.options = {
				"timeOut": "10000",
				"onclick": function() {
					alert('onclick callback');
				},
			};

			toastr['info']($message);

		});

		$('#toastr-callback3').on('click', function() {
			$message = $(this).data('message');

			toastr.options = {
				"timeOut": "10000",
				"closeButton": true,
				"onCloseClick": function() {
					alert('onCloseClick callback');
				}
			};

			toastr['info']($message);
		});
	});
	</script>

	<div id="pages" class="d-none">
		<div id="homeView" class="">
			<!-- Select Questions -->
			<div id="homepage" class="container-fluid">
			  <div class="section-heading">
			    <h2 class="heading"><i class="fa fa-square"></i> Select level</h2>
			    <a href="#" class="right">Study with us from our library of random Multi Choice Questions</a>
			    <!-- <h1 class="page-title">Select level</h1> -->
			  </div>
			  <div id="home-panels" class="panel-content">
			    <!-- <strong>Message Context</strong> -->

			    <div class="row">
                    <?php
                    $levels = ['1','2','3','4','5','6'];

                    foreach ($levels as $level) {
                        $level_name = 'level'.$level;
                        ?>
                    <div class="col-md-6 col-sm-6">
                        <a href="#collapse<?=$level_name?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardMaths">
                            <div class="number-chart">
                                <!-- <div class="mini-stat">
                                  <div id="" class="">level</div>
                                </div> -->
                                <div class="number"><span>Level <?= $level ?> Mathematics</span><span>Questions 10 - 20</span></div>
                                <p class="text-muted"><i class="fa fa-pencil text-success"></i> Multi Choice Questions (MCQs)</p>
                                <!-- Collapsable Card Example -->
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <!-- <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample"> -->
                                    <h4 class="m-0 font-weight-bold text-primary">Get Started</h4>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse" id="collapse<?=$level_name?>">
                            <div class="card-body m-3 ml-3 mr-3 row">
                                <div class="col-md-2 col-sm-1 col-xs-1">

                                </div>
                                <div class="col-md-8 col-sm-10 col-xs-10">
                                    <label for="">Select Question</label>

                                    <form class="form-group" action="index.php" method="post">
                                        <select id="<?=$level_name?>-QNs" class="form-control ml-3 mr-3" required>
                                            <optgroup label="Questions">
                                                <option value="10">10 Questions</option>
                                                <option value="20">20 Questions</option>
                                            </optgroup>
                                        </select>
                                        <button id="<?=$level_name?>-btn" type="button" name="button" class="btn btn-primary btn-block study" onclick="study('<?=$level?>')" level="<?=$level?>">Study</button>
                                    </form>
                                    <strong>NB: </strong>
                                    Something probably <strong>important</strong> about the level!
                                </div>
                                <div class="col-md-2 col-sm-1 col-xs-1">

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
              </div>
                    <?php

                    }

                    ?>
			    </div>

			  </div>
			</div>
			<!-- End of Select Questions -->
		</div>

		<div id="quizView" class="">
			<!--  Questions & Answers-->
			<div class="container-fluid">
			  <div class="section-heading">
			    <center><h2 class="heading"><i class="fa fa-edit"></i> <span id="level-header">level - Year</span> </h2></center>
			    <a id="level-notice" href="#" class="right"> Instructions students need to follow</a>

			    <!-- <h1 class="page-title">Select level</h1> -->
			  </div>
			  <!-- ACCORDION -->
			  <div class="panel-content">
			    <h2 class="heading"><i class="fa fa-square"></i>Multi Choice Questions (MCQs):</h2>

			    <p id="objectives-instructions" >Instructions students need to follow</p><br/>
			    <div class="panel-group" id="main-area">

			    </div>
			    <div class="margin-bottom-30"></div>

			  </div>
			  <!-- END ACCORDION -->

			</div>
			<!-- End of Questions & Answers -->
		</div>
	</div>

</body>

</html>
