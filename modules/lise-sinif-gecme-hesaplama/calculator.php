<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lise_sinif_gecme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lise-sinif-gecme',
        HC_PLUGIN_URL . 'modules/lise-sinif-gecme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lsg-calc">
        <h3>Lise Sınıf Geçme Hesaplama</h3>
        <div class="hc-form-group">
            <label>Dönem Ortalaması</label>
            <input type="number" step="0.01" id="hc-lsg-avg" placeholder="0-100">
        </div>
        <div class="hc-form-group">
            <label>Zayıf Ders Sayısı (Yıl Sonu Notu 50 Altı Olanlar)</label>
            <input type="number" id="hc-lsg-fails" placeholder="Örn: 2">
        </div>
        <button class="hc-btn" onclick="hcLiseGecmeHesapla()">Durumu Kontrol Et</button>
        <div class="hc-result" id="hc-lsg-result">
            <div class="hc-result-title">Sonuç:</div>
            <div class="hc-result-value" id="hc-lsg-val">-</div>
            <div id="hc-lsg-info" style="font-size: 14px; margin-top: 10px; color: var(--hc-front-muted);"></div>
        </div>
    </div>
    <?php
}
