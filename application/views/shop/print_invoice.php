<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Invoice Shop Konakito</title>
</head>
<style>
	header {
		text-align: center;
		margin-bottom: 90px;
	}

	table,
	thead,
	tbody {
		margin-top: 20px;
		text-align: center;
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 10%;
	}

	td,
	th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even) {
		background-color: #dddddd;
	}

	hr {
		align: center;
		width: 100%;
	}
</style>
<header>
	<h1><u>Invoice Shop Konakito</u></h1>
	<p>Jl. Bencoolen, Kebun Keling, Tlk. Segara, Kota Bengkulu, Bengkulu 38115</p>
	<p>Phone: 0816-3238-6390 | Email: support@konakito.com</p>
	<hr>
</header>

<body></body>
<table>
	<thead>
		<tr>
			<th>Buyer Name</th>
			<th>Address</th>
			<th>Destination Province</th>
			<th>Courier</th>
			<th>Bank Transfer</th>
			<th>Product Name</th>
			<th>Product Total</th>
			<th>Produk Price</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($sql as $ps) { ?>
			<tr>
				<td><?= $ps->nama_pembeli ?></td>
				<td><?= $ps->alamat ?></td>
				<td><?= $ps->tujuan_provinsi ?></td>
				<td><?= $ps->kurir ?></td>
				<td><?= $ps->bank_transfer ?></td>
				<td><?= $ps->nama_produk ?></td>
				<td><?= $ps->jumlah_produk ?></td>
				<td><?= $ps->harga_produk ?></td>
			</tr>
		</tbody>
	<? } ?>
</table>
</body>

</html>