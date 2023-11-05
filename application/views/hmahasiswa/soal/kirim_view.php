<?php $this->load->view('components/head'); ?>
<base href="<?= base_url() ?>">
<?php $this->load->view('components/navbar'); ?>
<li><a href="hmahasiswa/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li class="active"><a href="hmahasiswa/soalmhs"><i class="icon icon-th-list"></i> <span>Soal</span></a> </li>
<li><a href="hmahasiswa/nilaimhs"><i class="icon icon-trophy"></i> <span>Nilai</span></a> </li>
 
<li><a href="hmahasiswa/diskusimhs"><i class="icon icon-group"></i> <span>Forum Diskusi</span></a> </li>

</ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
				href="hmahasiswa/soalmhs" class="current">Soal Berganda</a> </div>
		<h1><span class="icon-briefcase"></span>
			Soal Mahasiswa <small> Pembelajaran Online SMA Dr. Soetomo</small></h1>
	</div>
	<hr>
	<div class="container-fluid">
		<div class="row-fluid">
			<h3 style="color:#5cdc88" align="center">Soal Terkirim</h3>
		</div>
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
				<h5>Jawaban Anda <code>Menunggu untuk dikoreksi ...</code></h5>
			</div>
			<div class="widget-content">
				<table class="isisoal">
					<tr>
						<td style="width:20px;" valign="top">1</td>
						<td colspan="5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate
							quo,
							commodi
							tempore in ad, accusamus et repudiandae veniam autem ipsam quasi adipisci illo
							aliquid fugit voluptates sed animi impedit? Unde.</td>

					</tr>
					<tr>
						<td></td>
						<td style="width:10px;">A.</td>
						<td style="width:auto;">
							<div class="radio"><input type="radio" name="radios" disabled />Jawaban</div>
						</td>
						<td style="width:10px;">C.</td>
						<td style="width:auto;">
							<div class="radio"><input type="radio" name="radios" disabled />Jawaban</div>
						</td>
					</tr>
					<tr>
						<td></td>
						<td style="width:10px;">B.</td>
						<td style="width:auto;">
							<div class="radio"><input type="radio" name="radios" disabled />Jawaban</div>
						</td>
						<td style="width:10px;">D.</td>
						<td style="width:auto;">
							<div class="radio"><input type="radio" name="radios" disabled />Jawaban</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('components/foot'); ?>

<?php $this->load->view('components/jsfoot'); ?>
</body>

</html>