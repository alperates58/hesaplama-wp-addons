<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hafta_sonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hafta-sonu-hesaplama',
        HC_PLUGIN_URL . 'modules/hafta-sonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hs-calc">
        <h3>Hafta Sonu Hesaplama</h3>
        <div class="hc-form-group">
            <label>Başlangıç Tarihi</label>
            <input type="date" id="hc-hs-start" value="<?php echo date('Y-m-01'); ?>">
        </div>
        <div class="hc-form-group">
            <label>Bitiş Tarihi</label>
            <input type="date" id="hc-hs-end" value="<?php echo date('Y-m-t'); ?>">
        </div>
        <button class="hc-btn" onclick="hcHaftaSonuHesapla()">Hafta Sonlarını Say</button>
        <div class="hc-result" id="hc-hs-result">
            <div class="hc-result-title">Toplam Hafta Sonu Günü:</div>
            <div class="hc-result-value" id="hc-hs-val">-</div>
        </div>
    </div>
    <?php
}
