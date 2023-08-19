<div class="container-fluid hero-header px-0" id="home">
    <div class="slider-container">
        <div class="swiper-container hero-slider">
            <?php foreach ($slider as $s) { ?>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="img position-relative">
                        <img src="https://admin103.alkarim.my.id/upload/slider/<?= $s->image; ?>" class="img-fluid"
                            alt="">
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="btn-click d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="btn-donasi wow fadeInUp" data-wow-delay="0.3s">
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalDonasi">Donasi Sekarang</a>
            </div>
        </div>
    </div>
</div>
<!-- Navbar & Hero End -->


<section class="container-fluid donation-report" id="laporan">
    <div class="container">
        <div class="header-title mb-5 wow fadeInUp" data-wow-delay="0.3s">
            <h2 class="txt-green">Laporan Penyaluran Donasi</h2>
        </div>
        <div class="row gy-5 gy-lg-0">
            <div class="col-md-6">
                <div class="caption">
                    <div class="heading mb-3 wow fadeInUp" data-wow-delay="0.3s">
                        <h5 class="fw-bold"><?= $laporan->text; ?></h5>
                    </div>
                    <?= $laporan->deskripsi; ?>
                    <div class="row mt-4">
                        <div class="col-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="img">
                                <img src="https://admin103.alkarim.my.id/upload/laporan/<?= $laporan->image1; ?>"
                                    class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="img">
                                <img src="https://admin103.alkarim.my.id/upload/laporan/<?= $laporan->image2; ?>"
                                    class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="img position-relative wow fadeInUp" data-wow-delay="0.3s">
                    <?php if ($imgBig->status != "N") { ?>
                    <img src="https://admin103.alkarim.my.id/upload/gallery/<?= $imgBig->image; ?>"
                        class="img-fluid img-big" alt="">
                    <?php } ?>
                    <?php if ($imgMedium->status != "N") { ?>
                    <img src="https://admin103.alkarim.my.id/upload/gallery/<?= $imgMedium->image; ?>"
                        class="img-fluid img-medium" alt="">
                    <?php } ?>
                    <?php if ($imgSmall->status != "N") { ?>
                    <img src="https://admin103.alkarim.my.id/upload/gallery/<?= $imgSmall->image; ?>"
                        class="img-fluid img-small" alt="">
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="container-xxl video">
    <div class="container py-5">
        <div class="row justify-content-between gy-4">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <p class="txt-green mb-2 fw-bold">Media Sosial Kami</p>
                <div class="d-flex align-items-center">
                    <?php foreach ($sosmed as $s) { ?>
                    <a class="btn btn-outline-light btn-social" href="<?= $s->link; ?>" target="_blank"
                        title="<?= $s->name; ?>"><i class="<?= $s->icon; ?>"></i></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="heading text-center text-lg-end">
                    <h5>
                        <p>Progres Pembangunan <br><span class="fw-bold"> Asrama Santri Penghafal Al Quran Yatim
                                Dhuafa</span> </p>

                    </h5>
                </div>
            </div>
        </div>
        <div class="frame-video mt-5">
            <div class="row gy-5 gy-md-0">
                <?php foreach ($video as $v) { ?>
                <div class="col-md-6">
                    <div class="video-yt wow fadeInUp" data-wow-delay="0.3s">
                        <?= $v->link_yt; ?>
                    </div>
                    <div class="text txt-green mt-2">
                        <p><?= $v->nama; ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid px-0 donasi bg-green">
    <div class="container py-5">
        <div class="header-title text-center wow fadeInUp" data-wow-delay="0.3s">
            <h2 class="text-white">DONASI</h2>
        </div>
        <div class="bg-donasi mt-4">
            <div class="chart-target-donasi wow fadeInUp" data-wow-delay="0.3s">
                <div class="row">
                    <div class="col-lg-7 col-xl-5">
                        <div class="heading pb-3">
                            <h4>pembangunan asrama santri penghafal Alquran</h4>
                        </div>
                    </div>
                    <div class="chart-progress">
                        <div class="d-flex justify-content-between">
                            <?php
                            $total = $this->db->query("SELECT SUM(nominalDonasi) as jml, COUNT(*) as totDonasi FROM tbl_donasi WHERE tr_statusPembayaran = 'Y'")->row();
                            ?>

                            <div class="collected-funds d-flex align-items-center">
                                <h5 class="txt-green fw-bold me-3">Rp. <?= number_format($total->jml, 0, ",", "."); ?>
                                </h5>
                                <small class="fs-12">Terkumpul dari Rp.
                                    <?= number_format($targetDonasi->targetNominal, 0, ",", "."); ?></small>
                            </div>
                            <div class="target">
                                <h5>Rp. <?= number_format($targetDonasi->targetNominal, 0, ",", "."); ?></h5>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-done"></div>
                        </div>
                        <div class="tot-donasi d-flex justify-content-between mt-2">
                            <p class="txt-green fw-bold"><?= number_format($total->totDonasi, 0, ",", "."); ?> Donasi
                            </p>
                            <p id="time"></p>
                        </div>
                        <div class="inputContainer">
                            <input type="hidden" id="input" class="input" value="<?= $total->jml; ?>">
                            <input type="hidden" id="maxInput" class="maxInput"
                                value="<?= $targetDonasi->targetNominal; ?>">
                        </div>
                        <div class="btn-donasi mt-5">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalDonasi">Donasi Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fund">
                <div class="collected-funds wow fadeInUp" data-wow-delay="0.3s">
                    <div class="heading">
                        <h5>Dana Terkumpul</h5>
                    </div>
                    <div class="nominal pt-2">
                        <h3>Rp. <?= number_format($total->jml, 0, ",", "."); ?></h3>
                    </div>
                    <span><?= number_format($total->totDonasi, 0, ",", "."); ?> Donasi</span>
                </div>
                <div class="jml-donatur wow fadeInUp" data-wow-delay="0.3s">
                    <div class="heading">
                        <h5>Jumlah Donatur</h5>
                    </div>
                    <div class="nominal pt-2">
                        <h3><?= number_format($total->totDonasi, 0, ",", "."); ?> Donatur</h3>
                    </div>
                    <span><?= number_format($total->totDonasi, 0, ",", "."); ?> Donasi</span>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="container-xxl donatur " id="testimoni">
    <div class="container py-5">
        <div class="row justify-content-center text-center">
            <div class="col-lg-9">
                <div class="header-title wow fadeInUp" data-wow-delay="0.3s">
                    <h2 class="txt-green">DONATUR</h2>
                </div>
            </div>
        </div>
        <div class="slider-container mt-5 wow fadeInUp" data-wow-delay="0.3s">
            <div class="swiper-container donatur-slider">
                <div class="swiper-wrapper">
                    <?php foreach ($donasiSlider as $d) { ?>
                    <div class="swiper-slide">
                        <div class="box-donatur">
                            <div class="caption">
                                <p class="name"><?= $d->hideNama == "Y" ? 'Hamba Allah' : $d->nama; ?></p>
                                <div class="date">
                                    <small><?= date('d M Y', strtotime($d->createDate)); ?></small>
                                </div>
                                <div class="count-donation d-flex justify-content-between mt-3">
                                    <span>Jumlah Donasi</span>
                                    <p>Rp <?= number_format($d->nominalDonasi, 0, ",", "."); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</section>

<section class="container-xxl background-wakaf" id="latar-belakang">
    <div class="container py-5">
        <div class="header-title wow fadeInUp" data-wow-delay="0.3s">
            <h2 class="txt-green">LATAR BELAKANG</h2>
        </div>
        <div class="row gy-4 mt-4">
            <div class="col-lg-6">
                <div class="desk wow fadeInUp" data-wow-delay="0.3s">
                    <?= $website->description; ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row gy-4">
                    <?php foreach ($gallery2 as $g2) { ?>
                    <div class="col-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="img">
                            <img src="https://admin103.alkarim.my.id/upload/gallery2/<?= $g2->image; ?>"
                                class="img-fluid w-100" alt="">
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="btn-donasi mt-5 wow fadeInUp" data-wow-delay="0.3s">
            <a href="#" data-bs-toggle="modal" data-bs-target="#modalDonasi">Donasi Sekarang</a>
        </div>
    </div>
</section>

<section class="container-xxl about-us" id="about">
    <div class="container py-5">
        <div class="row gy-4 align-items-center pb-5 border-bottom border-dark text-center">
            <div class="col-sm-4 col-md-3 col-lg-3">
                <div class="logo wow fadeInUp" data-wow-delay="0.3s">
                    <img src="https://admin103.alkarim.my.id/upload/<?= $website->image; ?>"
                        title="<?= $website->name; ?>" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-sm-8 col-md-9 col-lg-5">
                <div class="header-title wow fadeInUp" data-wow-delay="0.3s">
                    <h1>Tentang Kami</h1>
                </div>
            </div>
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <p class="txt-green mb-2 fw-bold">Media Sosial Kami</p>
                <div class="d-flex align-items-center justify-content-center">
                    <?php foreach ($sosmed as $s) { ?>
                    <a class="btn btn-outline-light btn-social" href="<?= $s->link; ?>" target="_blank"
                        title="<?= $s->name; ?>"><i class="<?= $s->icon; ?>"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="caption mt-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="content-a wow fadeInUp" data-wow-delay="0.3s">
                        <?= $contentA->deskripsi; ?>
                    </div>
                    <div class="program-kerja-a mt-5">
                        <div class="row gy-3 gy-lg-5">
                            <?php foreach ($program as $p) { ?>
                            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                                <h5><?= $p->title; ?></h5>
                            </div>
                            <div class="col-lg-6">
                                <?= $p->deskripsi; ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="caption-b mb-4 d-block d-lg-none wow fadeInUp" data-wow-delay="0.3s">
                            <?= $contentB->deskripsi; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row-image">
                        <div class="row gy-4">
                            <div class="col-lg-12">
                                <?php if ($imgAbout->status != "N") { ?>
                                <div class="img wow fadeInUp" data-wow-delay="0.3s">
                                    <img src="https://admin103.alkarim.my.id/upload/gallery_about/<?= $imgAbout->image; ?>"
                                        class="img-fluid" alt="">
                                </div>
                                <?php } ?>
                            </div>
                            <?php foreach ($this->db->query("SELECT * FROM tbl_galeri_about_us WHERE status = 'Y' LIMIT 1,3")->result() as $ga) { ?>
                            <div class="col-4 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="img">
                                    <img src="https://admin103.alkarim.my.id/upload/gallery_about/<?= $ga->image; ?>"
                                        class="img-fluid" alt="">
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="caption-b mt-5 d-none d-lg-block wow fadeInUp" data-wow-delay="0.3s">
                <?= $contentB->deskripsi; ?>
            </div>
        </div>
    </div>
</section>

<?php
$waktu = date('M j, Y H:i:s', strtotime($targetDonasi->targetWaktu));
?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>
$(document).ready(function() {
    const progress = document.querySelector(".progress-done");
    const input = "<?= $total->jml; ?>";
    const maxInput = "<?= $targetDonasi->targetNominal; ?>";
    const finalValue = parseInt(input);
    const max = parseInt(maxInput);

    progress.style.width = `${(finalValue / max) * 100}%`;
});


// Set the date we're counting down to
var timeTarget = "<?= $waktu ?>"
var countDownDate = new Date(timeTarget).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="time"
    document.getElementById("time").innerHTML =
        `${days} Hari | ${hours} Jam | ${minutes} Menit | ${seconds} Detik`;
    //  days + " Hari " + hours + "h " + minutes + "m " + seconds + "s ";

    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("time").innerHTML = "00 Hari | 00 Jam | 00 Menit | 00 Detik";
    }
}, 1000);
</script>