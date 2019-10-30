<!-- FOOTER -->
<footer id="footer" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- footer contact -->
            <div class="col-md-4">
                <div class="footer">
                    <div class="footer-logo">
                        <a class="logo" href="<?php echo $set['url_website']; ?>"><img src="" alt="logo"></a>
                    </div>
                    <p>Ringkasan Tentang Kami.</p>
                    <ul class="footer-contact">
                        <li><i class="fa fa-map-marker"></i> <?php echo $set['alamat']; ?></li>
                        <li><i class="fa fa-phone"></i> <?php echo $set['telepon']; ?></li>
                        <li><i class="fa fa-envelope"></i> <?php echo $set['email']; ?></a></li>
                    </ul>
                </div>
            </div>
            <!-- /footer contact -->

            <!-- footer galery -->
            <div class="col-md-4">
                <div class="footer">
                    <h3 class="footer-title">Galeri</h3>
                    <ul class="footer-galery">
                        <li><a href="#"><img src="./img/galery-1.jpg" alt=""></a></li>
                        <li><a href="#"><img src="./img/galery-2.jpg" alt=""></a></li>
                        <li><a href="#"><img src="./img/galery-3.jpg" alt=""></a></li>
                        <li><a href="#"><img src="./img/galery-4.jpg" alt=""></a></li>
                        <li><a href="#"><img src="./img/galery-5.jpg" alt=""></a></li>
                        <li><a href="#"><img src="./img/galery-6.jpg" alt=""></a></li>
                    </ul>
                </div>
            </div>
            <!-- /footer galery -->

            <!-- footer newsletter -->
            <div class="col-md-4">
                <div class="footer">
                    <h3 class="footer-title">Media Sosial </h3>
                    <ul class="footer-social">
                        <li><a href="https://api.whatsapp.com/send?phone=<?php echo $set['wa']; ?>" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                        <li><a href="<?php echo $set['fb']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?php echo $set['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="<?php echo $set['ig']; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- /footer newsletter -->
        </div>
        <!-- /row -->

        <!-- footer copyright & nav -->
        <div id="footer-bottom" class="row">

            <div class="col-md-6">
                <div class="footer-copyright">
                    <span>Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved</span>
                </div>
            </div>
        </div>
        <!-- /footer copyright & nav -->
    </div>
    <!-- /container -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="<?php echo $set['url_website']; ?>js/jquery.min.js"></script>
<script src="<?php echo $set['url_website']; ?>js/bootstrap.min.js"></script>
<script src="<?php echo $set['url_website']; ?>js/owl.carousel.min.js"></script>
<script src="<?php echo $set['url_website']; ?>js/jquery.stellar.min.js"></script>
<script src="<?php echo $set['url_website']; ?>js/main.js"></script>
<script src="<?php echo $set['url_website']; ?>js/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#donatur').DataTable();
    });
    $(document).ready(function() {
        $('#donasi').affix({
            offset: {
                top: 700
            }
        });
    });
    $('input.input-donasi').keyup(function(event) {

        // skip for arrow keys
        if (event.which >= 37 && event.which <= 40) return;

        // format number
        $(this).val(function(index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.more_program', function() {
            var ID = $(this).attr('id');
            $('.more_program').hide();
            $('.loading_program').show();
            $.ajax({
                type: 'POST',
                url: 'more-program.php',
                data: 'id=' + ID,
                success: function(html) {
                    $('#more_program_main' + ID).remove();
                    $('#post_program').append(html);
                }
            });
        });
        $(document).on('click', '.more_kategori', function() {
            var ID = $(this).attr('id');
            var NAME = $(this).attr('name');
            $('.more_kategori').hide();
            $('.loading_kategori').show();
            $.ajax({
                type: 'POST',
                url: 'more-kategori.php',
                data: {
                    id: ID,
                    name: NAME
                },
                success: function(html) {
                    $('#more_kategori_main' + ID).remove();
                    $('#post_kategori').append(html);
                }
            });
        });
        $(document).on('click', '.more_search', function() {
            var ID = $(this).attr('id');
            var NAME = $(this).attr('name');
            $('.more_search').hide();
            $('.loading_search').show();
            $.ajax({
                type: 'POST',
                url: 'more-search.php',
                data: {
                    id: ID,
                    name: NAME
                },
                success: function(html) {
                    $('#more_search_main' + ID).remove();
                    $('#post_search').append(html);
                }
            });
        });
        $(document).on('click', '.more_acara', function() {
            var ID = $(this).attr('id');
            $('.more_acara').hide();
            $('.loading_acara').show();
            $.ajax({
                type: 'POST',
                url: 'more-acara.php',
                data: 'id=' + ID,
                success: function(html) {
                    $('#more_acara_main' + ID).remove();
                    $('#post_acara').append(html);
                }
            });
        });
        $(document).on('click', '.more_blog', function() {
            var ID = $(this).attr('id');
            $('.more_blog').hide();
            $('.loading_blog').show();
            $.ajax({
                type: 'POST',
                url: 'more-blog.php',
                data: 'id=' + ID,
                success: function(html) {
                    $('#more_blog_main' + ID).remove();
                    $('#post_blog').append(html);
                }
            });
        });
    });
</script>
<script>
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>
</body>

</html>