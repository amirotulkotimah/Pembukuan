<?php
    $getUser = $this->session->userdata('session_user');
    $getGrup = $this->session->userdata('session_grup');
    ?>

<?php if ($getGrup == 1 || $getGrup == 2 || $getGrup == 3 || $getGrup == 4) : ?>
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
  <div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
      <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
          <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Profil Saya</h1>
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
              <li class="breadcrumb-item text-muted">Profile</li>
              <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
      </div>
    </div>
  </div>
</div>
<form data-kt-search-element="preferences" class="pt-1 d-none">
  <div class="d-flex justify-content-end pt-7"></div>
</form>
<div id="kt_app_content" class="app-content flex-column-fluid">
  <div id="kt_app_content_container" class="app-container container-xxl">
    <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="#" class="user" action="<?php echo site_url('profile_c/edit');?>" method="post" enctype="multipart/form-data">
      <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
        <div class="card card-flush py-4">
          <div class="card-header">
            <div class="card-title py-5">
              <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0"><?= $user['nama'];?></h1>
            </div>
          </div>
          <div class="card-body text-center pt-0">
             <input type="hidden" value="<?=$user['foto'];?>" name="fotolama">
             <input type="hidden" value="<?=$user['password'];?>" name="password">
             <input type="hidden" value="<?=$user['id_user'];?>" name="id_user">
            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
              <div class="image-input-wrapper w-150px h-150px" style="background-image: url(<?php echo base_url('assets/upload/foto_pengguna/') . $user['foto'] ?>)"></div>
              <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Ganti foto" id="btnfoto">
                <i class="bi bi-pencil-fill fs-7"></i>
                <input type="file" name="filefoto" accept=".png, .jpg, .jpeg" />
                <input type="hidden" name="avatar_remove" />
              </label>
              <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                <i class="bi bi-x fs-2"></i>
              </span>
              <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                <i class="bi bi-x fs-2"></i>
              </span>
            </div>
            <div class="text-muted fs-7"><?= $user['email'];?></div>
            <br>
                <!--<button type="submit" class="btn btn-primary">Simpan</button>-->
          </div>
        </div>
      </div>
      <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <div class="card card-flush py-4">
          <div class="card-header">
            <div class="card-title">
              <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Detail Profil</h1>
            </div>
          </div>
          <br>
          <div class="card-body pt-0">
            <div class="mb-10 fv-row">
              <input type="hidden" value="<?=$user['foto'];?>" name="fotolama">
              <input type="hidden" value="<?=$user['password'];?>" name="password">
              <input type="hidden" value="<?=$user['id_user'];?>" name="id_user">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="required form-label" for="name">Nama:</label>
                    <input type="text" name="name" value="<?= $user['nama'];?>" class="form-control" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="required form-label"for="email">Email:</label>
                    <input type="email" name="email" value="<?=$user['email'];?>" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="required form-label" for="name">Username</label>
                    <input type="text" name="name" value="<?=$user['username'];?>" class="form-control"  readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="required form-label"for="password">Password</label>
                    <input type="text" name="password" value="" class="form-control" >
                  </div>
                </div>
              </div>
              <div class="card-footer d-flex justify-content-end py-6 px-9 pt-10">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
          </div>
        </div>
      </form>
      </div>
    </div>
    <?php endif ?>

                          
                      
              