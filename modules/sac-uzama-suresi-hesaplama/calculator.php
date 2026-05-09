<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sac_uzama_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hair-growth',
        HC_PLUGIN_URL . 'modules/sac-uzama-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hair-growth-css',
        HC_PLUGIN_URL . 'modules/sac-uzama-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hair-growth">
        <h3>Saç Uzama Süresi</h3>
        <div class="hc-form-group">
            <label for="hc-hair-current">Mevcut Uzunluk (cm)</label>
            <input type="number" id="hc-hair-current" placeholder="Örn: 10" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-hair-target">Hedef Uzunluk (cm)</label>
            <input type="number" id="hc-hair-target" placeholder="Örn: 25" min="1">
        </div>
        <button class="hc-btn" onclick="hcHairGrowthHesapla()">Süreyi Hesapla</button>
        <div class="hc-result" id="hc-hair-growth-result">
            <div class="hc-result-item">
                <span>Tahmini Süre:</span>
                <span class="hc-result-value" id="hc-res-hair-time">-</span>
            </div>
            <p class="hc-hair-note">İnsan saçı ayda ortalama 1.25 cm uzar. Bu süre genetiğe ve bakıma göre değişebilir.</p>
        </div>
    </div>
    <?php
}
