<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_is_gunu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-is-gunu-hesaplama',
        HC_PLUGIN_URL . 'modules/is-gunu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ig-calc">
        <h3>İş Günü Hesaplama</h3>
        <div class="hc-form-group">
            <label>Başlangıç Tarihi</label>
            <input type="date" id="hc-ig-start" value="<?php echo date('Y-m-01'); ?>">
        </div>
        <div class="hc-form-group">
            <label>Bitiş Tarihi</label>
            <input type="date" id="hc-ig-end" value="<?php echo date('Y-m-t'); ?>">
        </div>
        <button class="hc-btn" onclick="hcIsGunuHesapla()">İş Günlerini Say</button>
        <div class="hc-result" id="hc-ig-result">
            <div class="hc-result-title">Toplam İş Günü:</div>
            <div class="hc-result-value" id="hc-ig-val">-</div>
        </div>
    </div>
    <?php
}
