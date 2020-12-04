<!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                2019 &copy; Shreyu. All Rights Reserved. Crafted with <i class='uil uil-heart text-danger font-size-12'></i> by <a href="https://coderthemes.com" target="_blank">Coderthemes</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>
</div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i data-feather="x-circle"></i>
                </a>
                <h5 class="m-0">Customization</h5>
            </div>
    
            <div class="slimscroll-menu">
    
                <h5 class="font-size-16 pl-3 mt-4">Choose Variation</h5>
                <div class="p-3">
                    <h6>Default</h6>
                    <a href="index.html"><img src="assets/images/layouts/vertical.jpg" alt="vertical" class="img-thumbnail demo-img" /></a>
                </div>
                <div class="px-3 py-1">
                    <h6>Top Nav</h6>
                    <a href="layouts-horizontal.html"><img src="assets/images/layouts/horizontal.jpg" alt="horizontal" class="img-thumbnail demo-img" /></a>
                </div>
                <div class="px-3 py-1">
                    <h6>Dark Side Nav</h6>
                    <a href="layouts-dark-sidebar.html"><img src="assets/images/layouts/vertical-dark-sidebar.jpg" alt="dark sidenav" class="img-thumbnail demo-img" /></a>
                </div>
                <div class="px-3 py-1">
                    <h6>Condensed Side Nav</h6>
                    <a href="layouts-dark-sidebar.html"><img src="assets/images/layouts/vertical-condensed.jpg" alt="condensed" class="img-thumbnail demo-img" /></a>
                </div>
                <div class="px-3 py-1">
                    <h6>Fixed Width (Boxed)</h6>
                    <a href="layouts-boxed.html"><img src="assets/images/layouts/boxed.jpg" alt="boxed"
                            class="img-thumbnail demo-img" /></a>
                </div>
            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        <!-- Vendor js -->
        <script src="<?= base_url(); ?>assets/shreyu/js/vendor.min.js"></script>
        
        <?php
        $uri = $this->uri->segment(2);
        if ($uri == 'kategori' || $uri == 'soal_kategori') {
        ?>
        <script src="<?= base_url(); ?>assets/shreyu/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url(); ?>assets/shreyu/libs/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="<?= base_url(); ?>assets/shreyu/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="<?= base_url(); ?>assets/shreyu/libs/datatables/responsive.bootstrap4.min.js"></script>
        <script src="<?= base_url(); ?>assets/shreyu/libs/datatables/dataTables.buttons.min.js"></script>
        <script src="<?= base_url(); ?>assets/shreyu/libs/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?= base_url(); ?>assets/shreyu/libs/datatables/buttons.html5.min.js"></script>
        <script src="<?= base_url(); ?>assets/shreyu/libs/datatables/buttons.flash.min.js"></script>
        <script src="<?= base_url(); ?>assets/shreyu/libs/datatables/buttons.print.min.js"></script>

        <script src="<?= base_url(); ?>assets/shreyu/libs/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?= base_url(); ?>assets/shreyu/libs/datatables/dataTables.select.min.js"></script>
        <script src="<?= base_url(); ?>assets/shreyu/js/pages/datatables.init.js"></script>
        
        <?php } ?>
        <!-- page js -->
        
        <!-- <script src="assets/shreyu/js/pages/dashboard.init.js"></script> -->

        <!-- App js -->
        <script src="<?= base_url(); ?>assets/shreyu/js/app.min.js"></script>
        <script src="<?= base_url(); ?>assets/shreyu/tinymce/tinymce.min.js"></script>

        <script>
        $(document).ready(function () {
            tinymce.init({
                selector: '#post-content',
                plugins: 'table advlist lists image media anchor hr link autoresize',
                toolbar: 'formatselect bold forecolor backcolor | bullist numlist | link image media anchor | table | code',
            });
        })
      </script>
    </body>
</html>