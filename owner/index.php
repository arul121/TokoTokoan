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

  $kueri4 = mysqli_query($con, "SELECT * FROM barang");
 
  // $data4 = array ();
  // while (($row = mysqli_fetch_array($kueri4)) != null){
  //   $data4[] = $row;
  // }
  //   $cont4 = count ($data4);
  //   $jml4 = "".$cont4;

if( !isset($_SESSION['user']) )
{
	header('location:./../'.$_SESSION['akses']);
	exit();
}else{
	$nama = $_SESSION['user'];
}

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
                        <span class="white-text name"><?php echo $nama; ?><i class="material-icons left">account_circle</i></span>
                      </div>
                    </li>
                    
                    <li><div class="divider" style="margin-top:15%;"></div></li>

                    <li><a class="collapsible-header">Beranda<i class="material-icons">home</i></a></li>

                    <li>
                      <a class="collapsible-header">Menu<i class="material-icons">arrow_drop_down</i></a>
                      <div class="collapsible-body">
                        <ul>
                  <li><a href="user.php">User</a></li>
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
            <form name="cari" method="post" action="cari-barang.php" class="row">
                        <div class="e-input-field col s12 m12 l12">
                          <input type="text" name="cari" placeholder="Masukkan Nama Barang " class="validate" requibrown title="Cari Barang">
                          <input type="submit" name="cari2" value="cari" class="btn right brown darken-2"> 
                        </div>
            </form>
          </div>
          <!--table-->
          <div class="col s12 m12 l12 card-panel z-depth"> <br>
            <table class="highlight">
              <!--kolom header table-->
              <tr>
                <th >ID</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Jumlah Barang</th>
                <th>Tanggal Update</th>
              </tr>

              <?php 

              while($user_data = mysqli_fetch_array($kueri4)) { 
                          $test = $user_data['id_barang'];      
                        echo "<tr>";
                        echo "<td>".$user_data['id_barang']."</td>";
                        echo "<td>".$user_data['nama_barang']."</td>";
                        echo "<td>".$user_data['jenis_barang']."</td>";
                          echo "<td>".sanitize_key($user_data['jumlah_barang'])."</td>"; 
                          echo "<td>".$user_data['waktu']."</td>";    
                        echo "</tr>";  
                    }

              ?>

            </table>

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