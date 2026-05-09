<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hicri_takvim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hicri-takvim-hesaplama',
        HC_PLUGIN_URL . 'modules/hicri-takvim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hicri-calc">
        <h3>Hicri Takvim Hesaplama</h3>
        <div class="hc-form-group">
            <label>Tarih Seçin (Miladi)</label>
            <input type="date" id="hc-ht-date" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcHicriHesapla()">Hicri Tarihi Göster</button>
        <div class="hc-result" id="hc-ht-result">
            <div class="hc-result-title">Hicri Tarih:</div>
            <div class="hc-result-value" id="hc-ht-val">-</div>
        </div>
    </div>
    <?php
}
