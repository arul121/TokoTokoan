<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="chartjs/Chart.js"></script>
</head>
<body>
	<style type="text/css">
	body{
		font-family: roboto;
	}
 
	table{
		margin: 0px auto;
	}
	</style>
 
 
 
	<?php 
	include 'koneksi.php';
	?>
 
	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>
 
	<br/>
	<br/>
 
	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>jenis</th>
				<th>jumlah</th>
				<th>waktu</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$query = "select * from barang ";
			$data = mysqli_query($koneksi,$query);
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['nama_barang']; ?></td>
					<td><?php echo $d['jenis_barang']; ?></td>
					<td><?php echo $d['jumlah_barang']; ?></td>
					<td><?php echo $d['waktu']; ?></td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
 
 
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["Kopi luwak", "toraja", "aceh", "sunda"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_kopi_luwak = mysqli_query($koneksi,"SELECT jumlah_barang from barang  where nama_barang='Kopi luwak' ");
					echo mysqli_num_rows($jumlah_kopi_luwak);
					?>, 
					<?php 
					$jumlah_toraja = mysqli_query($koneksi,"SELECT jumlah_barang from barang where nama_barang='toraja'");
					echo mysqli_num_rows($jumlah_toraja);
					?>, 
					<?php 
					$jumlah_aceh = mysqli_query($koneksi,"SELECT jumlah_barang from barang where nama_barang='aceh'");
					echo mysqli_num_rows($jumlah_aceh);
					?>, 
					<?php 
					$jumlah_sunda = mysqli_query($koneksi,"SELECT jumlah_barang from barang where nama_barang='sunda'");
					echo mysqli_num_rows($jumlah_sunda);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 2
				}]
			},
			// options: {
			// 	scales: {
			// 		yAxes: [{
			// 			ticks: {
			// 				beginAtZero:true
			// 			}
			// 		}]
			// 	}
			// }
		});
	</script>
</body>
</html>