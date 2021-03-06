<?php
session_start();
  
  $user = "localhost";
  $name = "root";
  $pass = "";
  $dbname = "inventori";
 
  $con = mysqli_connect($user,$name,$pass,$dbname);
 
  if (!$con){
    die ("Database Tidak Ada : " . mysqli_connect_error());
  }
$kueri = mysqli_query($con, "SELECT * FROM users");
 
  $data = array ();
  while (($row = mysqli_fetch_array($kueri)) != null){
    $data[] = $row;
  }
    $cont = count ($data);
    $jml = "".$cont;

    $kueri2 = mysqli_query($con, "SELECT * FROM barang");
 
  $data2 = array ();
  while (($row = mysqli_fetch_array($kueri2)) != null){
    $data2[] = $row;
  }
    $cont2 = count ($data2);
    $jml2 = "".$cont2;


if( !isset($_SESSION['admin']) )
{
  header('location:./../'.$_SESSION['akses']);
  exit();
}

$nama = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="shortcut icon" href="../images/icon.ico">
	<!--Import Google Icon Font-->
    <link href="../fonts/material.css" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style type="text/css">
    	.btn.modal-trigger{display:block; width:100%; padding:30px;line-height:0px}
    </style>
</head>
<body>
	<div class="row">
		<!--header-->
		<header>
			<!--TopNav-->
	        <nav class="row top-nav brown darken-2">
	    		<div class="container">
	    			<div class="col offset-l2 nav-wrapper">
	    				<a href="#" data-activates="slide-out" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a>
	    				<a class="page-title">Beranda</a>
	    			</div>
	    		</div>
			</nav>

			<!--Sidenav-->
			<ul id="slide-out" class="side-nav fixed">
	            
	            <li class="no-padding">
		            <ul class="collapsible collapsible-accordion">
		                <li>
		                	<div class="user-view">
		                    	<div class="background" style="margin-bottom:-15%;">
		                    		<img src="../images/bg1.jpg">
		                    	</div>
		                		<span class="white-text name"><?php echo sanitize_key($nama); ?><i class="material-icons left">account_circle</i></span>
		                	</div>
		                </li>
		                
		                <li><div class="divider" style="margin-top:15%;"></div></li>

		                <li><a class="collapsible-header">Beranda<i class="material-icons">home</i></a></li>

		                <li>
		                	<a class="collapsible-header">Menu<i class="material-icons">arrow_drop_down</i></a>
		                	<div class="collapsible-body">
		                		<ul>
		                			<li><a href="user.php">User</a></li>
									<li><a href="barang.php">Barang</a></li>
								</ul>
							</div>
		                </li>
		                <li><a href="../logout.php" class="collapsible-header">Keluar<i class="material-icons">exit_to_app</i></a></li>

		            </ul>
	            </li>

	        </ul>
		</header>
		<!--end of header-->

		<!--content-->
		<main>
			<div class="row container">
				<div class="col s12 m12 l9 offset-l3">
					<!--content user-->
					<div class="col s12 m6 l6">
		                <div class="card blue-grey lighten-5">
		                    <div class="card-content brown-text text-darken-2">
			                    <span class="card-title">User
			                        <i class="medium material-icons left">supervisor_account</i>
			                        <p class="right"><?php echo $jml; ?></p>
			                    </span>
		                    </div>
		                    
		                    <div class="card-action">
		                    	<i class="material-icons left brown-text text-darken-2">visibility</i>
		                    	<a href="user.php" class="brown-text text-darken-2">Lihat</a>
		                    </div>
		                </div>
	                </div>

	                <!--content barang masuk-->
					<div class="col s12 m6 l6">
		                <div class="card blue-grey lighten-5">
		                    <div class="card-content brown-text text-darken-2">
			                    <span class="card-title">Barang
			                        <i class="medium material-icons left">archive</i>
			                        <p class="right"><?php echo sanitize_key($jml2); ?></p>
			                    </span>
		                    </div>
		                    
		                    <div class="card-action">
		                    	<i class="material-icons left brown-text text-darken-2">visibility</i>
		                    	<a href="barang.php" class="brown-text text-darken-2">Lihat</a>
		                    </div>
		                </div>
	                </div>

	                <!--content Gudang-->
		                </div>
	                </div>

				</div>
			</div>
		</main>
        <!--end of content-->


	</div>

	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../js/materialize.min.js"></script>
	<script type="text/javascript">
	  	$(document).ready(function(){
	    	$('.collapsible').collapsible();
	    	$(".button-collapse").sideNav();
		});
	</script>
</body>
</html>