<?php session_start();
include "../config.php";
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
$result = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id_barang ASC");

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
	       /* label color */
	       .e-input-field label {
	         color: #000;
	       }
	       /* label focus color */
	       .e-input-field input[type=text]:focus + label,.e-input-field input[type=password]:focus + label {
	         color: #d32f2f !important;
	       }
	       /* label underline focus color */
	       .e-input-field input[type=text]:focus,.e-input-field input[type=password]:focus {
	         border-bottom: 1px solid #d32f2f !important;
	         box-shadow: 0 1px 0 0 #d32f2f !important;
	       }
	       /* valid color */
	       .e-input-field input[type=text].valid,.e-input-field input[type=password].valid {
	         border-bottom: 1px solid #d32f2f !important;
	         box-shadow: 0 1px 0 0 #d32f2f !important;
	       }
	       /* invalid color */
	       .e-input-field input[type=text].invalid,.e-input-field input[type=password].invalid {
	         border-bottom: 1px solid #d32f2f !important;
	         box-shadow: 0 1px 0 0 #d32f2f !important;
	       }
	       /* icon prefix focus color */
	       .e-input-field .prefix.active {
	         color: #d32f2f !important;
	       }
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
	    				<a class="page-title">Cari Barang</a>
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
		                		<span class="white-text name"><?php echo $nama; ?><i class="material-icons left">account_circle</i></span>
		                	</div>
		                </li>
		                
		                <li><div class="divider" style="margin-top:15%;"></div></li>

		                <li><a href="index.php" class="collapsible-header">Beranda<i class="material-icons">home</i></a></li>

		                <li>
		                	<a class="collapsible-header">Menu<i class="material-icons">arrow_drop_down</i></a>
		                	<div class="collapsible-body">
		                		<ul>
		                			<li><a href="user.php">User</a></li>
									<li class="active brown darken-4"><a href="barang.php">Barang</a></li>
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
				<div class="col s12 m12 l12 offset-l2"> <br>
					<!--kolom search-->
					<div class="col s12 m12 l12">
						<form name="cari" method="post" action="" class="row">
	                    	<div class="e-input-field col s12 m12 l12">
	                    		<input type="text" name="cari" placeholder="Masukkan Nama Barang" class="validate" requibrown title="Cari User">
	                    		<input type="submit" name="cari2" value="cari" class="btn right brown darken-2"> 
	                    	</div>
						</form>
					</div>

					<!--table-->
					<div class="col s12 m12 l12 card-panel z-depth"> <br>
						<table class="highlight">
							<!--kolom header table-->
							

							<?php 

				                if(!empty($_POST['cari2'])){
			                    $no = 1; //buat urutan nomer
			                    $cari = $_POST['cari'];
			                    $sql = "SELECT * FROM barang WHERE id_barang  LIKE '%$cari%' OR nama_barang LIKE '%$cari%' OR jenis_barang LIKE '%$cari%' OR jumlah_barang LIKE '%$cari%' OR waktu LIKE '%$cari%'";
			                    $query = mysqli_query($conn,$sql);
			                    
			                      if($user_data = mysqli_fetch_array($query)){
			                        $test = $user_data['nama_barang'];

			                        echo "
             						 <tr>
               						 <th >ID</th>
                					<th>Nama Barang</th>
                					<th>Jenis Barang</th>
                					<th>Jumlah Barang</th>
                					<th>Tanggal Update</th>
                    				</tr>

				            		";

                        			echo "<tr>";
                        			echo "<td>".sanitize_key($user_data['id_barang'])."</td>";
                        			echo "<td>".sanitize_key($user_data['nama_barang'])."</td>";
                        			echo "<td>".sanitize_key($user_data['jenis_barang'])."</td>";
                       	 			echo "<td>".sanitize_key($user_data['jumlah_barang'])."</td>"; 
                        			echo "<td>".sanitize_key($user_data['waktu'])."</td>";   
			                        echo "<td>  <a href='edit-barang.php?id=".sanitize_key($user_data[id_barang])."' style='text-decoration: none;'><i class='material-icons' title='Edit ".sanitize_key($test)."'>mode_edit</i></a> | <a data-id='1' class='hapus' href='delete-barang.php?id=$user_data[id_barang]' style='text-decoration: none;'><i class='material-icons' title='Hapus ".sanitize_key($test)."'>delete</i></a> </td></tr>";
			                        echo "</table>";
			                      }else{
			                      	echo "<table>";
			                        echo "<tr><td colspan='4'><center><h6><b>'$cari'</b> Tidak Ditemukan. Silahkan Periksa Kembali Keyword Anda</h6></center></td></tr>";
			                      }
			                    }
			                ?>

							
						</table>
						<table>
							<tr>
				            	<td colspan='9'>
				            		<a href='barang.php' class="right waves-effect waves-light btn brown darken-2">KEMBALI</a>
				            	</td>
				            </tr>
						</table>
					</div>
				</div>
			</div>
		</main>
        <!--end of content-->


	</div>

	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../js/materialize.min.js"></script>
	<script>
        $(".hapus").click(function () {
        var jawab = confirm("Anda Yakin Ingin Menghapus Barang ?");
        if (jawab === true) {
        // konfirmasi
            var hapus = false;
            if (!hapus) {
                hapus = true;
                $.post('delete.php', {id: $(this).attr('data-id')},
                function (data) {
                    alert(data);
                });
                hapus = false;
            }
        } else {
            return false;
        }
        });
      </script>
	<script type="text/javascript">
	  	$(document).ready(function(){
	    	$('.collapsible').collapsible();
	    	$(".button-collapse").sideNav();
		});
	</script>
</body>
</html>