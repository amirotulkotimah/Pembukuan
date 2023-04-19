<?php 
$getGrup = $this->session->userdata('session_grup'); 
$getUser = $this->session->userdata('session_user');
?>

<?php if ($getGrup == 1 || $getGrup == 2) : ?>
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
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Data Pengguna</h1>
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
						<li class="breadcrumb-item text-muted">Data Pengguna</li>
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
							
						</div>
						<div class="card-toolbar flex-row-fluid justify-content-end gap-5">
							<a href="#" data-bs-toggle="modal" data-bs-target="#tambah" class="btn btn-primary">Tambah Data</a>
						</div>
					</div>
					<!--begin::Card body-->
					<div class="card-body pt-0">
						<form method="post" action="<?php echo site_url('data_pengguna_c/delete') ?>">
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
										<th class="text-end min-w-100px text-center">Nama</th>
										<th class="text-end min-w-100px text-center">No.HP</th>
										<th class="text-end min-w-100px text-center">Email</th>
										<th class="text-end min-w-100px text-center">Role</th>
										<th class="min-w-100px text-center">Foto</th>
										<th class="text-end min-w-10px">Actions</th>
									</tr>
									<!--end::Table row-->
								</thead>
								<!--end::Table head-->
								<!--begin::Table body-->
								<?php 
								foreach ($data->result() as $baris) { //
								?>
								<tbody class="fw-semibold text-gray-600">
									<!--begin::Table row-->
									<?php
									if($getGrup == 2 && $baris->id_master_user >= 3 || $baris->id_master_user >= 4 || $getGrup ==1 ) :?>
									<tr>
										<!--begin::Checkbox-->
										<td>
											<div class="form-check form-check-sm form-check-custom form-check-solid">
												<input class="form-check-input" type="checkbox" name="id_user[]" value='<?php echo $baris->id_user; ?>'/>
											</div>
										</td>
										<!--end::Checkbox-->
										<!--begin::Type=-->
										<td class="text-end pe-0 text-center"><?php echo $baris->nama;?></td>
										<td class="text-end pe-0 text-center"><?php echo $baris->hp;?></td>
										<td class="text-end pe-0 text-center"><?php echo $baris->email;?></td>
										<td class="text-end pe-0 text-center"><?php echo $baris->nama_user;?></td>
										<td class="text-end pe-0 text-center"><img src="<?php echo base_url('assets/upload/foto_pengguna/') . $baris->foto; ?>" alt="" width="60" height="60" onerror="this.onerror = null; this.src = '<?= base_url('assets/media/avatars/avatar.png') ?>'"></td>
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
														<a href="#" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row" data-bs-toggle="modal" data-bs-target="#detail<?php echo $baris->id_user; ?>">Detail</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#edit<?php echo $baris->id_user; ?>">Edit</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row" data-bs-toggle="modal" data-bs-target="#delete<?php echo $baris->id_user; ?>">Delete</a>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu-->
											</td>
											<!--end::Action=-->
										</tr>
										<?php endif ?>
										</tbody>
										<?php  } ?>
										
										<tfoot class="fw-semibold text-gray-600">
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

<form class="user" action="<?php echo site_url('data_pengguna_c/input/');?>" method="post" enctype="multipart/form-data">

