<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_egitim_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-egitim-suresi',
        HC_PLUGIN_URL . 'modules/egitim-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-es-calc">
        <h3>Eğitim Süresi Hesaplama</h3>
        <div class="hc-form-group">
            <label>Başlangıç Tarihi</label>
            <input type="date" id="hc-es-start" value="2022-09-01">
        </div>
        <div class="hc-form-group">
            <label>Bitiş / Mezuniyet Tarihi</label>
            <input type="date" id="hc-es-end" value="2026-06-15">
        </div>
        <button class="hc-btn" onclick="hcEsHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-es-result">
            <div class="hc-result-title">Toplam Süre:</div>
            <div class="hc-result-value" id="hc-es-val">-</div>
        </div>
    </div>
    <?php
}
