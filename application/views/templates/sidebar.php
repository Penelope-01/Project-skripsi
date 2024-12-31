<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="../dashboard/index.html" class="b-brand text-primary" >
                <!-- ========   Change your logo from here   ============ -->
                <img src="<?= base_url(); ?>assets/images/logo-white.svg" alt="logo image" class="logo-lg">
            </a>
        </div>


        <!-- query MENU -->
        <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT tu.*
                FROM tb_user_menu AS tu 
                JOIN tb_user_akses_menu AS ta
                ON tu.id_user_menu = ta.id_user_menu
                WHERE ta.role_id = ? 
                ORDER BY tu.id_user_menu ASC
                ";
        $menu = $this->db->query($queryMenu, array($role_id))->result_array();
        // var_dump($menu);
        // die;
        ?>



        <div class="navbar-content">
            <ul class="pc-navbar">

                <!-- LOOPING MENU   -->
                <?php foreach ($menu as $m) : ?>
                    <li class="pc-item pc-caption">
                        <label><?= $m['menu']; ?></label>
                    </li>


                    <!-- SIAPKAN SUB-MENU SESUAI MENU -->
                    <?php
                    $menuId = $m['id_user_menu'];
                    $querySubMenu = "SELECT * FROM tb_user_sub_menu 
                                        WHERE id_user_menu = $menuId
                                        AND is_active = 1";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>

                    <?php foreach ($subMenu as $sm) : ?>
                        <li class="pc-item">
                            <a href="<?= base_url($sm['url']); ?>" class="pc-link"><span class="pc-micon">
                                    <i class="<?= $sm['icon']; ?>"></i></span><span class="pc-mtext"><?= $sm['title']; ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>


                <?php endforeach; ?>

                <li class="pc-item pc-caption">
                    <label>Other</label>
                    <i class="ph ph-suitcase"></i>
                </li>

                <li class="pc-item"><a href="<?= base_url('auth/logout'); ?>" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph ph-sign-out"></i>
                        </span>
                        <span class="pc-mtext">Keluar</span></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- [ Sidebar Menu ] end -->