<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kac_gun_oldu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kac-gun-oldu',
        HC_PLUGIN_URL . 'modules/kac-gun-oldu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-kgo-calc">
        <h3>Kaç Gün Oldu Hesaplama</h3>
        <div class="hc-form-group">
            <label>Geçmiş Tarih</label>
            <input type="date" id="hc-kgo-date" value="2000-01-01">
        </div>
        <button class="hc-btn" onclick="hcKacGunOlduHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kgo-result">
            <div class="hc-result-title">Geçen Gün Sayısı:</div>
            <div class="hc-result-value" id="hc-kgo-val">-</div>
        </div>
    </div>
    <?php
}
