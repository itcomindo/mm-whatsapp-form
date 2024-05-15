<?php
/**
 *
 * Form Default
 *
 * @package mwf
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 *  Form Default.
 */
function mwf_form_area() {
	?>
	<div class="mwf-form">
		<label> Provinsi </label>
		<select class="select2-data-array browser-default" id="select2-provinsi"></select>
	</div>


	<div class="mwf-form">
		<label> Kabupaten </label>
		<select class="select2-data-array browser-default" id="select2-kabupaten"></select>
	</div>


	<div class="mwf-form">
		<label> Kecamatan </label>
		<select class="select2-data-array browser-default" id="select2-kecamatan"></select>
	</div>

	<div class="mwf-form">
		<label> Kelurahan </label>
		<select class="select2-data-array browser-default" id="select2-kelurahan"></select>
	</div>

	<!-- Submit -->
	<div class="mwf-form mwf-hide">
		<!-- jika semua sudah true ganti class mwf-hide menjadi mwf-show dan lakukan sebaliknya -->
		<button type="submit" id="mwf-submit" class="mwf-hide">Submit</button>
		<!-- jika semua sudah true ganti class mwf-hide menjadi mwf-show dan lakukan sebaliknya -->
		<!-- jika semua sudah true, ketika tombol submit di klik akan mengarah ke //api.whatsapp.com/send?phone=[nomor telepon dari data-mwf-phone]&text= -->
	</div>
	<?php
}