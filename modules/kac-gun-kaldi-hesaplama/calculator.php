<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kac_gun_kaldi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kac-gun-kaldi',
        HC_PLUGIN_URL . 'modules/kac-gun-kaldi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-kgk-calc">
        <h3>Kaç Gün Kaldı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Hedef Tarih</label>
            <input type="date" id="hc-kgk-date" value="<?php echo date('Y-12-31'); ?>">
        </div>
        <button class="hc-btn" onclick="hcKacGunKaldiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kgk-result">
            <div class="hc-result-title">Kalan Süre:</div>
            <div class="hc-result-value" id="hc-kgk-val">-</div>
        </div>
    </div>
    <?php
}
