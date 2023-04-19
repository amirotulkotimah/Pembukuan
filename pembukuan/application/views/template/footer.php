<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!--begin::Javascript-->
<script>var hostUrl = "<?php echo base_url();?>assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="<?php echo base_url();?>assets/plugins/global/plugins.bundle.js"></script>
<script src="<?php echo base_url();?>assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="<?php echo base_url();?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="<?php echo base_url();?>assets/js/custom/apps/ecommerce/catalog/products.js"></script>
<script src="<?php echo base_url();?>assets/js/widgets.bundle.js"></script>
<script src="<?php echo base_url();?>assets/js/custom/widgets.js"></script>
<script src="<?php echo base_url();?>assets/js/custom/apps/chat/chat.js"></script>
<script src="<?php echo base_url();?>assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="<?php echo base_url();?>assets/js/custom/utilities/modals/create-app.js"></script>
<script src="<?php echo base_url();?>assets/js/custom/utilities/modals/users-search.js"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->



