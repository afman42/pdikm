<?php

function select_jenis_pendidikan(){
	echo "<select name='jenis_pendidikan' class='form-control'>";
	echo "<option value=''>-- Pilih Jenis Pendidikan --</option>";
	echo "<option value='SMA/SMK Kebawah'>SMA/SMK Kebawah</option>";
	echo "<option value='D1-D3-D4'>D1-D3-D4</option>";
	echo "<option value='Sarjana(S1)'>Sarjana(S1)</option>";
	echo "<option value='Master(S2) Keatas'>Master(S2) Keatas</option>";
	echo "</select>";
}

function select_jenis_kelamin(){
	echo "<select name='jenis_kelamin' class='form-control'>";
	echo "<option value=''>-- Pilih Jenis Kelamin --</option>";
	echo "<option value='Laki-Laki'>Laki-Laki</option>";
	echo "<option value='Perempuan'>Perempuan</option>";
	echo "</select>";
}

function select_pekerjaan(){
	echo "<select name='pekerjaan' class='form-control'>";
	echo "<option value=''>-- Pilih Pekerjaan --</option>";
	echo "<option value='PNS'>PNS</option>";
	echo "<option value='Wiraswasta/Usahawan'>Wiraswasta/Usahawan</option>";
	echo "<option value='TNI/Polri'>TNI/Polri</option>";
	echo "<option value='Mahasiswa'>Mahasiswa</option>";
	echo "<option value='Pegawai'>TNI/Polri</option>";
	echo "<option value='Lain-lain'>Lain-lain</option>";
	echo "</select>";
}