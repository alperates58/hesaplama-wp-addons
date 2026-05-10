<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bisiklet_hiz_tempo_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bisiklet-hiz-tempo-hesaplama',
        HC_PLUGIN_URL . 'modules/bisiklet-hiz-tempo-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bisiklet-hiz-tempo-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bisiklet-hiz-tempo-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-speed-pace">
        <h3>Bisiklet Hız ve Tempo</h3>
        <div class="hc-form-group">
            <label for="hc-sp-dist">Mesafe (km)</label>
            <input type="number" id="hc-sp-dist" placeholder="Örn: 40">
        </div>
        <div class="hc-form-group">
            <label>Süre</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-sp-hr" placeholder="Saat" value="0">
                <input type="number" id="hc-sp-min" placeholder="Dakika" value="0">
            </div>
        </div>
        <button class="hc-btn" onclick="hcBisikletHizTempoHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sp-result">
            <div class="hc-sp-grid">
                <div>
                    <div class="hc-result-label">Ortalama Hız</div>
                    <div class="hc-result-value" id="hc-sp-speed-val">-</div>
                </div>
                <div>
                    <div class="hc-result-label">Tempo (min/km)</div>
                    <div class="hc-result-value" id="hc-sp-pace-val">-</div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
