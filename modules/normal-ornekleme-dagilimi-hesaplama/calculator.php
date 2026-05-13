<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_normal_ornekleme_dagilimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-normal-ornekleme-dagilimi-hesaplama',
        HC_PLUGIN_URL . 'modules/normal-ornekleme-dagilimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-normal-ornekleme-dagilimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/normal-ornekleme-dagilimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-normal-ornekleme-dagilimi-hesaplama">
        <h3>Normal Örnekleme Dağılımı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-nod-mu">Popülasyon Ortalaması (μ)</label>
            <input type="number" id="hc-nod-mu" step="any" placeholder="Örn: 100">
        </div>
        <div class="hc-form-group">
            <label for="hc-nod-sigma">Popülasyon Standart Sapması (σ)</label>
            <input type="number" id="hc-nod-sigma" step="any" placeholder="Örn: 15">
        </div>
        <div class="hc-form-group">
            <label for="hc-nod-n">Örneklem Büyüklüğü (n)</label>
            <input type="number" id="hc-nod-n" min="1" placeholder="Örn: 30">
        </div>
        <button class="hc-btn" onclick="hcNormalOrneklemeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-normal-ornekleme-dagilimi-hesaplama-result">
            <div class="hc-result-grid">
                <div class="hc-res-item">
                    <span class="hc-label">Örneklem Ortalaması (μ_x̄):</span>
                    <span class="hc-value" id="hc-nod-res-mean">-</span>
                </div>
                <div class="hc-res-item">
                    <span class="hc-label">Standart Hata (σ_x̄):</span>
                    <span class="hc-value" id="hc-nod-res-se">-</span>
                </div>
            </div>
            <div id="hc-nod-res-desc" style="margin-top:15px; font-style:italic;"></div>
        </div>
    </div>
    <?php
}
