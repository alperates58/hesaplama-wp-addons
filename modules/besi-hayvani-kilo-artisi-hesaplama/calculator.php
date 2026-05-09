<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_besi_hayvani_kilo_artisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-besi-hayvani-kilo-artisi-hesaplama',
        HC_PLUGIN_URL . 'modules/besi-hayvani-kilo-artisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-besi-hayvani-kilo-artisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/besi-hayvani-kilo-artisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-besi-hayvani-kilo-artisi-hesaplama">
        <h3>Besi Hayvanı Kilo Artışı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bh-w1">İlk Canlı Ağırlık (kg)</label>
            <input type="number" id="hc-bh-w1" placeholder="Örn: 250" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bh-w2">Son Canlı Ağırlık (kg)</label>
            <input type="number" id="hc-bh-w2" placeholder="Örn: 500" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bh-days">Besi Süresi (gün)</label>
            <input type="number" id="hc-bh-days" placeholder="Örn: 150" step="any">
        </div>
        <button class="hc-btn" onclick="hcBesiHayvaniKiloHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bh-result">
            <div class="hc-bh-grid">
                <div class="hc-bh-item">
                    <span class="hc-result-label">Toplam Kilo Artışı:</span>
                    <span class="hc-result-value" id="hc-bh-total-val">-</span>
                </div>
                <div class="hc-bh-item">
                    <span class="hc-result-label">Günlük Artış (GCAA):</span>
                    <span class="hc-result-value" id="hc-bh-daily-val">-</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
