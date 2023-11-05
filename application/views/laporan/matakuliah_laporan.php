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
	<h1 style="width:800px; margin-right:150px;"><?= $title ?> </h1>

	<table border="1" style="width:800px; margin-right:150px;">
		<thead>
			<tr>
				<th>Kode MK</th>
				<th>Nama Mata Pelajaran</th>
				<th>Nama Guru</th>
				<th>Jurusan</th>
				<th>Semester</th>
			</tr>
		</thead>
		<tbody>
			<?php
            foreach($matakuliah as  $item):
                echo "<tr>
                        <td>{$item->kodemk}</td>
                        <td>{$item->namamk}</td>
						<td>{$item->namadosen}</td>
						<td>{$item->prodi}</td>
						<td>{$item->semester}</td>
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