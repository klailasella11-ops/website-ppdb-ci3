    </div><!-- end main-content-inner -->
    </div><!-- end page-container -->

<!-- Footer -->
<div class="copyright py-4 text-center text-light bg-dark">
    <div class="container"><small>© 2026 SMP Negeri 100 Maluku Tengah. All Rights Reserved.</small></div>
</div>

<!-- jQuery -->
<script src="<?= base_url('assets/js/vendor/jquery-2.2.4.min.js') ?>"></script>
<!-- Bootstrap -->
<script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/owl.carousel.min.js') ?>"></script>
<script src="<?= base_url('assets/js/metisMenu.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.slimscroll.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.slicknav.min.js') ?>"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<!-- Plugins -->
<script src="<?= base_url('assets/js/plugins.js') ?>"></script>
<script src="<?= base_url('assets/js/scripts.js') ?>"></script>
<script>
$(document).ready(function(){

    $('#menuToggle').click(function(){
        $('.page-container').toggleClass('sbar_collapsed');
    });

});
</script>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const toggleBtn = document.getElementById("toggleSidebar");
    const pageContainer = document.querySelector(".page-container");

    if(toggleBtn){
        toggleBtn.addEventListener("click", function () {
            pageContainer.classList.toggle("active");
        });
    }

});
</script>

</body>
