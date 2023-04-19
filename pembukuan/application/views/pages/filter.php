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
							<!--<div class="d-flex align-items-center position-relative my-1 fw-semibold fs-6">
								Bulan : <?php echo date('F Y');?>
							</div>-->
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
										<th class="w-10px pe-2">
											<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
												<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#table .form-check-input"  />
											</div>
										</th>
										<th class="text-end min-w-100px text-center">Tanggal</th>
										<th class="text-end min-w-100px text-center">Keterangan</th>
										<th class="text-end min-w-100px text-center">Debit</th>
										<th class="text-end min-w-100px text-center">Kredit</th>
										<th class="min-w-100px text-center">Foto Nota</th>
										<th class="text-end min-w-10px">Actions</th>
									</tr>
									<!--end::Table row-->
								</thead>
								<!--end::Table head-->
								<!--begin::Table body-->
								<?php 
								//$no = 1; //no default 1
								foreach ($metal->result() as $baris) { //
								?>
								<tbody class="fw-semibold text-gray-600">
									<!--begin::Table row-->
									<tr>
										<!--begin::Checkbox-->
										<td>
											<div class="form-check form-check-sm form-check-custom form-check-solid">
												<input class="form-check-input" type="checkbox" name="id_usaha[]" value='<?php echo $baris->id_usaha; ?>'/>
											</div>
										</td>
										<!--end::Checkbox-->
										<!--begin::Type=-->
										<td class="text-end pe-0 text-center"><?php echo $baris->tanggal;?></td>
										<td class="text-end pe-0 text-center"><?php echo $baris->ket;?></td>
										<td class="text-end pe-0 text-center"><?php echo $baris->debit;?></td>
										<td class="text-end pe-0 text-center"><?php echo $baris->kredit;?></td>
										<td class="text-end pe-0 text-center"><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#detail_foto<?php echo $baris->id_usaha; ?>"><img src="<?php echo base_url('assets/upload/foto_nota/') . $baris->foto; ?>" alt="" width="60" height="60" onerror="this.onerror = null; this.src = '<?= base_url('assets/media/avatars/avatar.png') ?>'"></button></td>
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
														<a href="#" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row" data-bs-toggle="modal" data-bs-target="#detail<?php echo $baris->id_usaha; ?>" id="btn_detail<?php echo $baris->id_usaha; ?>">Detail</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#edit<?php echo $baris->id_usaha; ?>" id="btn_edit<?php echo $baris->id_usaha; ?>">Edit</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row" data-bs-toggle="modal" data-bs-target="#delete<?php echo $baris->id_usaha; ?>">Delete</a>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu-->
											</td>
											<!--end::Action=-->
										</tr>
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
													<th><strong>TOTAL</strong></th>
													<th colspan="1"></th>
						                            <th class="text-end pe-0 text-center">Rp <?php echo $total_debit?> </th>
						                            <th class="text-end pe-0 text-center">Rp <?php echo $total_kredit;?></th>
						                            <th></th>
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

	<!--<div id="kt_app_content" class="app-content flex-column-fluid">
		
		<div id="kt_app_content_container" class="app-container container-xxl">
			
			<div class="card card-flush">
				
				<div class="card-header align-items-center py-5 gap-2 gap-md-5">
					
				</div>
				<div class="card-body pt-0">
					<div class="form-group row ">
						<label for="example-text-input" class="col-sm-2 col-form-label"><h6>Saldo Awal</h6></label>
						<div class="col-sm-3">
							<div class="input-group mb-5">
	            				<span class="input-group-text">Rp</span>
								<input class="form-control" type="text" value="" id="" readonly>
							</div>
						</div>
					</div>					
					<div class="form-group row">
						<label for="example-search-input" class="col-sm-2 col-form-label"><h6>Mutasi Kredit</h6></label>
						<div class="col-sm-3">
							<div class="input-group mb-5">
            					<span class="input-group-text">Rp</span>
								<input class="form-control" type="text" value="" id="" readonly>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="example-search-input" class="col-sm-2 col-form-label"><h6>Mutasi Debit</h6></label>
						<div class="col-sm-3">
							<div class="input-group mb-5">
            					<span class="input-group-text">Rp</span>
								<input class="form-control" type="text" value="" id="" readonly>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="example-search-input" class="col-sm-2 col-form-label"><h6>Saldo Akhir</h6></label>
						<div class="col-sm-3">
							<div class="input-group mb-5">
            					<span class="input-group-text">Rp</span>
								<input class="form-control" type="text" value="" id="" readonly>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>-->

<?php foreach($user as $baris): ?>
<form class="user" action="<?php echo site_url('usaha_c/edit/'.$id_nama_usaha);?>" method="post" enctype="multipart/form-data">
<div class="modal fade" tabindex="-1" id="edit<?php echo $baris->id_usaha; ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Data</h2>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                	<div class="symbol symbol-50px">
                		<div class="symbol-label fs-2 fw-semibold text-dark">x</div>
					</div>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
            	<input type="hidden" value="<?php echo $baris->id_usaha;?>" name="id_usaha">
                <input type="hidden" value="<?php echo $baris->foto;?>" name="fotolama">
                <input type="hidden" value="<?php echo $baris->id_kategori;?>" name="kategori">
                <input type="hidden" value="<?php echo $baris->jenis_uang;?>" name="jenis_uang">
                <input type="hidden" name="id_nama_usaha" value="<?php echo $id_nama_usaha;?>">
                <div class="row">
            		<div class="col-md-6">
		                <div class="form-group">
		                	<label for="exampleFormControlInput1" class="required form-label">Kategori Uang</label>
		                	<input type="text" placeholder="" class="form-control" value="<?php echo $baris->kategori;?>" readonly>
		                	<span class="font-13 text-muted"></span>
		                </div>
		                <br>
		                <div class="form-group">
		                	<label for="exampleFormControlInput1" class="required form-label">Tanggal</label>
		                	<input type="date" placeholder="" class="form-control" id="tanggal" name="tanggal" value="<?php echo $baris->tanggal;?>">
		                	<span class="font-13 text-muted"></span>
		                </div>
		                <br>
		                <div class="form-group">
		                	<label for="exampleFormControlInput1" class="required form-label font-weight" >Keterangan</label class="font-weight-bold" style="color: #292f4a;">
		                	<textarea class="form-control input-default" type="text" id="ket" name="ket"  style="width: 100%; height: 80px; resize: none;"><?php echo $baris->ket;?></textarea>
		                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		                	<label for="exampleFormControlInput1" class="required form-label">Jenis Uang</label>
		                	<input type="text" placeholder="" class="form-control" name="jenis_uang" value="<?php echo $baris->jenis_uang;?>" readonly>
		                	<span class="font-13 text-muted"></span>
		                </div>
		                <br>
		                <?php
		                if($baris->id_kategori == 1) {
		                	$input_kredit = '';
		                	$input_debit = 'd-none';
		                }else if($baris->id_kategori == 2){
		                	$input_kredit = 'd-none';
		                	$input_debit = '';
		                }else{
		                	$input_kredit = '';
		                	$input_debit = '';
		                }
		                ?>
		                <div class="form-group <?=$input_debit;?>" id="debit_edit<?php echo $baris->id_usaha; ?>">
		                	<label for="exampleFormControlInput1" class="required form-label">Debit</label>
		                	<div class="input-group mb-5"><span class="input-group-text" >Rp</span>
		                	<input type="text" placeholder=""  class="form-control" name="debit" value="<?php echo $baris->debit;?>">
		                	</div>
		                </div>
		                <div class="form-group <?=$input_kredit;?>" id="kredit_edit<?php echo $baris->id_usaha; ?>">
		                	<label for="exampleFormControlInput1" class="required form-label">Kredit</label>
		                	<div class="input-group mb-5">
		                	<span class="input-group-text">Rp</span>
		                	<input type="text" placeholder=""  class="form-control" name="kredit" value="<?php echo $baris->kredit;?>">
		                	</div>
		                </div>
		                <div class="form-group pt-1">
		                	<label for="exampleFormControlInput1" class="required form-label font-weight" >Catatan:</label class="font-weight-bold" style="color: #292f4a;">
		                	<textarea class="form-control input-default" type="text" id="catatan" name="catatan"  style="width: 100%; height: 80px; resize: none;"><?php echo $baris->catatan;?></textarea>
		                </div>
		            </div>
		        </div>
		        <div class="form-group">
		            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
		            	<label for="exampleFormControlInput1" class="required form-label">Foto</label>
		            	<div class="image-input-wrapper w-150px h-150px" style="background-image: url(<?php echo base_url('assets/upload/foto_nota/') . $baris->foto ?>)"></div>
		            	<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Pilih foto">
		            		<i class="bi bi-pencil-fill fs-7"></i>
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

		                

              <script type="text/javascript">

				$(document).ready(function(){
					$('#btn_edit<?php echo $baris->id_usaha; ?>').on('click',function(e){
						e.preventDefault();
						var id_kategori=$(this).val();
						//$("#debit_edit<?php echo $baris->id_metal_genix; ?>, #kredit_edit<?php echo $baris->id_metal_genix; ?>").hide();
						if($(this).val() == '1'){
							$("#debit_edit<?php echo $baris->id_usaha; ?>").show();
						}else if($(this).val() == '2'){
							$("#kredit_edit<?php echo $baris->id_usaha; ?>").show();
						}
					});
				});
				</script>
            </div>
        </div>
    </div>
</div>
</form>
<?php endforeach;
    ?>

<?php foreach($user as $baris): ?>
<div class="modal fade" tabindex="-1" id="detail<?php echo $baris->id_usaha; ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Detail Data</h2>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                	<div class="symbol symbol-50px">
                		<div class="symbol-label fs-2 fw-semibold text-dark">x</div>
					</div>
                </div>
            </div>

            <div class="modal-body">
            	<div class="row">
            		<div class="col-md-6">
            			<div class="form-group">
            				<label for="exampleFormControlInput1" class="required form-label">Kategori Uang</label>
            				<input type="text" placeholder="" class="form-control" id="" name="ket" value="<?php echo $baris->kategori;?>" readonly>
            				<span class="font-13 text-muted"></span>
            			</div>
            			<br>
            			<div class="form-group">
            				<label for="exampleFormControlInput1" class="required form-label">Tanggal</label>
            				<input type="" placeholder="" class="form-control" name="tanggal" value="<?php echo $baris->tanggal;?>" readonly>
            				<span class="font-13 text-muted"></span>
            			</div>
            			<br>
            			<div class="form-group">
            				<label for="exampleFormControlInput1" class="required form-label" class="font-weight">Keterangan</label class="font-weight-bold" style="color: #292f4a;">
            				<textarea class="form-control input-default" type="text"  name="ket"  style="width: 100%; height: 80px; resize: none;" readonly=""><?php echo $baris->ket;?></textarea>
            			</div>
            		</div>
            		<div class="col-md-6">
            			<div class="form-group">
            				<label for="exampleFormControlInput1" class="required form-label">Jenis Uang</label>
            				<input type="text" placeholder="" class="form-control" name="jenis_uang" value="<?php echo $baris->jenis_uang;?>" readonly>
            				<span class="font-13 text-muted"></span>
            			</div>
            			<br>
            			<?php
		                if($baris->id_kategori == 1) {
		                	$input_kredit = '';
		                	$input_debit = 'd-none';
		                }else if($baris->id_kategori == 2){
		                	$input_kredit = 'd-none';
		                	$input_debit = '';
		                }else{
		                	$input_kredit = '';
		                	$input_debit = '';
		                }
		                ?>
            			<div class="form-group <?=$input_debit;?>" id="debit_detail<?php echo $baris->id_usaha; ?>">
            				<label for="exampleFormControlInput1" class="required form-label" >Debit</label>
            				<div class="input-group mb-5">
            					<span class="input-group-text">Rp</span>
            					<input type="text" class="form-control" name="debit" value="<?php echo $baris->debit;?>" readonly/>
            				</div>
            			</div>
            			<div class="form-group <?=$input_kredit;?>" id="kredit_detail<?php echo $baris->id_usaha; ?>">
            				<label for="exampleFormControlInput1" class="required form-label" >Kredit</label>
            				<div class="input-group mb-5">
            					<span class="input-group-text" >Rp</span>
            					<input type="text" class="form-control" name="kredit" value="<?php echo $baris->kredit;?>" readonly/>
            				</div>
            			</div>
            			<div class="form-group pt-2">
            				<label for="exampleFormControlInput1" class="required form-label" class="font-weight">Catatan</label class="font-weight-bold" style="color: #292f4a;">
            				<textarea class="form-control input-default" type="text" name="catatan"  style="width: 100%; height: 80px; resize: none;" readonly="" ><?php echo $baris->catatan;?></textarea>
            			</div>
            		</div>
            	</div>
            	<div class="form-group pt-2">
            		<div class="my-3 text-center"><img src="<?php echo base_url('assets/upload/foto_nota/') . $baris->foto ?>" height="200"></div>
            		<span class="font-13 text-muted"></span>
            	</div>
            </div>
            <div class="modal-footer">
            	<script type="text/javascript">

				$(document).ready(function(){
					$('#btn_detail<?php echo $baris->id_usaha; ?>').on('click',function(e){
						e.preventDefault();
						var id_kategori<?php echo $baris->id_usaha; ?>=$(this).val();
						//$("#debit_detail<?php echo $baris->id_metal_genix; ?>, #kredit_detail<?php echo $baris->id_metal_genix; ?>").hide();
						if($(this).val() == '1'){
							$("#debit_detail<?php echo $baris->id_usaha; ?>").show();
						}else{
							$("#kredit_detail<?php echo $baris->id_usaha; ?>").show();
						}
					});
				});
				</script>
            </div>
        </div>
    </div>
</div>
</div>
<?php endforeach;
    ?>

<?php foreach($user as $baris): ?>
<form class="user" action="<?php echo site_url('usaha_c/hapus_data/'.$id_nama_usaha);?>" method="post" enctype="multipart/form-data">
	<div class="modal fade" tabindex="-1" id="delete<?php echo $baris->id_usaha; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-body table text-center">
                <div class="row">
                	<i class="fas fa-exclamation-circle text-warning fs-5x pt-5"></i>
                        <div class="pt-5">
                        	<input type="hidden" value="<?php echo $baris->id_usaha;?>" name="id_usaha">
                        	<input type="hidden" name="id_nama_usaha" value="<?php echo $id_nama_usaha;?>">
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

<?php foreach($user as $baris): ?>
<div class="modal fade" tabindex="-1" id="detail_foto<?php echo $baris->id_usaha; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               	<h2 class="modal-title">Detail Foto Nota</h2>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                	<div class="symbol symbol-50px">
                		<div class="symbol-label fs-2 fw-semibold text-dark">x</div>
					</div>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
            	<div class="card-body text-center">
                    <img src="<?php echo base_url('assets/upload/foto_nota/') . $baris->foto; ?>" alt="" width="280" height="280">
                        
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
</form>
<?php endforeach;
    ?>









