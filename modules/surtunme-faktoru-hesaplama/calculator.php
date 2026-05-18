<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_surtunme_faktoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-surtunme-faktoru-hesaplama',
        HC_PLUGIN_URL . 'modules/surtunme-faktoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-surtunme-faktoru-hesaplama-css',
        HC_PLUGIN_URL . 'modules/surtunme-faktoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-surtunme-faktoru-hesaplama">
        <div class="hc-cal-header">
            <h3>Sürtünme Faktörü Hesaplama</h3>
            <p>Boru içindeki akışkanlar için Reynolds Sayısı ve boru pürüzlülüğüne göre Darcy-Weisbach Sürtünme Faktörünü (f) hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-sff-re">Reynolds Sayısı (Re)</label>
            <input type="number" id="hc-sff-re" class="hc-input" placeholder="örn. 10000" step="any" min="1">
            <span style="font-size: 11px; color: #777;">Laminer akış: Re ≤ 2300, Türbülanslı akış: Re > 4000</span>
        </div>

        <div class="hc-form-group">
            <label for="hc-sff-e">Boru Yüzey Pürüzlülüğü (ε - milimetre - mm)</label>
            <input type="number" id="hc-sff-e" class="hc-input" value="0.045" step="any" min="0">
            <span style="font-size: 11px; color: #777;">Çelik boru: 0.045, PVC: 0.0015, Dökme Demir: 0.26</span>
        </div>

        <div class="hc-form-group">
            <label for="hc-sff-d">Boru İç Çapı (D - milimetre - mm)</label>
            <input type="number" id="hc-sff-d" class="hc-input" placeholder="örn. 100" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcSurtunmeFaktoruHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-surtunme-faktoru-hesaplama-result">
            <div class="hc-result-title">Hesaplanan Sürtünme Katsayıları</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Darcy Sürtünme Faktörü (f):</span>
                <span class="hc-result-value" id="hc-sff-res-f">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Fanning Sürtünme Faktörü (f_f):</span>
                <span class="hc-result-value" id="hc-sff-res-ff">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Akış Rejimi:</span>
                <span class="hc-result-value" id="hc-sff-res-regime">-</span>
            </div>
            <div class="hc-result-desc" id="hc-sff-desc"></div>
        </div>
    </div>
    <?php
}
