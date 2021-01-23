<div class="sidebar-content">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu" class="slimscroll-menu">
                        <ul class="metismenu" id="menu-bar">
                            <li>
                                <a href="<?= site_url('admin/kategori');?>">
                                    <i data-feather="columns"></i>
                                    <span> Kategori </span>
                                </a>
                            </li>
                            <?php if ($this->session->level == 'admin_root'): ?>
                            <li>
                                <a href="<?= site_url('admin/akun_admin');?>">
                                    <i data-feather="users"></i>
                                    <span> Akun Admin </span>
                                </a>
                            </li>
                            <?php endif ?>
                            <li>
                                <a href="<?= site_url('admin/akun_masyarakat');?>">
                                    <i data-feather="users"></i>
                                    <span> Akun Masyarakat </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/laporan');?>">
                                    <i data-feather="file"></i>
                                    <span> Laporan </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('admin/ubah_biodata');?>">
                                    <i data-feather="lock"></i>
                                    <span> Ubah Biodata </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('auth/logout');?>">
                                    <i data-feather="log-out"></i>
                                    <span> Keluar </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>
                </div>