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
					<h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Laporan Metal Genix</h1>
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
						<li class="breadcrumb-item text-muted">
							<a href="<?php echo site_url('metal_genix_c');?>" class="text-muted text-hover-primary">Laporan Metal Genix</a>
						</li>
						<!--end::Item-->
						<!--begin::Item-->
						<li class="breadcrumb-item">
							<span class="bullet bg-gray-400 w-5px h-2px"></span>
						</li>
						<!--end::Item-->
						<!--begin::Item-->
						<li class="breadcrumb-item text-muted">Filter</li>
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
							<a href="<?php echo site_url('metal_genix_c');?>"><button type="button" class="btn btn-primary">Reset</button></a>
						</div>
					<!--<a href="#" data-bs-toggle="modal" data-bs-target="#tambah" class="btn btn-primary">Tambah Data</a>-->
				</div>
					<!--begin::Card body-->
					<div class="card-body pt-0">
						<form method="post" action="<?php echo site_url('metal_genix_c/delete') ?>">
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
										<th class="min-w-125px">Tanggal</th>
										<th class="min-w-125px">Keterangan</th>
										<th class="min-w-125px">Debit</th>
										<th class="min-w-125px">Kredit</th>
										<th class="text-end min-w-70px">Actions</th>
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
												<input class="form-check-input" type="checkbox" name="id_metal_genix[]" value='<?php echo $baris->id_metal_genix; ?>'/>
											</div>
										</td>
										<td><?php echo $baris->tanggal;?></td>
										<td><?php echo $baris->ket;?></td>
										<td><?php echo $baris->debit;?></td>
										<td><?php echo $baris->kredit;?></td>
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
														<a href="#" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row" data-bs-toggle="modal" data-bs-target="#detail<?php echo $baris->id_metal_genix; ?>">Detail</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#edit<?php echo $baris->id_metal_genix; ?>">Edit</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row" data-bs-toggle="modal" data-bs-target="#delete<?php echo $baris->id_metal_genix; ?>">Delete</a>
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

