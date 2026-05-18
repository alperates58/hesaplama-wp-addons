<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ses_yutma_katsayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ses-yutma-katsayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/ses-yutma-katsayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ses-yutma-katsayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ses-yutma-katsayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ses-yutma-katsayisi-hesaplama">
        <div class="hc-cal-header">
            <h3>Ses Yutma Katsayısı Hesaplama</h3>
            <p>Malzemelerin ses yutma performans katsayısını (α) ve ISO 11654 standardına göre yutma sınıfını hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-syk-p-inc">Gelen Ses Gücü (Watt - W)</label>
            <input type="number" id="hc-syk-p-inc" class="hc-input" placeholder="örn. 1.0" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-syk-p-ref">Yansıyan Ses Gücü (Watt - W)</label>
            <input type="number" id="hc-syk-p-ref" class="hc-input" placeholder="örn. 0.2" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcSesYutmaKatsayisiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ses-yutma-katsayisi-hesaplama-result">
            <div class="hc-result-title">Yutma Performans Sonuçları</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Ses Yutma Katsayısı (α):</span>
                <span class="hc-result-value" id="hc-syk-res-alpha">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Ses Yutma Sınıfı (ISO 11654):</span>
                <span class="hc-result-value" id="hc-syk-res-class">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Yutulan Ses Enerjisi Oranı:</span>
                <span class="hc-result-value" id="hc-syk-res-percent">-</span>
            </div>
            <div class="hc-result-desc" id="hc-syk-desc"></div>
        </div>
    </div>
    <?php
}
