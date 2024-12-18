<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $judul; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('dina/') ?>lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('dina/') ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('dina/') ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('dina/') ?>css/style.css" rel="stylesheet">
</head>

<body>




    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
            <a href="index.html" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><i class="fas fa-star-of-life me-3"></i><?= $konfig->judul_website ?></h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="<?= base_url('welcome') ?>" class="nav-item nav-link active">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <?php foreach ($kategori as $kk) { ?>
                                <a href="<?= base_url('welcome/kategori/' . $kk['id_kategori']) ?>" class="dropdown-item"><?= $kk['nama_kategori'] ?></a>
                            <?php } ?>
                        </div>

                    </div>
                    <a href="#contact" class="nav-item nav-link">Contact Us</a>
                </div>
                <a href="#" class="btn btn-primary rounded-pill text-white py-2 px-4 flex-wrap flex-sm-shrink-0">Book Appointment</a>
            </div>
        </nav>


        <!-- Carousel Start -->
        <div class="header-carousel owl-carousel">
            <?php foreach ($carousel as $kk) { ?>
                <div class="header-carousel-item">
                    <img src="<?= base_url('upload/carousel/' . $kk['foto']) ?>" class="img-fluid w-100" alt="Image">
                    <div class="carousel-caption">

                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- Carousel End -->
    </div>
    <!-- Navbar & Hero End -->

    <!-- Services Start -->
    <?php
    // Pagination setup
    $perPage = 12; // Number of items per page
    $totalItems = count($konten); // Total number of items
    $totalPages = ceil($totalItems / $perPage); // Calculate total pages
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page from query parameter
    $currentPage = max(1, min($totalPages, $currentPage)); // Ensure current page is within range

    // Slice the array for the current page
    $startIndex = ($currentPage - 1) * $perPage;
    $currentKonten = array_slice($konten, $startIndex, $perPage);
    ?>

    <div class="container-fluid service py-5" id="blog">
        <div class="container py-5">
            <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
                <div class="sub-style">
                    <h4 class="sub-title px-3 mb-0">.</h4>
                </div>
                <h1 class="display-3 mb-4">Our Blog</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <?php foreach ($currentKonten as $kk) { ?>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded">
                            <div class="service-img rounded-top">
                                <img src="<?= base_url('upload/konten/' . $kk['foto']) ?>" style="height:200px;" class="img-fluid rounded-top w-100" alt="">
                            </div>
                            <div class="service-content rounded-bottom bg-light p-4" style="height:280px;">
                                <div class="service-content-inner">
                                    <?php
                                    $text = $kk['judul'];
                                    $words = explode(' ', $text);
                                    $limitedText = implode(' ', array_slice($words, 0, 5));
                                    ?>
                                    <h5 class="mb-4"><?= htmlspecialchars($limitedText) ?></h5>
                                    <?php
                                    $text = $kk['keterangan'];
                                    $words = explode(' ', $text);
                                    $limitedText = implode(' ', array_slice($words, 0, 10));
                                    ?>
                                    <p class="mb-4"><?= htmlspecialchars($limitedText) ?></p>
                                    <a href="<?= base_url('welcome/artikel/' . $kk['slug']) ?>" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- Pagination -->
            <div class="pagination justify-content-center mt-4">
                <?php if ($currentPage > 1): ?>
                    <a href="?page=<?= $currentPage - 1 ?>. #blog" class="btn btn-primary mx-1">Previous</a>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="?page=<?= $i ?> . #blog" class="btn <?= $i == $currentPage ? 'btn-secondary' : 'btn-primary' ?> mx-1"><?= $i ?></a>
                <?php endfor; ?>
                <?php if ($currentPage < $totalPages): ?>
                    <a href="?page=<?= $currentPage + 1 ?> . #blog" class="btn btn-primary mx-1">Next</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    </div>
    <!-- Services Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
                <h1 class="display-3 mb-4">Skincare</h1>
            </div>
            <div class="row g-4 justify-content-center">

                <?php
                $counter = 0; // Initialize a counter
                foreach ($konten as $kk) {
                    if ($counter >= 4) {
                        break; // Exit the loop after 5 iterations
                    }
                ?>

                    <?php if ($kk['id_kategori'] == 10) { ?>
                        <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item rounded">
                                <div class="service-img rounded-top">
                                    <img src="<?= base_url('upload/konten/' . $kk['foto']) ?>" style="height:200px;" class="img-fluid rounded-top w-100" alt="">
                                </div>
                                <div class="service-content rounded-bottom bg-light p-4" style="height:280px;">
                                    <div class="service-content-inner">
                                        <?php
                                        $text = $kk['judul'];
                                        $words = explode(' ', $text);
                                        $limitedText = implode(' ', array_slice($words, 0, 5));
                                        ?>
                                        <h5 class="mb-4"><?= $limitedText ?></h5>
                                        <?php
                                        $text = $kk['keterangan'];
                                        $words = explode(' ', $text);
                                        $limitedText = implode(' ', array_slice($words, 0, 10));
                                        ?>
                                        <p class="mb-4"><?= htmlspecialchars($limitedText) ?></p>
                                        <a href="<?= base_url('welcome/artikel/' . $kk['slug']) ?>" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php $counter++;
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
                <h1 class="display-3 mb-4">Makeup</h1>
            </div>
            <div class="row g-4 justify-content-center">

                <?php
                $counter = 0; // Initialize a counter
                foreach ($konten as $kk) {
                    if ($counter >= 4) {
                        break; // Exit the loop after 5 iterations
                    }
                ?>

                    <?php if ($kk['id_kategori'] == 9) { ?>
                        <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item rounded">
                                <div class="service-img rounded-top">
                                    <img src="<?= base_url('upload/konten/' . $kk['foto']) ?>" style="height:200px;" class="img-fluid rounded-top w-100" alt="">
                                </div>
                                <div class="service-content rounded-bottom bg-light p-4" style="height:280px;">
                                    <div class="service-content-inner">
                                        <?php
                                        $text = $kk['judul'];
                                        $words = explode(' ', $text);
                                        $limitedText = implode(' ', array_slice($words, 0, 5));
                                        ?>
                                        <h5 class="mb-4"><?= $limitedText ?></h5>
                                        <?php
                                        $text = $kk['keterangan'];
                                        $words = explode(' ', $text);
                                        $limitedText = implode(' ', array_slice($words, 0, 10));
                                        ?>
                                        <p class="mb-4"><?= htmlspecialchars($limitedText) ?></p>
                                        <a href="<?= base_url('welcome/artikel/' . $kk['slug']) ?>" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php $counter++;
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s">
                <h1 class="display-3 mb-4">Hair</h1>
            </div>
            <div class="row g-4 justify-content-center">

                <?php
                $counter = 0; // Initialize a counter
                foreach ($konten as $kk) {
                    if ($counter >= 4) {
                        break; // Exit the loop after 5 iterations
                    }
                ?>

                    <?php if ($kk['id_kategori'] == 11) { ?>
                        <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item rounded">
                                <div class="service-img rounded-top">
                                    <img src="<?= base_url('upload/konten/' . $kk['foto']) ?>" style="height:200px;" class="img-fluid rounded-top w-100" alt="">
                                </div>
                                <div class="service-content rounded-bottom bg-light p-4" style="height:280px;">
                                    <div class="service-content-inner">
                                        <?php
                                        $text = $kk['judul'];
                                        $words = explode(' ', $text);
                                        $limitedText = implode(' ', array_slice($words, 0, 5));
                                        ?>
                                        <h5 class="mb-4"><?= $limitedText ?></h5>
                                        <?php
                                        $text = $kk['keterangan'];
                                        $words = explode(' ', $text);
                                        $limitedText = implode(' ', array_slice($words, 0, 10));
                                        ?>
                                        <p class="mb-4"><?= htmlspecialchars($limitedText) ?></p>
                                        <a href="<?= base_url('welcome/artikel/' . $kk['slug']) ?>" class="btn btn-primary rounded-pill text-white py-2 px-4 mb-2">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php $counter++;
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" id="contact" data-wow-delay="0.2s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-white mb-4"><i class="fas fa-star-of-life me-3"></i><?= $konfig->judul_website ?></h4>
                        <p><?= $konfig->profil_website ?>
                        </p>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-share fa-2x text-white me-2"></i>
                            <a class="btn-square btn btn-primary text-white rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn-square btn btn-primary text-white rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn-square btn btn-primary text-white rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn-square btn btn-primary text-white rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-white">Categories</h4>
                        <?php foreach ($kategori as $kk) { ?>
                            <a href="<?= base_url('welcome/kategori/' . $kk['id_kategori']) ?>"><i class="fas fa-angle-right me-2"></i><?= $kk['nama_kategori'] ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-white">Contact Info</h4>
                        <a href=""><i class="fa fa-map-marker-alt me-2"></i><?= $konfig->alamat ?></a>
                        <a href=""><i class="fas fa-envelope me-2"></i><?= $konfig->email ?></a>
                        <a href=""><i class="fas fa-phone me-2"></i> <?= $konfig->no_wa ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('dina/') ?>lib/wow/wow.min.js"></script>
    <script src="<?= base_url('dina/') ?>lib/easing/easing.min.js"></script>
    <script src="<?= base_url('dina/') ?>lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url('dina/') ?>lib/owlcarousel/owl.carousel.min.js"></script>


    <!-- Template Javascript -->
    <script src="<?= base_url('dina/') ?>js/main.js"></script>

</body>

</html>