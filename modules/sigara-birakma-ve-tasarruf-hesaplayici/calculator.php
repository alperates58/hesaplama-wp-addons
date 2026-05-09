<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sigara_birakma_ve_tasarruf_hesaplayici( $atts ) {
    wp_enqueue_script(
        'hc-quit-smoke',
        HC_PLUGIN_URL . 'modules/sigara-birakma-ve-tasarruf-hesaplayici/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-quit-smoke-css',
        HC_PLUGIN_URL . 'modules/sigara-birakma-ve-tasarruf-hesaplayici/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-quit-smoke">
        <h3>Sigara Bırakma Tasarrufu</h3>
        <div class="hc-form-group">
            <label for="hc-smoke-daily">Günde Kaç Adet Sigara?</label>
            <input type="number" id="hc-smoke-daily" value="20" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-smoke-price">Paket Fiyatı (TL)</label>
            <input type="number" id="hc-smoke-price" value="65" min="1">
        </div>
        <button class="hc-btn" onclick="hcQuitSmokeHesapla()">Kazançlarımı Gör</button>
        <div class="hc-result" id="hc-quit-smoke-result">
            <div class="hc-res-tabs">
                <div class="hc-res-item">
                    <span>Yıllık Tasarruf:</span>
                    <span class="hc-result-value" id="hc-res-smoke-money">0 TL</span>
                </div>
                <div class="hc-res-item">
                    <span>Geri Kazanılan Zaman:</span>
                    <span id="hc-res-smoke-time">0 Gün</span>
                </div>
            </div>
            <div class="hc-health-timeline">
                <p id="hc-res-smoke-health">Sigarayı bırakmak hayatınıza yıllar katar.</p>
            </div>
        </div>
    </div>
    <?php
}
