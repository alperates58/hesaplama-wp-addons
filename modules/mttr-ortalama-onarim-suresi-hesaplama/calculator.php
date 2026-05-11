<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mttr_ortalama_onarim_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mttr',
        HC_PLUGIN_URL . 'modules/mttr-ortalama-onarim-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mttr">
        <h3>MTTR (Ortalama Onarım Süresi) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-mttr-time">Toplam Onarım Süresi (Saat)</label>
            <input type="number" id="hc-mttr-time" placeholder="Toplam saat" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-mttr-count">Toplam Arıza/Onarım Sayısı</label>
            <input type="number" id="hc-mttr-count" placeholder="Adet" step="1">
        </div>

        <button class="hc-btn" onclick="hcMttrHesapla()">MTTR Hesapla</button>

        <div class="hc-result" id="hc-mttr-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Ortalama Onarım Süresi:</span>
                <span class="hc-result-value" id="hc-mttr-res-total">--</span>
                <span class="hc-result-unit">Saat / Arıza</span>
            </div>
        </div>
    </div>
    <?php
}
