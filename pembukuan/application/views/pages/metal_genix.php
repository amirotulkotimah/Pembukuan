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
						<li class="breadcrumb-item text-muted">Laporan Metal Genix</li>
						<!--end::Item-->
					</ul>
					<!--end::Breadcrumb-->
				</div>
				<!--end::Page title-->
				<!--begin::Actions-->
				<div class="d-flex align-items-center gap-2 gap-lg-3">
					<!--begin::Filter menu-->
					<div class="m-0">
						<!--begin::Menu toggle-->
						<a href="#" class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
							<!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
							<span class="svg-icon svg-icon-6 svg-icon-muted me-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->Filter</a>
							<!--end::Menu toggle-->
							<!--begin::Menu 1-->
							<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_63d12d561698e">
								<!--begin::Header-->
								<div class="px-7 py-5">
									<div class="fs-5 text-dark fw-bold">Filter Options</div>
								</div>
								<form action="<?php echo site_url('metal_genix_c/filter'); ?>" method="get" >
									<!--end::Header-->
									<!--begin::Menu separator-->
									<div class="separator border-gray-200"></div>
									<!--end::Menu separator-->
									<!--begin::Form-->
									<div class="px-7 py-5">
										<div class="modal-body">
											<div class="mb-10">
												<label for="inputMulaiTanggal" class="form-label fw-semibold">Mulai Tanggal :</label>
												<input type="date" id="inputMulaiTanggal" name="mulai_tanggal" class="form-control" required>
											</div>
											<div class="mb-10">
												<label for="inputSampaiTanggal" class="form-label fw-semibold">Sampai Tanggal :</label>
												<input type="date" id="inputSampaiTanggal" name="sampai_tanggal" class="form-control" required>
											</div>
											<!--begin::Actions-->
											<div class="d-flex justify-content-end">
												<button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
												<button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
											</div>
											<!--end::Actions-->
										</div>
										<!--end::Form-->
									</div>
									<!--end::Menu 1-->
								</form>
							</div>
						</div>
						<!--end::Filter menu-->
					</div>
					<!--end::Actions-->
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
								Bulan : <?php echo date('F Y');?>
							</div>
						</div>
					<a href="#" data-bs-toggle="modal" data-bs-target="#tambah" class="btn btn-primary">Tambah Data</a>
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
										<th class="hidden"></th>
										<th>Tanggal</th>
										<th>Keterangan</th>
										<th>Debit</th>
										<th>Kredit</th>
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
										<!--end::Checkbox-->
										<!--begin::Type=-->
										<td class="hidden"></td>
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
														<a href="#" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row" data-bs-toggle="modal" data-bs-target="#detail<?php echo $baris->id_metal_genix; ?>" id="btn_detail<?php echo $baris->id_metal_genix; ?>">Detail</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#edit<?php echo $baris->id_metal_genix; ?>" id="btn_edit<?php echo $baris->id_metal_genix; ?>">Edit</a>
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
													<th class="hidden"></th>
													<th><strong>TOTAL</strong></th>
						                            <th colspan="1" ></th>
						                            <th>Rp <?php echo $total_debit;?> </th>
						                            <th>Rp <?php echo $total_kredit;?></th>
						                            <th></th>
												</tr>
											</tfoot>
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

	<div id="kt_app_content" class="app-content flex-column-fluid">
		<!--begin::Content container-->
		<div id="kt_app_content_container" class="app-container container-xxl">
			<!--begin::Category-->
			<div class="card card-flush">
				<!--begin::Card header-->
				<div class="card-header align-items-center py-5 gap-2 gap-md-5">
					
				</div>
				<div class="card-body pt-0">
					<div class="form-group row ">
						<label for="example-text-input" class="col-sm-2 col-form-label"><h6>Saldo Awal</h6></label>
						<div class="col-sm-3">
							<input class="form-control" type="text" value="Rp <?php echo $saldo_awal;?>" id="" disabled="">
						</div>
					</div>
					<br>					
					<div class="form-group row">
						<label for="example-search-input" class="col-sm-2 col-form-label"><h6>Mutasi Kredit</h6></label>
						<div class="col-sm-3">
							<input class="form-control" type="text" value="Rp <?php echo $total_kredit;?> " id="" disabled="">
						</div>
					</div>
					<br>
					
					<div class="form-group row">
						<label for="example-search-input" class="col-sm-2 col-form-label"><h6>Mutasi Debit</h6></label>
						<div class="col-sm-3">
							<input class="form-control" type="text" value="Rp <?php echo $total_debit;?> " id="" disabled="">
						</div>
					</div>
					<br>

					<div class="form-group row">
						<label for="example-search-input" class="col-sm-2 col-form-label"><h6>Saldo Akhir</h6></label>
						<div class="col-sm-3">
							<input class="form-control" type="text" value="Rp <?php echo $saldo_akhir;?> " id="" disabled="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<form class="user" action="<?php echo site_url('metal_genix_c/input/');?>" method="post" enctype="multipart/form-data">

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
			                	<label for="exampleFormControlInput1" class="required form-label">Kategori</label>
			                	<select class="form-control" id="kategori" name="kategori" required="">
			                		<option value="" hidden disabled selected>--pilih--</option>
			                			<?php foreach($data->result() as $row):?>
			                			<option value="<?php echo $row->id_kategori;?>"><?php echo $row->kategori;?></option>
			                			<?php endforeach;?>
			                	</select>
			                </div>
			                <br>
			                <div class="form-group">
		                		<label for="exampleFormControlInput1" class="required form-label">Tanggal</label>
		                		<input type="date" placeholder="" class="form-control" id="tanggal" name="tanggal" value="">
		                		<span class="font-13 text-muted"></span>
		                	</div>
		                	<br>
		                	<div class="form-group">
			                	<label for="exampleFormControlInput1" class="required form-label" class="font-weight">Keterangan</label class="font-weight-bold" style="color: #292f4a;">
			                	<textarea class="form-control input-default" type="text" id="ket" name="ket"  style="width: 100%; height: 80px; resize: none;" required ></textarea>
			                </div>                                                           
 
                            </div>
                            <div class="col-md-6">
                            	<div class="form-group">
                            		<label for="exampleFormControlInput1" class="required form-label">Jenis Uang:</label>
                            		<select name="jenis_uang" class="jenis_uang form-control">
                            			<option value="0">--pilih--</option>
                            		</select>
                            	</div>
                            	<br>
			                	<div class="form-group" id="debit_tambah">
			                		<label for="exampleFormControlInput1" class="required form-label">Debit</label>
			                		<div class="input-group mb-5">
			                			<span class="input-group-text">Rp</span>
			                			<input type="text" class="form-control" name="debit" value=""/>
									</div>
			                	</div>
			                	<div class="form-group" id="kredit_tambah">
			                		<label for="exampleFormControlInput1" class="required form-label" >Kredit</label>
			                		<div class="input-group mb-5">
				                		<span class="input-group-text">Rp</span>
									    <input type="text" class="form-control" name="kredit" value=""/>
									</div>
			                	</div>
			                	<div class="form-group pt-1">
			                		<label for="exampleFormControlInput1" class="required form-label" class="font-weight">Catatan</label class="font-weight-bold" style="color: #292f4a;">
			                		<textarea class="form-control input-default" type="text" id="catatan" name="catatan"  style="width: 100%; height: 80px; resize: none;" required ></textarea>
			                	</div>
			                </div>
			            </div>

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
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>&nbsp&nbsp
                <button type="submit" class="btn btn-primary">Save</button>
            	</div>
            </div>

                <script type="text/javascript">

				$(document).ready(function(){
					$('#kategori').change(function(){
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
								$('.jenis_uang').html(html);
							}
						});
						$("#debit_tambah, #kredit_tambah").hide()
						if($(this).val() == '1'){
							$("#kredit_tambah").show();
						}else{
							$("#debit_tambah").show();
						}
					});
				});
				</script>
            </div>
            </div>
        </div>
    </div>
