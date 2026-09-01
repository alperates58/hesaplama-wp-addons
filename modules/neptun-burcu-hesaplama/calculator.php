<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_neptun_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-neptun-burcu',
        HC_PLUGIN_URL . 'modules/neptun-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-neptun-burcu-css',
        HC_PLUGIN_URL . 'modules/neptun-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-neptun-burcu-hesaplama">
        <div class="hc-header">
            <h3>Neptün Burcu, Sezgi ve Ruhsal İlham Hesaplama</h3>
            <p class="hc-subtitle">Doğum anınızdaki Neptün konumunu, kolektif hayal gücünüzü, mistik sezgilerinizi ve sanatsal ilham kanalınızı keşfedin.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-neptun-tarih">Doğum Tarihi *</label>
            <input type="date" id="hc-neptun-tarih" value="1995-05-15" class="hc-input" required>
        </div>

        <button type="button" class="hc-btn" onclick="hcNeptunBurcuHesapla()">♆ Neptün Burcumu Hesapla</button>

        <div class="hc-result" id="hc-neptun-burcu-result">
            <div class="hc-neptun-summary-card">
                <div class="hc-neptun-badge-row">
                    <span class="hc-neptun-badge-deg" id="hc-neptun-deg-badge">-</span>
                    <span class="hc-neptun-badge-motion" id="hc-neptun-badge-motion">-</span>
                </div>
                <div class="hc-neptun-result-title" id="hc-neptun-value">-</div>
                <div class="hc-neptun-result-subtitle" id="hc-neptun-meta">-</div>
            </div>

            <div class="hc-neptun-report-card">
                <h4 class="hc-neptun-report-title">🌊 Ruhsal Vizyon, Sezgisel Güç ve İlham</h4>
                <div id="hc-neptun-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
