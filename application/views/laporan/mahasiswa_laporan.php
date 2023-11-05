<?php
$this->load->view("laporan/head",array("title" => $title));
$laporan = "laporanibbi.jpg";
?>
<base href="<?= base_url(); ?>">
<div id="lap" style="width:210px; height:297px;">
	<table class='head' style="width:800px; margin-right:150px;">
		<tr>
			<td rowspan="4" style="width:50px;"><img style="  margin-bottom:40px; width:120px; height:120px;"
					src="<?=base_url('assets/img/' . $laporan)?>" alt=""></td>
		</tr>
		<tr>
			<td style="color:#cfba46;  text-align: center;">
				<h2>SEKOLAH TINGGI SMA DR. SOETOMO DOUBLE TRACK MENCIPTAKAN GENERASI MAJU</h2>
			</td>
		</tr>
		<tr>
			<td style="text-align:center;">Jl. Manyar Rejo I No.39, Menur Pumpungan, Kec. Sukolilo, Surabaya, Jawa Timur
				60118</td>
		</tr>
		<tr>
			<td>.</td>
		</tr>
	</table>
	<?php
    foreach($mahasiswa as  $item):
        $kls = $item->kelas;
        $prd = $item->prodi;
    endforeach;
    ?>
	<h1 style="width:800px; margin-right:150px;"><?= $title." ".$prd." ".$kls?> </h1>

	<table border="1" style="width:800px; margin-right:150px;">
		<thead>
			<tr>
				<th>NIM</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th style="width:200px;">Tanggal lahir</th>
				<th>E-mail</th>
				<th>Telepon</th>
			</tr>
		</thead>
		<tbody>
			<?php
            foreach($mahasiswa as  $item):
                echo "<tr>
                        <td>{$item->nim}</td>
                        <td>{$item->namamhs}</td>
						<td>{$item->alamat}</td>
						<td>{$item->tanggallahir}</td>
						<td>{$item->email}</td>
                        <td>{$item->telepon}</td>
                    </tr>";
            endforeach;
            ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function () {
        window.print();
	})
</script>
<?php
$this->load->view("laporan/foot");
?>