<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_iki_tarih_arasindaki_gun_hafta_ay_sayisini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-iki-tarih-detayli',
        HC_PLUGIN_URL . 'modules/iki-tarih-arasindaki-gun-hafta-ay-sayisini-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tarih-detay-calc">
        <h3>İki Tarih Arası Süre Hesaplama</h3>
        <div class="hc-form-group">
            <label>Başlangıç Tarihi</label>
            <input type="date" id="hc-itd-date1" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <div class="hc-form-group">
            <label>Bitiş Tarihi</label>
            <input type="date" id="hc-itd-date2" value="<?php echo date('Y-m-d', strtotime('+1 year')); ?>">
        </div>
        <button class="hc-btn" onclick="hcIkiTarihDetayHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-itd-result">
            <div id="hc-itd-val" style="font-size: 16px; line-height: 2;">-</div>
        </div>
    </div>
    <?php
}
