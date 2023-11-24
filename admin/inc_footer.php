</main>
<!-- Hero section -->
<section id="hero" class="text-white tm-font-big tm-parallax">
    <div class="text-center tm-hero-text-container">
        <div class="tm-hero-text-container-inner">
            <h2 class="tm-hero-title">Daffa Athilla</h2>
            <p class="tm-hero-subtitle">
                Pemrograman Web I<br>
                UTS Pemrograman Web I - 26 Mei 2023
            </p>
        </div>
    </div>

    <div class="tm-next tm-intro-next">
        <a href="#introduction" class="text-center tm-down-arrow-link">
            <i class="fas fa-3x fa-caret-down tm-down-arrow"></i>
        </a>
    </div>
</section>

<section id="introduction" class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto text-center pt-4 pb-4">
                <img src="img/Daffa Athilla.jpg" alt="Image" class="img-fluid tm-intro-img" style="width: 400px;" />
            </div>
            <div class="col-lg-6">
                <div class="tm-intro-text-container">
                    <h2 class="tm-text-primary mb-4 tm-section-title pt-3">Perkenalkan</h2>
                    <p class="mb-4 tm-intro-text">
                        Nama: Daffa Athilla<br>
                        NPM: 21312034<br>
                        Jurusan: Informatika<br>
                        Kelas: IF 21 A
                    </p>
                    <p class="mb-5 tm-intro-text">
                        - Keahlian: Ahli Bermain Game Kompetitif<br>
                        - Akun Social Media (Instagram): <a href="https://www.instagram.com/daffaaathilla/">@daffaaathilla</a><br>
                        - Hobi: Bermain Game dan Menonton Film
                    </p>
                    <div class="tm-next">
                        <a href="#" class="tm-intro-text tm-btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
</section>

<footer class="bg-dark p-2">
    <p class="text-center m-auto">26 Mei 2023</p>
</footer>

<script src="js/jquery-1.9.1.min.js"></script>
<script src="slick/slick.min.js"></script>
<script src="magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.singlePageNav.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    function getOffSet() {
        var _offset = 450;
        var windowHeight = window.innerHeight;

        if (windowHeight > 500) {
            _offset = 400;
        }
        if (windowHeight > 680) {
            _offset = 300
        }
        if (windowHeight > 830) {
            _offset = 210;
        }

        return _offset;
    }

    function setParallaxPosition($doc, multiplier, $object) {
        var offset = getOffSet();
        var from_top = $doc.scrollTop(),
            bg_css = 'center ' + (multiplier * from_top - offset) + 'px';
        $object.css({
            "background-position": bg_css
        });
    }

    // Parallax function
    // Adapted based on https://codepen.io/roborich/pen/wpAsm        
    var background_image_parallax = function($object, multiplier, forceSet) {
        multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.5;
        multiplier = 1 - multiplier;
        var $doc = $(document);
        // $object.css({"background-attatchment" : "fixed"});

        if (forceSet) {
            setParallaxPosition($doc, multiplier, $object);
        } else {
            $(window).scroll(function() {
                setParallaxPosition($doc, multiplier, $object);
            });
        }
    };

    var background_image_parallax_2 = function($object, multiplier) {
        multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.5;
        multiplier = 1 - multiplier;
        var $doc = $(document);
        $object.css({
            "background-attachment": "fixed"
        });
        $(window).scroll(function() {
            var firstTop = $object.offset().top,
                pos = $(window).scrollTop(),
                yPos = Math.round((multiplier * (firstTop - pos)) - 186);

            var bg_css = 'center ' + yPos + 'px';

            $object.css({
                "background-position": bg_css
            });
        });
    };

    $(function() {
        // Hero Section - Background Parallax
        background_image_parallax($(".tm-parallax"), 0.30, false);
        background_image_parallax_2($("#contact"), 0.80);

        // Handle window resize
        window.addEventListener('resize', function() {
            background_image_parallax($(".tm-parallax"), 0.30, true);
        }, true);

        // Detect window scroll and update navbar
        $(window).scroll(function(e) {
            if ($(document).scrollTop() > 120) {
                $('.tm-navbar').addClass("scroll");
            } else {
                $('.tm-navbar').removeClass("scroll");
            }
        });

        // Close mobile menu after click 
        $('#tmNav a').on('click', function() {
            $('.navbar-collapse').removeClass('show');
        })

        // Scroll to corresponding section with animation
        $('#tmNav').singlePageNav();

        // Add smooth scrolling to all links
        // https://www.w3schools.com/howto/howto_css_smooth_scroll.asp
        $("a").on('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;

                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 400, function() {
                    window.location.hash = hash;
                });
            } // End if
        });

        // Pop up
        $('.tm-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            gallery: {
                enabled: true
            }
        });

        // Gallery
        $('.tm-gallery').slick({
            dots: true,
            infinite: false,
            slidesToShow: 5,
            slidesToScroll: 2,
            responsive: [{
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            callbacks: {
                onImageUpload: function(files) {
                    for (let i = 0; i < files.length; i++) {
                        $.upload(files[i]);
                    }
                }
            },
            height: 200,
            toolbar: [
                ["style", ["bold", "italic", "underline", "clear"]],
                ["fontname", ["fontname"]],
                ["fontsize", ["fontsize"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ["height", ["height"]],
                ["insert", ["link", "picture", "imageList", "video", "hr"]],
                ["help", ["help"]]
            ],
            dialogsInBody: true,
            imageList: {
                endpoint: "daftar_gambar.php",
                fullUrlPrefix: "../gambar/",
                thumbUrlPrefix: "../gambar/"
            }
        });

        $.upload = function(file) {
            let out = new FormData();
            out.append('file', file, file.name);

            $.ajax({
                method: 'POST',
                url: 'upload_gambar.php',
                contentType: false,
                cache: false,
                processData: false,
                data: out,
                success: function(img) {
                    $('#summernote').summernote('insertImage', img);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        };
    });
</script>
</body>

</html>