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
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Jenis Uang</h1>
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
						<li class="breadcrumb-item text-muted">Jenis Uang</li>
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
					<!--begin::Card header-->
					<div class="card-header align-items-center py-5 gap-2 gap-md-5">
						<!--begin::Card title-->
						<div class="card-title">
							
						</div>
						<!--end::Card title-->
						<!--begin::Card toolbar-->
						<div class="card-toolbar">
							<!--begin::Add customer-->
							<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Data</a>
							<!--end::Add customer-->
						</div>
						<!--end::Card toolbar-->
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0">
						<form method="post" action="<?php echo site_url('jenis_uang_c/delete') ?>">
							<!--begin::Table-->
							<table class="table align-middle table-row-dashed fs-6 gy-5" id="table">
								<!--begin::Table head-->
								<thead>
									<!--begin::Table row-->
									<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
										<th class="w-10px pe-2">
											<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
												<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#table .form-check-input"  />
											</div>
										</th>
										<th>ID</th>
										<th class="text-end min-w-100px text-center">Jenis Uang</th>
										<th class="text-end min-w-100px text-center">Kategori Uang</th>
										<th class="text-end min-w-70px">Actions</th>
									</tr>
									<!--end::Table row-->
								</thead>
								<!--end::Table head-->
								<!--begin::Table body-->
								<?php 
								//$no = 1; //no default 1
								foreach ($data->result() as $baris) { //
								?>
								<tbody class="fw-semibold text-gray-600">
									<!--begin::Table row-->
									<tr>
										<!--begin::Checkbox-->
										<td>
											<div class="form-check form-check-sm form-check-custom form-check-solid">
												<input class="form-check-input" type="checkbox" name="id_jenis_uang[]" value='<?php echo $baris->id_jenis_uang; ?>'/>
											</div>
										</td>
										<!--end::Checkbox-->
										<!--begin::Type=-->
										<td><?php echo $baris->id_jenis_uang;?></td>
										<td class="text-end pe-0 text-center"><?php echo $baris->jenis_uang;?></td>
										<td class="text-end pe-0 text-center"><?php echo $baris->kategori;?></td>
										<!--end::Type=-->
										<!--begin::Action=-->
										<td class="text-end">
											<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
												<span class="svg-icon svg-icon-5 m-0">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon--></a>
												<!--begin::Menu-->
												<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#edit<?php echo $baris->id_jenis_uang; ?>">Edit</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row" data-bs-toggle="modal" data-bs-target="#delete<?php echo $baris->id_jenis_uang; ?>">Delete</a>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu-->
											</td>
											<!--end::Action=-->
										</tr>
										</tbody>
										<?php  } ?>
										<tfoot>
											<tr>
												<th>
													<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
														<span class="svg-icon svg-icon-5 m-0">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon--></a>
														<!--begin::Menu-->
														<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<button type="submit" class="btn btn-sm" type="button">Delete</button>
															</div>
															<!--end::Menu item-->
														</div>
														<!--end::Menu-->
													</th>
												</div>
											</th>
										</tr>
									</tfoot>
								</table>
							</form>
							<div id="kt_app_toolbar" >
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
									<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
									</div>
									<div class="d-flex align-items-center ">
										<?php echo $pagination; ?>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>

<form class="user" action="<?php echo site_url('jenis_uang_c/input/');?>" method="post" enctype="multipart/form-data">

<div class="modal fade" tabindex="-1" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Kategori</h3>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <div class="symbol symbol-50px">
                 	<div class="symbol-label fs-2 fw-semibold text-dark">x</div>
                 </div>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <div class="form-group">
                	<label for="exampleFormControlInput1" class="required form-label">Jenis Uang</label>
                	<input type="text" placeholder="" class="form-control" id="jenis_uang" name="jenis_uang" value="" required="">
                </div>
            

	            <div class="form-group">
	            	<label for="exampleFormControlInput1" class="required form-label">Kategori Uang</label>
	            	<select class="form-control bg-light" id="id_kategori" name="id_kategori" required="">
	            		<option hidden disabled selected>--pilih--</option>
	            		<?php foreach ($role as $item) : ?>
	            		<option value="<?= $item->id_kategori ?>"><?= $item->kategori ?></option>
	            		<?php endforeach;?>
	            	</select>
	            </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
</form>


<?php foreach($user as $baris): ?>
<form class="user" action="<?php echo site_url('jenis_uang_c/edit/');?>" method="post" enctype="multipart/form-data">
<div class="modal fade" tabindex="-1" id="edit<?php echo $baris->id_jenis_uang; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Kategori</h3>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                	<div class="symbol symbol-50px">
                		<div class="symbol-label fs-2 fw-semibold text-dark">x</div>
					</div>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <div class="form-group">
                	<label for="exampleFormControlInput1" class="required form-label">Jenis Uang</label>
                	<input type="text" placeholder="" class="form-control" id="jenis_uang" name="jenis_uang" value="<?php echo $baris->jenis_uang;?>">
                	<input type="hidden" name="id_jenis_uang" value="<?php echo $baris->id_jenis_uang;?>">
                	<input type="hidden" name="id_kategori" value="<?php echo $baris->id_kategori;?>">
                </div>

	            <div class="form-group">
	            	<label for="exampleFormControlInput1" class="required form-label">Kategori Uang</label>
	            	<select class="form-control bg-light" id="id_kategori" name="id_kategori" required="">
	            		<option hidden disabled selected><?php echo $baris->kategori;?></option>
	            		<?php foreach ($role as $item) : ?>
	            		<option value="<?= $item->id_kategori ?>"><?= $item->kategori ?></option>
	            		<?php endforeach;?>
	            	</select>
	            </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
</form>
<?php endforeach;
    ?>

<?php foreach($user as $baris): ?>
<form class="user" action="<?php echo site_url('jenis_uang_c/hapus_data/');?>" method="post" enctype="multipart/form-data">
	<div class="modal fade" tabindex="-1" id="delete<?php echo $baris->id_jenis_uang; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body table text-center">
                <div class="row">
                	<i class="fas fa-exclamation-circle text-warning fs-5x pt-5"></i>
                        <div class="pt-5">
                        	<input type="hidden" value="<?php echo $baris->id_jenis_uang;?>" name="id_jenis_uang">
                        	<div class="modal-body"><p>Apakah Anda yakin ingin menghapus data ini?</p></div>
                        	<div class="text-center m-t-15">
                        		<button type="submit" class="btn fw-bold btn-danger">Hapus</button>
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="modal-footer">-->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</div>
</form>
<?php endforeach;
    ?>