</form>

<?php foreach($user as $baris): ?>
<form class="user" action="<?php echo site_url('metal_genix_c/edit/');?>" method="post" enctype="multipart/form-data">
<div class="modal fade" tabindex="-1" id="edit<?php echo $baris->id_metal_genix; ?>">
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
            	<input type="hidden" value="<?php echo $baris->id_metal_genix;?>" name="id_metal_genix">
                <input type="hidden" value="<?php echo $baris->foto;?>" name="fotolama">
                <input type="hidden" value="<?php echo $baris->id_kategori;?>" name="kategori">
                <input type="hidden" value="<?php echo $baris->jenis_uang;?>" name="jenis_uang">
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
		                <div class="form-group <?=$input_debit;?>" id="debit_edit<?php echo $baris->id_metal_genix; ?>">
		                	<label for="exampleFormControlInput1" class="required form-label">Debit</label>
		                	<div class="input-group mb-5"><span class="input-group-text" >Rp</span>
		                	<input type="text" placeholder=""  class="form-control" name="debit" value="<?php echo $baris->debit;?>">
		                	</div>
		                </div>
		                <div class="form-group <?=$input_kredit;?>" id="kredit_edit<?php echo $baris->id_metal_genix; ?>">
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
					$('#btn_edit<?php echo $baris->id_metal_genix; ?>').on('click',function(e){
						e.preventDefault();
						var id_kategori=$(this).val();
						//$("#debit_edit<?php echo $baris->id_metal_genix; ?>, #kredit_edit<?php echo $baris->id_metal_genix; ?>").hide();
						if($(this).val() == '1'){
							$("#debit_edit<?php echo $baris->id_metal_genix; ?>").show();
						}else if($(this).val() == '2'){
							$("#kredit_edit<?php echo $baris->id_metal_genix; ?>").show();
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
<div class="modal fade" tabindex="-1" id="detail<?php echo $baris->id_metal_genix; ?>">
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
            				<input type="text" placeholder="" class="form-control" id="" name="ket" value="<?php echo $baris->kategori;?>" disabled>
            				<span class="font-13 text-muted"></span>
            			</div>
            			<br>
            			<div class="form-group">
            				<label for="exampleFormControlInput1" class="required form-label">Tanggal</label>
            				<input type="" placeholder="" class="form-control" name="tanggal" value="<?php echo $baris->tanggal;?>" disabled>
            				<span class="font-13 text-muted"></span>
            			</div>
            			<br>
            			<div class="form-group">
            				<label for="exampleFormControlInput1" class="required form-label" class="font-weight">Keterangan</label class="font-weight-bold" style="color: #292f4a;">
            				<textarea class="form-control input-default" type="text"  name="ket"  style="width: 100%; height: 80px; resize: none;" disabled=""><?php echo $baris->ket;?></textarea>
            			</div>
            		</div>
            		<div class="col-md-6">
            			<div class="form-group">
            				<label for="exampleFormControlInput1" class="required form-label">Jenis Uang</label>
            				<input type="text" placeholder="" class="form-control" name="jenis_uang" value="<?php echo $baris->jenis_uang;?>" disabled>
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
            			<div class="form-group <?=$input_debit;?>" id="debit_detail<?php echo $baris->id_metal_genix; ?>">
            				<label for="exampleFormControlInput1" class="required form-label" >Debit</label>
            				<div class="input-group mb-5">
            					<span class="input-group-text">Rp</span>
            					<input type="text" class="form-control" name="debit" value="<?php echo $baris->debit;?>" disabled/>
            				</div>
            			</div>
            			<div class="form-group <?=$input_kredit;?>" id="kredit_detail<?php echo $baris->id_metal_genix; ?>">
            				<label for="exampleFormControlInput1" class="required form-label" >Kredit</label>
            				<div class="input-group mb-5">
            					<span class="input-group-text" >Rp</span>
            					<input type="text" class="form-control" name="kredit" value="<?php echo $baris->kredit;?>" disabled/>
            				</div>
            			</div>
            			<div class="form-group pt-2">
            				<label for="exampleFormControlInput1" class="required form-label" class="font-weight">Catatan</label class="font-weight-bold" style="color: #292f4a;">
            				<textarea class="form-control input-default" type="text" name="catatan"  style="width: 100%; height: 80px; resize: none;" disabled="" ><?php echo $baris->catatan;?></textarea>
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
					$('#btn_detail<?php echo $baris->id_metal_genix; ?>').on('click',function(e){
						e.preventDefault();
						var id_kategori<?php echo $baris->id_metal_genix; ?>=$(this).val();
						//$("#debit_detail<?php echo $baris->id_metal_genix; ?>, #kredit_detail<?php echo $baris->id_metal_genix; ?>").hide();
						if($(this).val() == '1'){
							$("#debit_detail<?php echo $baris->id_metal_genix; ?>").show();
						}else{
							$("#kredit_detail<?php echo $baris->id_metal_genix; ?>").show();
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
<form class="user" action="<?php echo site_url('metal_genix_c/hapus_data/');?>" method="post" enctype="multipart/form-data">
	<div class="modal fade" tabindex="-1" id="delete<?php echo $baris->id_metal_genix; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
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









