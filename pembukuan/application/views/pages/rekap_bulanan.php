<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
	<!--begin::Content wrapper-->
	<div class="d-flex flex-column flex-column-fluid">
		<!--begin::Toolbar-->
		<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
			<!--begin::Toolbar container-->
			<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
				<!--begin::Page title-->
				<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
					<!--begin::Title-->
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Laporan <?= $lihat['nama_usaha'] ?></h1>
					<!--end::Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
						<!--begin::Item-->
						<li class="breadcrumb-item text-muted">
							<a href="<?php echo site_url('home_c');?>" class="text-muted text-hover-primary">Home</a>
						</li>
						<!--end::Item-->
						<!--begin::Item-->
						<li class="breadcrumb-item">
							<span class="bullet bg-gray-400 w-5px h-2px"></span>
						</li>
						<!--end::Item-->
						<!--begin::Item-->
						<li class="breadcrumb-item text-muted">Laporan <?= $lihat['nama_usaha'] ?></li>
						<!--end::Item-->
					</ul>
					<!--end::Breadcrumb-->
				</div>
				<!--end::Page title-->
				</div>
				<!--end::Toolbar container-->
			</div>
			<!--end::Toolbar-->
						
		<!--begin::Content-->
		<div id="kt_app_content" class="app-content flex-column-fluid">
			<!--begin::Content container-->
			<div id="kt_app_content_container" class="app-container container-xxl">
				<!--begin::Category-->
				<div class="card card-flush">
					<div class="card-header align-items-center py-5 gap-2 gap-md-5">
						<div class="card-title">
							<!--begin::Search-->
							<div class="d-flex align-items-center position-relative my-1 fw-semibold fs-6">
								<div class="text-muted">
								Rekap Laporan Bulan <?=$nama_bulan?> Tahun <?= $nama_tahun?>
								</div>
							</div>
						</div>
						<div class="card-toolbar flex-row-fluid justify-content-end gap-5">
							<a href="<?php echo site_url('usaha_c/data_usaha/'.$id_nama_usaha);?>"><button type="button" class="btn btn-primary">Reset</button></a>
						</div>
					<!--<a href="#" data-bs-toggle="modal" data-bs-target="#tambah" class="btn btn-primary">Tambah Data</a>-->
				</div>
					<!--begin::Card body-->
					<div class="card-body pt-0">
						<form method="post" action="<?php echo site_url('usaha_c/delete/'. '?id_nama_usaha=' . $id_nama_usaha) ?>">
							
							<!--begin::Table-->
							<table class="table align-middle table-row-dashed fs-6 gy-5" id="table">
								<!--begin::Table head-->
								<thead>
									<!--begin::Table row-->
									<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
										<th class="hidden"></th>
										<th>Debit</th>
										<th>Kredit</th>
									</tr>
									<!--end::Table row-->
								</thead>
								<!--end::Table head-->
								<!--begin::Table body-->
								<?php 
								
								?>
								<tbody class="fw-semibold text-gray-600">
									<!--begin::Table row-->
									<tr>
										<!--begin::Type=-->
										<td>TOTAL</td>
										<td><?php echo $total_debit;?></td>
										<td><?php echo $total_kredit;?></td>
										<!--end::Type=-->
									</tr>
								</tbody>
						</table>
				</div>
			</div>
		</div>
	</div>