<div class="modal fade" tabindex="-1" id="tambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Tambah Data</h2>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                 <div class="symbol symbol-50px">
                 	<div class="symbol-label fs-2 fw-semibold text-dark">x</div>
                 </div>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
            	<div class="row">
            		<div class="col-md-6">
            			<div class="form-group">
	                		<label for="exampleFormControlInput1" class="required form-label">Nama</label>
	                		<input type="text" placeholder="" class="form-control" name="nama" value="" required="">
	                		<span class="font-13 text-muted"></span>
	                	</div>
	                	<br>
	                	<div class="form-group">
	                		<label for="exampleFormControlInput1" class="required form-label">No. HP</label>
	                		<input type="text" placeholder="" data-mask="" class="form-control" name="hp" value="" required="">
	                		<span class="font-13 text-muted"> </span>
	                	</div>
	                	<br>
	                	<div class="form-group">
	                		<label for="exampleFormControlInput1" class="required form-label">Username</label>
	                		<input type="text" placeholder=""  class="form-control" name="username" value="" required="">
	                		<span class="font-13 text-muted"></span>
	                	</div>
	                </div>
	                <div class="col-md-6">
	                	<div class="form-group">
	                		<label for="exampleFormControlInput1" class="required form-label">Role</label>
	                		<?php if ($getGrup == 1 || $getGrup == 2) : ?>
	                		<select class="form-control" id="role" name="role" required="">
	                			<?php endif ?>
	                			<option value="" hidden disabled selected>--pilih--</option>
	                			<?php if ($getGrup == 1) : ?>
	                			<option value="1">Admin</option>
	                			<option value="2">Supervisor</option>
	                			<?php endif ?>
	                			<?php if ($getGrup == 1 || $getGrup == 2) : ?>
	                			<option value="3">Acounting</option>
	                			<option value="4">CS</option>
	                			<?php endif ?>
	                		</select>
	                	</div>
	                	<br>
	                	<div class="form-group">
	                		<label for="exampleFormControlInput1" class="required form-label">Email</label>
	                		<input type="text" placeholder=""  class="form-control" name="email" value="" required="">
	                		<span class="font-13 text-muted"> </span>
	                	</div>
	                	<br>
	                	<div class="form-group">
	                		<label for="exampleFormControlInput1" class="required form-label">Password</label>
	                		<input type="text" placeholder=""  class="form-control" name="password" value="" required="">
	                		<span class="font-13 text-muted"></span>
	                	</div>
	                </div>
	            </div>
                <br>
                <div class="form-group">
                	<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                		<label for="exampleFormControlInput1" class="required form-label">Foto</label>
                		<div class="image-input-wrapper w-150px h-150px" style="background-image: url()"></div>
                		<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Pilih foto">
                			<i class="bi bi-pencil-fill fs-7"></i>
                			<!--begin::Inputs-->
                			<input type="file" name="filefoto" accept=".png, .jpg, .jpeg" />
                		</label>
                		<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                			<i class="bi bi-x fs-2"></i>
                		</span>
                		<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                			<i class="bi bi-x fs-2"></i>
                		</span>
                	</div>
                </div>
                <div class="d-flex justify-content-end">
                	<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                	<button type="submit" class="btn btn-primary">Save</button>
            	</div>
            </div>
        </div>
    </div>
</div>
</form>

<?php foreach($user as $baris): ?>
<div class="modal fade" tabindex="-1" id="detail<?php echo $baris->id_user; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Detail Data Pengguna</h2>
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
                    <label class="mx-4"></label>
                    <div class="my-3 text-center"><img src="<?php echo base_url('assets/upload/foto_pengguna/') . $baris->foto; ?>" alt="" width="150" height="150" onerror="this.onerror = null; this.src = '<?= base_url('assets/media/avatars/avatar.png') ?>'"></div>
                    <span class="font-13 text-muted"></span>
                </div>
                <br>
            	<div class="d-flex flex-wrap gap-5">
            		<div class="fv-row w-100 flex-md-root">
            			<label class="form-label required form-label font-weight">Nama</label>
            			<input type="text" class="form-control" value="<?php echo $baris->nama;?>" readonly />
            		</div>
            		<div class="fv-row w-100 flex-md-root">
            			<label class="form-label required form-label font-weight">Role</label>
            			<input type="text" class="form-control mb-2" value="<?php echo $baris->nama_user;?>" readonly/>
            		</div>
            	</div>

            	<div class="d-flex flex-wrap gap-5">
            		<div class="fv-row w-100 flex-md-root">
            			<label class="form-label required form-label font-weight">No. HP</label>
            			<input type="text" class="form-control mb-2" value="<?php echo $baris->hp;?>" readonly />
            		</div>
            		<div class="fv-row w-100 flex-md-root">
            			<label class="form-label required form-label font-weight">Email</label>
            			<input type="text" class="form-control mb-2" value="<?php echo $baris->email;?>" readonly/>
            		</div>
            	</div>

            	<div class="d-flex flex-wrap gap-5">
            		<div class="fv-row w-100 flex-md-root">
            			<label class="form-label required form-label font-weight">Username</label>
            			<input type="text" class="form-control mb-2" value="<?php echo $baris->username;?>" readonly />
            		</div>
            		<div class="fv-row w-100 flex-md-root">
            			<label class="form-label required form-label font-weight ">Password</label>
            			<input type="text" class="form-control mb-2" value="<?php echo $baris->password;?>" readonly />
            		</div>
            	</div>	
                
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
</div>
<?php endforeach;?>

