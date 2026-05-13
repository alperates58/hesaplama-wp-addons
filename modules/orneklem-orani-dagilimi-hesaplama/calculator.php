<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_orneklem_orani_dagilimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-orneklem-orani-dagilimi-hesaplama',
        HC_PLUGIN_URL . 'modules/orneklem-orani-dagilimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-orneklem-orani-dagilimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/orneklem-orani-dagilimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-orneklem-orani-dagilimi-hesaplama">
        <h3>Örneklem Oranı Dağılımı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pd-p">Popülasyon Oranı (p) [0-1]</label>
            <input type="number" id="hc-pd-p" step="0.01" min="0" max="1" placeholder="Örn: 0.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-pd-n">Örneklem Büyüklüğü (n)</label>
            <input type="number" id="hc-pd-n" min="1" placeholder="Örn: 100">
        </div>
        <button class="hc-btn" onclick="hcOranDagilimiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-orneklem-orani-dagilimi-hesaplama-result">
            <div class="hc-result-grid">
                <div class="hc-res-item">
                    <span class="hc-label">Dağılım Ortalaması (μ_p̂):</span>
                    <span class="hc-value" id="hc-pd-res-mean">-</span>
                </div>
                <div class="hc-res-item">
                    <span class="hc-label">Standart Hata (σ_p̂):</span>
                    <span class="hc-value" id="hc-pd-res-se">-</span>
                </div>
            </div>
            <div id="hc-pd-res-condition" style="margin-top:15px; font-style:italic;"></div>
        </div>
    </div>
    <?php
}