<?php foreach($user as $baris): ?>
<form class="user" action="<?php echo site_url('metal_genix_c/edit/');?>" method="post" enctype="multipart/form-data">
<div class="modal fade" tabindex="-1" id="edit<?php echo $baris->id_metal_genix; ?>">
    <div class="modal-dialog">
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
            	 	<input type="hidden" value="<?php echo $baris->id_metal_genix;?>" name="id_metal_genix">
                    <input type="hidden" value="<?php echo $baris->foto;?>" name="fotolama">
                    <input type="hidden" value="<?php echo $baris->id_kategori;?>" name="kategori">
                    <input type="hidden" value="<?php echo $baris->jenis_uang;?>" name="jenis_uang">
                <div class="form-group">
                	<label for="exampleFormControlInput1" class="required form-label">Kategori</label>
                	<select class="form-control" id="kategori2<?php echo $baris->id_metal_genix; ?>" name="kategori" >
                		<option value="" hidden disabled selected><?php echo $baris->kategori;?></option>
                		<?php foreach($data->result() as $row):?>
                			<option value="<?php echo $row->id_kategori;?>"><?php echo $row->kategori;?></option>
                			<?php endforeach;?>
                	</select>
                </div>
                <br>
                <div class="form-group">
                	<label for="exampleFormControlInput1" class="required form-label">Jenis Uang:</label>
                		<select name="jenis_uang" class="jenis_uang2<?php echo $baris->id_metal_genix; ?> form-control">
                			<option value="" hidden disabled selected><?php echo $baris->jenis_uang;?></option>
                		</select>
                </div>
                <br>

                <div class="form-group">
                	<label for="exampleFormControlInput1" class="required form-label">Tanggal</label>
                	<input type="date" placeholder="" class="form-control" id="tanggal" name="tanggal" value="<?php echo $baris->tanggal;?>">
                	<span class="font-13 text-muted"></span>
                </div>
                <br>
                <div class="form-group">
                	<label for="exampleFormControlInput1" class="required form-label">Keterangan</label>
                	<input type="text" placeholder="" data-mask="" class="form-control" id="ket" name="ket" value="<?php echo $baris->ket;?>">
                	<span class="font-13 text-muted"> </span>
                </div>
                <br>
                <div class="form-group">
                	<label for="exampleFormControlInput1" class="required form-label">Debit</label>
                	<input type="text" placeholder=""  class="form-control" name="debit" value="<?php echo $baris->debit;?>">
                	<span class="font-13 text-muted"> </span>
                </div>
                <br>
                <div class="form-group">
                	<label for="exampleFormControlInput1" class="required form-label">Kredit</label>
                	<input type="text" placeholder=""  class="form-control" name="kredit" value="<?php echo $baris->kredit;?>">
                	<span class="font-13 text-muted"></span>
                </div>
                <br>
                <div class="form-group">
                	<label for="exampleFormControlInput1" class="required form-label font-weight" >Catatan:</label class="font-weight-bold" style="color: #292f4a;">
                	<textarea class="form-control input-default" type="text" id="catatan" name="catatan"  style="width: 100%; height: 80px; resize: none;"><?php echo $baris->catatan;?></textarea>
                </div>
                <br>
                <div class="form-group">
                	<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                		<label for="exampleFormControlInput1" class="required form-label">Foto</label>
                		<div class="image-input-wrapper w-150px h-150px" style="background-image: url(<?php echo base_url('assets/upload/foto_nota/') . $baris->foto ?>)"></div>
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
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>

              <script type="text/javascript">

				$(document).ready(function(){
					$('#kategori2<?php echo $baris->id_metal_genix; ?>').change(function(){
						var id_kategori=$(this).val();
						$.ajax({
							url : "<?php echo site_url();?>/metal_genix_c/get_subkategori",
							method : "POST",
							data : {id_kategori: id_kategori},
							async : false,
							dataType : 'json',
							success: function(data){
								var html = '';
								var i;
								for(i=0; i<data.length; i++){
									html += '<option>'+data[i].jenis_uang+'</option>';
								}
								$('.jenis_uang2<?php echo $baris->id_metal_genix; ?>').html(html);
							}
						});
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
<div class="modal fade" tabindex="-1" id="detail<?php echo $baris->id_metal_genix; ?>">
    <div class="modal-dialog">
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
            	<div class="card-body p-9">
            		<div class="row mb-7">
	            		<label class="col-lg-4 fw-semibold text-muted">Kategori Uang</label>
	            		<div class="col-lg-8">
	            			<span class="fw-bold fs-6 text-gray-800"><?php echo $baris->kategori;?></span>
	            		</div>
	            	</div>
            		<div class="row mb-7">
	            		<label class="col-lg-4 fw-semibold text-muted">Jenis Uang</label>
	            		<div class="col-lg-8">
	            			<span class="fw-bold fs-6 text-gray-800"><?php echo $baris->jenis_uang;?></span>
	            		</div>
	            	</div>
            		<div class="row mb-7">
	            		<label class="col-lg-4 fw-semibold text-muted">Tanggal</label>
	            		<div class="col-lg-8">
	            			<span class="fw-bold fs-6 text-gray-800"><?php echo $baris->tanggal;?></span>
	            		</div>
	            	</div>
            		<div class="row mb-7">
	            		<label class="col-lg-4 fw-semibold text-muted">Keterangan</label>
	            		<div class="col-lg-8">
	            			<span class="fw-bold fs-6 text-gray-800"><?php echo $baris->ket;?></span>
	            		</div>
	            	</div>
            		<div class="row mb-7">
	            		<label class="col-lg-4 fw-semibold text-muted">Debit</label>
	            		<div class="col-lg-8">
	            			<span class="fw-bold fs-6 text-gray-800"><?php echo $baris->debit;?></span>
	            		</div>
	            	</div>
            		<div class="row mb-7">
	            		<label class="col-lg-4 fw-semibold text-muted">Kredit</label>
	            		<div class="col-lg-8">
	            			<span class="fw-bold fs-6 text-gray-800"><?php echo $baris->kredit;?></span>
	            		</div>
	            	</div>
            		<div class="row mb-7">
	            		<label class="col-lg-4 fw-semibold text-muted">Catatan</label>
	            		<div class="col-lg-8">
	            			<span class="fw-bold fs-6 text-gray-800"><?php echo $baris->catatan;?></span>
	            		</div>
	            	</div>
                	<div class="form-group">
                		<label class="fw-semibold text-muted py-5">Foto</label>
                		<div class="my-3 text-center"><img src="<?php echo base_url('assets/upload/foto_nota/') . $baris->foto ?>" height="200"></div>
	                    <span class="font-13 text-muted"></span>
                    </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
</div>
<?php endforeach;
    ?>


<?php foreach($user as $baris): ?>
<form class="user" action="<?php echo site_url('metal_genix_c/hapus_data/');?>" method="post" enctype="multipart/form-data">
	<div class="modal fade" tabindex="-1" id="delete<?php echo $baris->id_metal_genix; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body table text-center">
                <div class="row">
                	<i class="fas fa-exclamation-circle text-warning fs-5x pt-5"></i>
                        <div class="pt-5">
                        	<input type="hidden" value="<?php echo $baris->id_metal_genix;?>" name="id_metal_genix">
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
<script src="<?php echo base_url();?>assets/js/scripts.bundle.js"></script>

<script type="text/javascript">

$(document).ready(function(){
	$('#kategori').change(function(){
		var id_kategori=$(this).val();
		$.ajax({
			url : "<?php echo base_url();?>index.php/metal_genix_c/get_subkategori",
			method : "POST",
			data : {id_kategori: id_kategori},
			async : false,
			dataType : 'json',
			success: function(data){
				var html = '';
				var i;
				for(i=0; i<data.length; i++){
					html += '<option>'+data[i].jenis_uang+'</option>';
				}
				$('.jenis_uang').html(html);
			}
		});
		$("#debit, #kredit, #debit1, #kredit1").hide()
		if($(this).val() == "1"){
			$("#kredit, #kredit1").show();
		}else{
			$("#debit, #debit1").show();
		}
	});
});
</script>