<?php foreach($user as $baris): ?>
<form class="user" action="<?php echo site_url('data_pengguna_c/edit/');?>" method="post" enctype="multipart/form-data">
<div class="modal fade" tabindex="-1" id="edit<?php echo $baris->id_user; ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Data Pengguna</h2>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                	<div class="symbol symbol-50px">
                		<div class="symbol-label fs-2 fw-semibold text-dark">x</div>
					</div>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
            	<input type="hidden" value="<?php echo $baris->id_user;?>" name="id_user">
                <input type="hidden" value="<?php echo $baris->foto;?>" name="fotolama">
                <input type="hidden" value="<?php echo $baris->role;?>" name="role">
                <div class="row">
            		<div class="col-md-6">
		                <div class="form-group">
		                	<label for="exampleFormControlInput1" class="required form-label">Nama</label>
		                	<input type="text" placeholder="" class="form-control" name="nama" value="<?php echo $baris->nama;?>">
		                	<span class="font-13 text-muted"></span>
		                </div>
		                <br>
		                <div class="form-group">
		                	<label for="exampleFormControlInput1" class="required form-label">No. HP</label>
		                	<input type="text" placeholder="" data-mask="" class="form-control" name="hp" value="<?php echo $baris->hp;?>">
		                	<span class="font-13 text-muted"> </span>
		                </div>
		                <br>
		                <div class="form-group">
		                	<label for="exampleFormControlInput1" class="required form-label">Username</label>
		                	<input type="text" placeholder=""  class="form-control" name="username" value="<?php echo $baris->username;?>">
		                	<span class="font-13 text-muted"> </span>
		                </div>
		            </div>
		            <div class="col-md-6">
		                <div class="form-group">
		                	<label for="exampleFormControlInput1" class="required form-label">Role</label>
	                		<?php if ($getGrup == 1 || $getGrup == 2) : ?>
	                		<select class="form-control" id="role" name="role">
	                			<?php endif ?>
	                			<option value="" hidden disabled selected><?php echo $baris->nama_user;?></option>
	                			<?php if ($getGrup == 1) : ?>
	                			<option value="1">Admin</option>
	                			<option value="2">Supervisor</option>
	                			<?php endif ?>
	                			<?php if ($getGrup == 1 || $getGrup == 2) : ?>
	                			<option value="3">Acounting</option>
	                			<option value="4">CS</option>
	                			<?php endif ?>
	                		</select>
		                </div>
		                <br>
		                <div class="form-group">
		                	<label for="exampleFormControlInput1" class="required form-label">Email</label>
		                	<input type="text" placeholder=""  class="form-control" name="email" value="<?php echo $baris->email;?>">
		                	<span class="font-13 text-muted"> </span>
		                </div>
		                <br>
		                <div class="form-group">
		                	<label for="exampleFormControlInput1" class="required form-label">Password</label>
		                	<input type="text" placeholder=""  class="form-control" name="password" value="<?php echo $baris->password;?>">
		                	<span class="font-13 text-muted"> </span>
		                </div>
		            </div>
		        </div>
                <br>
                <div class="form-group">
                	<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                		<label for="exampleFormControlInput1" class="required form-label">Foto</label>
                		<div class="image-input-wrapper w-150px h-150px" style="background-image: url(<?php echo base_url('assets/upload/foto_pengguna/') . $baris->foto ?>)"></div>
                		<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Pilih foto">
                			<i class="bi bi-pencil-fill fs-7"></i>
                			<!--begin::Inputs-->
                			<input type="file" name="filefoto" accept=".png, .jpg, .jpeg" />
                		</label>
                		<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                			<i class="bi bi-x fs-2"></i>
                		</span>
                		<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                			<i class="bi bi-x fs-2"></i>
                		</span>
                	</div>
                </div>
                <div class="d-flex justify-content-end">
                	<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                	<button type="submit" class="btn btn-primary">Save</button>
            	</div>
            </div>
        </div>
    </div>
</div>
</form>
<?php endforeach;?>

<?php foreach($user as $baris): ?>
<form class="user" action="<?php echo site_url('data_pengguna_c/hapus_data/');?>" method="post" enctype="multipart/form-data">
	<div class="modal fade" tabindex="-1" id="delete<?php echo $baris->id_user; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body table text-center">
                <div class="row">
                	<i class="fas fa-exclamation-circle text-warning fs-5x pt-5"></i>
                        <div class="pt-5">
                        	<input type="hidden" value="<?php echo $baris->id_user;?>" name="id_user">
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
<?php endforeach;?>
<?php endif ?>


