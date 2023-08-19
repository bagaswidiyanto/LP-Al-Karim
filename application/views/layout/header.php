<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $website->metaTitle; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="keywords" content="<?= $website->metaKeywords; ?>">
    <meta name="description" content="<?= $website->metaDescription; ?>">


    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= $website->metaTitle; ?>" />
    <meta property="og:description" content="<?= $website->metaDescription; ?>" />
    <meta property="og:url" content="http://alkarim.my.id" />
    <meta property="og:image" content="<?= base_url() ?>assets/img/og-image.png" />


    <!-- Favicon -->
    <link rel="icon" href="<?= base_url() ?>assets/img/url-logo.png" sizes="32x32" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900|Ubuntu:400,500,700" rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url() ?>assets/lib/animate/animate.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/css/swiper.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/css/responsive.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/css/whatsapp_chat.css" rel="stylesheet">
</head>

<body class="bg-white position-relative" data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="51">
    <!-- Navbar & Hero Start -->
    <header class="container-fluid position-relative p-0" id="home">
        <div class="top_menu py-3 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <a href="<?= base_url() ?>">
                            <div class="logo text-center">
                                <img src="https://admin103.alkarim.my.id/upload/<?= $website->image; ?>" title="<?= $website->name; ?>" class="img-fluid" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-8">
                        <div class="complete-address">
                            <div class="row">
                                <div class="col-lg-5">
                                    <span>Kantor Pusat :</span>
                                    <p><?= $website->address; ?></p>
                                </div>
                                <div class="col-lg-4">
                                    <span>EMAIL :</span>
                                    <p><?= $website->email; ?></p>
                                </div>
                                <div class="col-lg-3">
                                    <span>Telepon :</span>
                                    <?php
                                    $number = $website->phone;
                                    $n1 = substr($number, 0, 4);
                                    $n2 = substr($number, 4, 10);
                                    // $n3 = substr($number, 7, 4);
                                    $wa = $n1 . '-' . $n2;
                                    ?>
                                    <p class="d-flex"><img src="assets/img/ic-telp.svg" class="img-fluid me-2" alt=""><span><?= $wa; ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="d-flex top-social align-items-center">
                            <?php foreach ($sosmed as $s) { ?>
                                <a class="btn btn-outline-light btn-social" href="<?= $s->link; ?>" target="_blank" title="<?= $s->name; ?>"><i class="<?= $s->icon; ?>"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light px-0 px-lg-5 py-2 py-lg-3">
            <div class="container">
                <a href="" class="navbar-brand d-block d-lg-none">
                    <!-- <h1 class="m-0">FitApp</h1> -->
                    <img src="https://admin103.alkarim.my.id/upload/<?= $website->image; ?>" title="<?= $website->name; ?>" class="img-fluid" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav py-0">
                        <a href="#home" class="nav-item nav-link click-scroll">BERANDA</a>
                        <a href="#laporan" class="nav-item nav-link click-scroll">LAPORAN</a>
                        <a href="#latar-belakang" class="nav-item nav-link click-scroll">LATAR BELAKANG</a>
                        <a href="#about" class="nav-item nav-link click-scroll">TENTANG KAMI</a>
                        <a href="#location" class="nav-item nav-link click-scroll">ALAMAT KAMI</a>
                    </div>
                    <div class="btn-donasi  ms-auto">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalDonasi">Donasi Sekarang</a>
                    </div>
                </div>
            </div>
        </nav>

    </header>