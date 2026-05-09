<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_takvim_haftasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-takvim-haftasi',
        HC_PLUGIN_URL . 'modules/takvim-haftasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-th-calc">
        <h3>Takvim Haftası Hesaplama</h3>
        <div class="hc-form-group">
            <label>Tarih Seçin</label>
            <input type="date" id="hc-thw-date" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcHaftaNoHesapla()">Hafta Numarasını Bul</button>
        <div class="hc-result" id="hc-thw-result">
            <div class="hc-result-title">Hafta Numarası:</div>
            <div class="hc-result-value" id="hc-thw-val">-</div>
        </div>
    </div>
    <?php
}
