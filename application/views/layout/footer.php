<!-- Footer Start -->
<footer class="container-fluid text-light footer bg-green py-5" id="location">
    <div class="container px-0">
        <div class="row gy-4 gy-lg-0">
            <div class="col-lg-7">
                <div class="text-heading mb-5 wow fadeInUp" data-wow-delay="0.3s">
                    <h2>LOKASI KAMI</h2>
                </div>
                <div class="row gy-5 gy-lg-0 mb-4">
                    <div class="col-md-7">
                        <div class="heading-footer mb-3 wow fadeInUp" data-wow-delay="0.3s">
                            <h4>Alamat</h4>
                        </div>
                        <div class="address wow fadeInUp" data-wow-delay="0.3s">
                            <?= $website->address; ?>
                        </div>
                        <div class="my-4">
                            <div class="heading-footer mb-3 wow fadeInUp" data-wow-delay="0.3s">
                                <h4>EMAIL</h4>
                            </div>
                            <div class="email bg-white w-fit p-3 rounded-10 wow fadeInUp" data-wow-delay="0.3s">
                                <p class="txt-green fw-bold"><?= $website->email; ?></p>
                            </div>
                        </div>
                        <div class="sosmed wow fadeInUp" data-wow-delay="0.3s">
                            <h4 class="text-white mb-2 fw-bold">Media Sosial Kami</h4>
                            <div class="d-flex align-items-center">
                                <?php foreach ($sosmed as $s) { ?>
                                    <a class="btn btn-outline-light btn-social" href="<?= $s->link; ?>" target="_blank" title="<?= $s->name; ?>"><i class="<?= $s->icon; ?>"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="contact">
                            <div class="row gy-4 align-items-center">
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                                    <h4>TELEPON</h4>
                                    <a href="" class="call">
                                        <?php
                                        $number = $website->phone;
                                        $n1 = substr($number, 0, 4);
                                        $n2 = substr($number, 4, 10);
                                        // $n3 = substr($number, 7, 4);
                                        $wa = $n1 . '-' . $n2;
                                        ?>
                                        <img src="assets/img/ic-telp.svg" class="img-fluid me-2" alt="">
                                        <p><?= $wa; ?></p>
                                    </a>
                                </div>
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                                    <h4>KETUA YAYASAN</h4>
                                    <a href="" class="call">
                                        <img src="assets/img/ic-telp.svg" class="img-fluid me-2" alt="">
                                        <p><?= $website->telpKetua; ?></p>
                                    </a>
                                </div>
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                                    <h4>ADMIN</h4>
                                    <a href="" class="call">
                                        <img src="assets/img/ic-telp.svg" class="img-fluid me-2" alt="">
                                        <p><?= $website->telpAdmin; ?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s">
                <?= $website->map; ?>
            </div>
        </div>
    </div>
    <div class="container px-lg-5">
        <div class="copyright">
            <div class="row d-flex justify-content-center text-center mt-4">
                <div class="col-xl-4 col-lg-6 col-md-7 col-sm-9 col-12">
                    <p>
                        Copyright © 2023 -
                        <a href="https://progimedia.com/">PROGIMEDIA</a> All Rights
                        Reserved. Powered by Digitalindo
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

<a href="#" class="btn btn-lg btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
<style>
    .bg-center {
        background: #000000a6;
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: 1065;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .bg-center .alert-bg {
        width: fit-content !important;
        padding: 20px !important;
        font-weight: 900;
    }
</style>
<!-- Modal Form Donasi -->
<div class="modal" id="modalDonasi">
    <div id="alert-donasi"></div>

    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">DONASI TERBAIK ANDA</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-donasi">

                    <form id="inputDonasi">
                        <div class="mb-3">
                            <?php
                            $query = $this->db->query("SELECT * FROM tbl_donasi")->num_rows();
                            $jmlh = $query + 1;
                            $waktu = date('dmy');
                            $nounik = "DONASI-" . $waktu . sprintf("%04s", $jmlh);
                            ?>
                            <input type="hidden" name="no_unik" id="no_unik" value="<?= $nounik; ?>">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap Anda" required="true" readonly="false">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="hideNama" role="switch" id="flexSwitchCheckChecked" style="border-radius: 20px !important;">
                                <input type="hidden" name="hideNama" id="textbox1">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Sembunyikan Nama (Hamba
                                    Allah)</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row gy-3">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="no_wa" id="no_wa" autocomplete="off" placeholder="Ex: 085235753786" required onkeypress="return hanyaAngka(event)">
                                    <small>Pastikan Nomor Anda Terdaftar di WhatsApp</small>
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda (Optional)">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="pesan" id="pesan" rows="4" placeholder="Tuliskan Pesan Atau Do’a Anda disini (Optional) "></textarea>
                        </div>
                        <h5>Donasi Terbaik Anda</h5>
                        <div class="grd">
                            <?php foreach ($masterDonasi as $ms) { ?>
                                <div class="box-price">
                                    <input type="radio" name="pricing" value="<?= $ms->nominal; ?>" onchange="nominal(this)">
                                    <label for="">Rp <?= number_format($ms->nominal, 0, ",", ","); ?></label>
                                </div>
                            <?php } ?>
                            <div class="box-price">
                                <input type="radio" name="pricing" id="show" onclick="kosongkan()">
                                <label for="">Nominal Lain</label>
                            </div>
                        </div>
                        <br>
                        <div class="input-custom w-100 position-relative" id="input-div">
                            <input type="text" id="input-custom1" onkeyup="convertSlug();" class="w-100" autocomplete="off">
                            <input type="hidden" name="donasi" id="hasil" class="form-control" value="" required>
                            <p>Rp</p>
                        </div>
                        <div class="mt-3">
                            <h5>Metode Pembayaran</h5>
                            <div class="bank">
                                <?php foreach ($bank as $b) { ?>
                                    <div class="box-bank">
                                        <input type="radio" name="bankRadio" value="<?= $b->kode; ?>" onchange="bankId(this)">
                                        <label for="">
                                            <div class="logo">
                                                <img src="https://admin103.alkarim.my.id/upload/bank/<?= $b->logo; ?>" class="img-fluid" alt="">
                                            </div>
                                            <p><?= $b->nama; ?><br> a/n <?= $website->name; ?></p>
                                        </label>
                                    </div>
                                <?php } ?>

                                <input type="hidden" name="bank" id="bank" value="" class="form-control" required>
                                <div id="alert-donasi-fail"></div>
                                <div class="btn-donasi">
                                    <button type="submit">Donasi Sekarang</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal footer -->
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div> -->

        </div>
    </div>
</div>

<?php
date_default_timezone_set('ASIA/JAKARTA');
$curr_time     = date('H:i:s');
?>
<div class="whatsapp-chat-section">
    <div class="ctn-box">
        <div class="fixed-box">
            <div class="icon-section">
                <div class="box-segitiga">
                    <div class="text-segitiga">
                        <p>Tanya Saya</p>
                    </div>
                </div>
                <img src="<?= base_url(); ?>assets/whatsapp/ic_whatsapp.png" id="whatsapp_chat" onclick="chatWhatsApp();">
            </div>
        </div>
    </div>
    <div id="whatsapp-chat-popup" class="animated bounceOutDown" style="z-index: 999999; display: none;">
        <div id="list-chat-section" class="list-chat-section animated fadeIn" style="display: block;">
            <div class="header-section" style="background: linear-gradient(180deg, #FDE400 -14.6%, rgba(0, 153, 67, 0.73) 93.43%, #999300 100%);">
                <img class="close-chat-section" src="<?= base_url(); ?>assets/whatsapp/ic_close_btn.png" onclick="closechatWhatsApp();">
                <div class="header-avatar-section">
                    <?php foreach ($this->db->query("SELECT * FROM tbl_chat_wa order by id asc")->result() as $sec1) { ?>
                        <div class="avatar">
                            <img class="avatar" style="position: relative; display: inline-block; vertical-align: middle; height: 60px; width: 60px; border-radius: 60px;" src="https://admin103.alkarim.my.id/upload/wa_image/<?= $sec1->image; ?>">
                        </div>
                    <? } ?>
                </div>
                <div class="header-desc-section" style="margin-top: 15px;">
                    <p>Kami siap membantu Anda, Silahkan chat dengan customer service kami. </p>
                </div>
            </div>
            <div class="chat-section">
                <?php foreach ($this->db->query("SELECT * FROM tbl_chat_wa")->result() as $sec2) { ?>
                    <div class="cs-section" onclick="chatCustomer(<?= $sec2->id; ?>);">
                        <div class="avatar">
                            <img class="avatar" src="https://admin103.alkarim.my.id/upload/wa_image/<?= $sec2->image; ?>">
                        </div>
                        <div class="profile">
                            <p class="position">Customer Service </p>
                            <h3 class="name"><?= strtoupper($sec2->nama); ?></h3>
                            <?php if (($curr_time >= $sec2->startOnline) && ($curr_time < $sec2->endOnline)) { ?>
                                <small class="status">Online <span class="online"><i class="fa fa-circle "></i></span>
                                </small>
                            <? } else { ?>
                                <small class="status">Offline <span class="offline"><i class="fa fa-circle "></i></span>
                                </small>
                            <? } ?>
                        </div>
                    </div>
                <? } ?>
            </div>
        </div>
        <?php foreach ($this->db->query("SELECT * FROM tbl_chat_wa")->result() as $sec3) { ?>
            <div class="chat-section animated fadeIn" id="customer_chat_<?= $sec3->id; ?>" style="display: none;">
                <div class="header-section" style="background:linear-gradient(180deg, #FDE400 -14.6%, rgba(0, 153, 67, 0.73) 93.43%, #999300 100%);">
                    <img class="back-chat-section" src="<?= base_url(); ?>assets/whatsapp/ic_back_btn.png" onclick="backListChat(<?= $sec3->id; ?>);">
                    <div class="header-avatar-section">
                        <div class="avatar">
                            <img class="avatar" style="position: relative; display: inline-block; vertical-align: middle; height: 60px; width: 60px; border-radius: 60px;" src="https://admin103.alkarim.my.id/upload/wa_image/<?= $sec3->image; ?>">
                        </div>
                    </div>
                    <div class="header-desc-section">
                        <h3><?= $sec3->nama; ?></h3>
                        <?php
                        $phone_split = implode(" ", str_split('+62' . $sec3->phone, 4)) . " ";
                        ?>
                        <p><i class="fa fa-phone"></i> <?php echo $phone_split; ?></p>
                    </div>
                </div>
                <div class="inside-chat-section">
                    <div class="chat">
                        <div class="inside-chat">
                            <span>Halo saya <?= ucwords(strtolower($sec3->nama)); ?>, dari Yayasan Bakti Alkarim.</span>
                        </div>
                        <div class="time">
                            <span><?php echo date('H:i'); ?><img src="<?= base_url(); ?>assets/whatsapp/ic_check_wa.png"></span>
                        </div>
                    </div>
                    <div class="chat">
                        <div class="inside-chat">
                            <span>Ada yang bisa saya bantu ?</span>
                        </div>
                        <div class="time">
                            <span><?php echo date('H:i'); ?><img src="<?= base_url(); ?>assets/whatsapp/ic_check_wa.png"></span>
                        </div>
                    </div>
                </div>
                <div class="box-chat-section">
                    <div class="text">
                        <input type="hidden" id="telp_wa_<?= $sec3->id; ?>" name="telp_wa_<?= $sec3->id; ?>" value="<?= $sec3->phone; ?>">
                        <input type="text" class="input-message-whatsapp" id="chat_wa_<?= $sec3->id; ?>" name="chat_wa_<?= $sec3->id; ?>" onchange="textChatWhatsapp(<?= $sec3->id; ?>);" onclick="textChatWhatsapp(<?= $sec3->id; ?>);" onmouseover="textChatWhatsapp(<?= $sec3->id; ?>);" onmouseout="textChatWhatsapp(<?= $sec3->id; ?>);" onkeydown="textChatWhatsapp(<?= $sec3->id; ?>);" value="" placeholder="Type a message">
                    </div>
                    <div class="button-send">
                        <a href="" id="btn_wa_<?= $sec3->id; ?>" target="_blank"><img src="<?= base_url(); ?>assets/whatsapp/ic_send_message.png"></a>
                    </div>
                </div>
            </div>
        <? } ?>
    </div>
</div>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script src="<?= base_url(); ?>assets/lib/wow/wow.min.js"></script>
<script src="<?= base_url(); ?>assets/lib/easing/easing.min.js"></script>
<script src="<?= base_url(); ?>assets/lib/waypoints/waypoints.min.js"></script>
<script src="<?= base_url(); ?>assets/lib/counterup/counterup.min.js"></script>
<script src="<?= base_url(); ?>assets/lib/owlcarousel/owl.carousel.min.js"></script>
<!-- <script src="<?= base_url(); ?>assets/lib/swiper/swiper-bundle.min.js"></script> -->

<!-- Template Javascript -->
<script src="<?= base_url(); ?>assets/js/swiper.min.js"></script>
<script src="<?= base_url(); ?>assets/js/main.js"></script>
<script src="assets/js/click-scroll.js"></script>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js">
</script>


<script>
    const box = document.getElementById('input-div');
    box.style.display = 'none';

    function handleRadioClick() {
        if (document.getElementById('show').checked) {
            box.style.display = 'block';
        } else {
            box.style.display = 'none';
        }
    }
    const radioButtons = document.querySelectorAll('input[name="pricing"]');
    radioButtons.forEach(radio => {
        radio.addEventListener('click', handleRadioClick);
    });

    function kosongkan() {
        document.getElementById('input-custom1').value = "";
        document.getElementById("input-custom").value = "";
    }
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#textbox1').val('N');
        $('#nama').attr("readonly", false);
        $('#hideNama').click(function() {
            if ($("#hideNama").is(":checked") == true) {
                $('#textbox1').val('Y');
                $('#nama').attr("required", false).attr("readonly", true);
            } else {
                $('#textbox1').val('N');
                $('#nama').attr("required", true).attr("readonly", false);
            }
        });

        $("form#inputDonasi").submit(function() {
            var base_url = '<?= base_url(); ?>';
            var idForm = $('#inputDonasi');
            var data = {
                no_unik: $("#no_unik").val(),
                nama: $("#nama").val(),
                hideNama: $("#textbox1").val(),
                no_wa: $("#no_wa").val(),
                email: $("#email").val(),
                pesan: $("#pesan").val(),
                hasil: $("#hasil").val(),
                bank: $("#bank").val(),
            };
            // $('#inputDonasi').LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: base_url + 'donasi/add_donasi',
                data: data,

                success: function(response) {
                    // $('#alert-donasi').LoadingOverlay("hide", true);
                    if (response == 'good') {
                        document.getElementById("alert-donasi").style.height = "auto";
                        $('#alert-donasi').html(
                            '<center class="bg-center"><div class="alert alert-bg alert-success" style="width: 100%;padding: 0px;margin-bottom: 10px;" role="alert"><i class="fa fa-check-circle" ></i> Input Donasi Success</div></center>'
                        );
                        setTimeout(function() {
                            window.location.href = base_url;
                        }, 1500);
                    } else {
                        $('#alert-donasi-fail').html(
                            '<center><div class="alert alert-danger" style="width: 100%;padding: 0px;margin-bottom: 10px;" role="alert"><i class="fa fa-times-circle" ></i> Input Donasi Gagal, Pastikan Nominal Donasi dan Bank di pilih</div></center>'
                        );
                        // setTimeout(function() {
                        //     window.location.href = base_url;
                        // }, 1000);
                    }
                },
                error: function() {
                    // $('#alert-donasi').LoadingOverlay("hide", true);
                    $('#alert-donasi-fail').html(
                        '<center><div class="alert alert-danger" style="width: 100%;padding: 0px;margin-bottom: 10px;" role="alert"><i class="fa fa-times-circle" ></i> Input Donasi Fail Error</div></center>'
                    );
                    // setTimeout(function() {
                    //     window.location.href = base_url;
                    // }, 1000);
                }
            });
            return false;
        });
    });


    function nominal(el) {
        var hasil = document.getElementById('hasil');
        hasil.value = el.value;
    }

    function bankId(idBank) {
        var bank = document.getElementById('bank');
        bank.value = idBank.value;
    }

    function convertSlug() {
        var Text = $('#input-custom1').val();
        var trimmed = $.trim(Text);

        slug = trimmed.replace(/[^a-z0-9-]/gi, '').
        replace(/-+/g, '').
        replace(/^-|-$/g, '');

        $("#hasil").val(slug.toLowerCase());
    }


    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }


    $('input#no_wa').bind("change keyup", function(event) {
        // skip for arrow keys
        if (event.which >= 37 && event.which <= 40) {
            event.preventDefault();
        }

        $(this).val(function(index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/([0-9])$/, '$1')
                /*.replace(/([0-9])([0-9]{3})$/, '$1.$2') //pakai sen dibelakangnya  */
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, "");
        });

    });


    $('input#input-custom1').bind("change keyup", function(event) {
        // skip for arrow keys
        if (event.which >= 37 && event.which <= 40) {
            event.preventDefault();
        }

        $(this).val(function(index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/([0-9])$/, '$1')
                /*.replace(/([0-9])([0-9]{3})$/, '$1.$2') //pakai sen dibelakangnya  */
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });

        $('#input-custom').val($('#input-custom1').val().replace(/,/g, ''));

    });

    function chatWhatsApp() {
        var cek_class = document.getElementById('whatsapp-chat-popup');
        if (cek_class.classList.contains('bounceOutDown')) {
            cek_class.classList.remove("bounceOutDown");
            cek_class.classList.add("bounceInUp");
            cek_class.style.display = "block";
        } else {
            cek_class.classList.remove("bounceInUp");
            cek_class.classList.add("bounceOutDown");
        }
    }

    function chatCustomer(id) {
        var list_chat = document.getElementById("list-chat-section");
        var chat = document.getElementById('customer_chat_' + id);

        if (id != 0 && id != '') {
            list_chat.style.display = "none";
            chat.style.display = "block";
        }
    }

    function closechatWhatsApp() {
        var cek_class = document.getElementById('whatsapp-chat-popup');
        if (cek_class.classList.contains('bounceInUp')) {
            cek_class.classList.remove("bounceInUp");
            cek_class.classList.add("bounceOutDown");
        }
    }

    function backListChat(id) {
        var list_chat = document.getElementById("list-chat-section");
        var chat = document.getElementById('customer_chat_' + id);
        if (id != 0 && id != '') {
            chat.style.display = "none";
            list_chat.style.display = "block";
            $("#chat_wa_" + id).val('');
        }
    }

    function textChatWhatsapp(id) {
        var link_wa = 'https://api.whatsapp.com/send?';
        if (id != 0 && id != '') {
            var telp = $("#telp_wa_" + id).val();
            var chat = $("#chat_wa_" + id).val();
            var link = 'https://api.whatsapp.com/send?phone=62' + telp + '&text=' + chat;
            var btn = document.getElementById("btn_wa_" + id);
            btn.setAttribute("href", link);
        }
    }
</script>

</body>

</html>