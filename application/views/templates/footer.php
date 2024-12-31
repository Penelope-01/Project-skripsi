<footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
        <div class="row">
            <div class="col-sm-6 my-1">
                <p class="m-0">Yayasan Almuslim</p>
            </div>
            <div class="col-sm-6 ms-auto my-1">
                <ul class="list-inline footer-link mb-0 justify-content-sm-end d-flex">
                    <li class="list-inline-item"><a href="../index.html">Home</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer> <!-- Required Js -->
<script src="<?= base_url(); ?>assets/js/plugins/popper.min.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins/simplebar.min.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/js/fonts/custom-font.js"></script>
<script src="<?= base_url(); ?>assets/js/pcoded.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins/feather.min.js"></script>





<script>
    layout_change('light');
</script>




<script>
    layout_sidebar_change('light');
</script>



<script>
    change_box_container('false');
</script>


<script>
    layout_caption_change('true');
</script>




<script>
    layout_rtl_change('false');
</script>


<script>
    preset_change("preset-1");
</script>


<script>
    header_change("header-1");
</script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');


        $.ajax({
            url: "<?= base_url('admin/gantiAkses'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleAkses/'); ?>" + roleId;
            }
        });
    });
</script>
</body>
<!-- [Body] end -->

</html>