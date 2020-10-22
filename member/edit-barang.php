<?php session_start();
include "../config.php";
$id_barang = $_GET['id_barang'];
$result = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang=$id_barang");

while($user_data = mysqli_fetch_array($result))
{
  $id_barang = $user_data['id_barang'];
  $nama = $user_data['nama_barang'];
  $jenis = $user_data['jenis_barang'];
  $jumlah = $user_data['jumlah_barang'];
  $waktu = $user_data['waktu'];
}
?>
<?php
// include database connection file
include_once("../config.php");
$namauser = ( isset($_SESSION['user']) ) ? $_SESSION['user'] : '';
// Check if form is submitted for user update, then brownirect to homepage after update
if(isset($_POST['update']))
{ 
  $jumlah=$_POST['jumlah_barang'];
  $waktu=$_POST['waktu'];
    
  // update user data
  $result = mysqli_query($koneksi, "UPDATE barang SET jumlah_barang='$jumlah',waktu='$waktu' WHERE id_barang=$id_barang");
  
  // brownirect to homepage to display updated user in list
  header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id_barang = $_GET['id_barang'];
 
while($user_data = mysqli_fetch_array($result))
{
  $id_barang = $user_data['id_barang'];
  $nama = $user_data['nama_barang'];
  $jenis = $user_data['jenis_barang'];
  $jumlah = $user_data['jumlah_barang'];
  $waktu = $user_data['waktu'];
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
              <a class="page-title">Edit Barang</a>
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
                        <span class="white-text name"><?php echo sanitize_key($namauser); ?><i class="material-icons left">account_circle</i></span>
                      </div>
                    </li>
                    
                    <li><div class="divider" style="margin-top:15%;"></div></li>

                    <li><a href="index.php" class="collapsible-header">Beranda<i class="material-icons">home</i></a></li>

                    <li>
                      <a class="collapsible-header">Menu<i class="material-icons">arrow_drop_down</i></a>
                      <div class="collapsible-body">
                        <ul>
                          <li><a href="user.php">User</a></li>
                  <li  class="active brown darken-4"><a href="#">Barang</a></li>
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
        <div class="col s12 m12 l10 offset-l3"> <br>

          <!--table-->
        <form action="" method="post" name="form1">
          <div class="col s12 m12 l12 card-panel z-depth"> <br>
            <table class="highlight">
              <tr>
                <td>Kode Barang</td>
                <td><input disabled type="text" name="id_barang" value=<?php echo $id_barang; ?>></td>
              </tr>
              <tr> 
                <td>Nama Barang</td>
                <td><input disabled type="text" name="nama_barang" value=<?php echo $nama;?>></td>
              </tr>
              <tr> 
                <td>Jenis Barang</td>
                <td><input disabled type="text" name="jenis_barang" value=<?php echo $jenis;?>></td>
              </tr>
              <td>Jumlah Barang</td>
                <td><input type="text" name="jumlah_barang" value=<?php echo sanitize_key($jumlah);?>></td>
              </tr>
              <tr> 
                <td>Tanggal update</td>
                <td><input type="date" name="waktu" value=<?php echo sanitize_key($waktu);?>></td>
              </tr>
              <tr>
                  <td><input type="hidden" name="id" value=<?php echo $_GET['id_barang'];?>></td>
              </tr>
              </table>
              <table>
                <tr>
                  <th>
                    <input type="submit" name="update" value="Edit Barang" class="right waves-effect waves-light btn green darken-2" style="float: left;">
                  </th>
                  <th style="width: 1%;">
                    <a href="index.php"><input type="button" value="Kembali" class="right waves-effect waves-light btn brown darken-2"></a> 
                  </th>
                </tr>
              </table>
          </div>
        </form>
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