<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Time Recorder System Online using fringerprint scanner</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/logo-nav.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #3333;
		}

		li {
			float: left;
		}

		li a, .dropbtn_1 {
			display: inline-block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		li a:hover, .dropdown_1:hover .dropbtn_1 {
			background-color: #01adfd;
		}

		li.dropdown_1 {
			display: inline-block;
		}

		.dropdown-content_1 {
			display: none;
			position: absolute;
			background-color: #f9f9f9;
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		}

		.dropdown-content_1 a {
			color: black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
			text-align: left;
		}

		.dropdown-content_1 a:hover {background-color: #00fe06}

		.dropdown_1:hover .dropdown-content_1 {
			display: block;
		}
	</style>
	<style>
	ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #3333;
	}

	li {
		float: left;
	}

	li a, .dropbtn_2 {
		display: inline-block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}

	li a:hover, .dropdown_2:hover .dropbtn_2 {
		background-color: #01adfd;
	}

	li.dropdown_2 {
		display: inline-block;
	}

	.dropdown-content_2 {
		display: none;
		position: absolute;
		background-color: #f9f9f9;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	}

	.dropdown-content_2 a {
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
		text-align: left;
	}

	.dropdown-content_2 a:hover {background-color: #00fe06}

	.dropdown_2:hover .dropdown-content_2 {
		display: block;
	}
	</style>
		<style>
		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #3333;
		}

		li {
			float: left;
		}

		li a, .dropbtn_3 {
			display: inline-block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		li a:hover, .dropdown_3:hover .dropbtn_3 {
			background-color: #01adfd;
		}

		li.dropdown_3 {
			display: inline-block;
		}

		.dropdown-content_3 {
			display: none;
			position: absolute;
			background-color: #f9f9f9;
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		}

		.dropdown-content_3 a {
			color: black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
			text-align: left;
		}

		.dropdown-content_3 a:hover {background-color: #00fe06}

		.dropdown_3:hover .dropdown-content_3 {
			display: block;
		}
	</style>
	<style>
	ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #3333;
	}

	li {
		float: left;
	}

	li a, .dropbtn_4 {
		display: inline-block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}

	li a:hover, .dropdown_4:hover .dropbtn_4 {
		background-color: #01adfd;
	}

	li.dropdown_4 {
		display: inline-block;
	}

	.dropdown-content_4 {
		display: none;
		position: absolute;
		background-color: #f9f9f9;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	}

	.dropdown-content_4 a {
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
		text-align: left;
	}

	.dropdown-content_4 a:hover {background-color: #00fe06}

	.dropdown_4:hover .dropdown-content_4 {
		display: block;
	}
	</style>

<script language="JavaScript">
	   var HttPRequest = false;

	   function doCallAjax(Sort) {
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
		  
		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }
	
			var url = 'check_load_time.php';
			var pmeters = 'mySort='+Sort;
			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{

				 if(HttPRequest.readyState == 3)  // Loading Request
				  {
				   document.getElementById("mySpan").innerHTML = "Now is Loading...";
				  }

				 if(HttPRequest.readyState == 4) // Return Request
				  {
				   document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
				  }
				
			}

	   }
</script>
</head>

<body Onload="bodyOnload();">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--a class="navbar-brand" href="admin_page.php">
                    <center><img src="images/logo_1.png" alt=""></center>
					 
                </a-->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul>
					<li class="dropdown_1">
					<a href="#" class="dropbtn_1">Index</a>
						<div class="dropdown-content_1">
							<a href="admin_page.php">Pro file</a>
							<a href="admin_page_today.php">Time of day</a>
						</div>
					</li>
					<li class="dropdown_2">
					<a href="#" class="dropbtn_2">Edit</a>
						<div class="dropdown-content_2">
							<a href="admin_page_edits.php">Edit pro file</a>
							<a href="admin_page_menu_setting.php">Setting Time</a>
						</div>
					</li>
					<li class="dropdown_3">
					<a href="#" class="dropbtn_3">List</a>
						<div class="dropdown-content_3">
							<a href="admin_page_realtime.php">Check the time to work</a>
							<a href="admin_page_check.php">Check Accessibility</a>
							<a href="admin_page_list_name.php">Employee List</a>
						</div>
					</li>
					<li class="dropdown_4">
					<a href="#" class="dropbtn_4">Check the work</a>
						<div class="dropdown-content_4">
							<a href="admin_page_list.php">Individual</a>
							<a href="admin_page_list_total.php">Total</a>
							<a href="admin_page_searchs.php">Find time to work</a>
							<a href="admin_page_searchs_list.php">Find the job status</a>
						</div>
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

<center><font face="Calibri" color="#000066" size="8"><b>The guest list work</font></center>
	<form name="frmMain" action="" method="post">
	<script language="JavaScript">

	function bodyOnload()
	{
		doCallAjax('date')
		setTimeout("doLoop();",1000);
	}

	function doLoop()
	{
		bodyOnload();
	}
	</script>

<span id="mySpan"></span>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <!--script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <!--script src="js/bootstrap.min.js"></script-->

</body>

</html>
