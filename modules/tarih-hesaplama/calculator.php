<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tarih_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tarih-hesaplama',
        HC_PLUGIN_URL . 'modules/tarih-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tarih-calc">
        <h3>Tarih Hesaplama</h3>
        <div class="hc-form-group">
            <label>1. Tarih</label>
            <input type="date" id="hc-th-date1" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <div class="hc-form-group">
            <label>2. Tarih</label>
            <input type="date" id="hc-th-date2" value="<?php echo date('Y-m-d', strtotime('+1 month')); ?>">
        </div>
        <button class="hc-btn" onclick="hcTarihHesapla()">Farkı Hesapla</button>
        <div class="hc-result" id="hc-th-result">
            <div class="hc-result-title">Zaman Farkı:</div>
            <div class="hc-result-value" id="hc-th-val">-</div>
        </div>
    </div>
    <?php
}
