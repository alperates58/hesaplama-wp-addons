<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ortalama_medyan_mod_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ortalama-medyan-mod-hesaplama',
        HC_PLUGIN_URL . 'modules/ortalama-medyan-mod-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ortalama-medyan-mod-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ortalama-medyan-mod-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ortalama-medyan-mod-hesaplama">
        <h3>Ortalama, Medyan ve Mod Hesaplama</h3>
        <p>Verileri virgül veya boşluk ile ayırarak giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-mmm-data">Veri Seti</label>
            <textarea id="hc-mmm-data" rows="4" placeholder="5, 8, 12, 8, 15, 20, 8, 10"></textarea>
        </div>
        <button class="hc-btn" onclick="hcMmmHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ortalama-medyan-mod-hesaplama-result">
            <div class="hc-result-grid">
                <div class="hc-res-item">
                    <span class="hc-label">Ortalama:</span>
                    <span class="hc-value" id="hc-mmm-mean">-</span>
                </div>
                <div class="hc-res-item">
                    <span class="hc-label">Medyan:</span>
                    <span class="hc-value" id="hc-mmm-median">-</span>
                </div>
                <div class="hc-res-item">
                    <span class="hc-label">Mod:</span>
                    <span class="hc-value" id="hc-mmm-mode">-</span>
                </div>
                <div class="hc-res-item">
                    <span class="hc-label">Açıklık (Range):</span>
                    <span class="hc-value" id="hc-mmm-range">-</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
