<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uranus_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-uranus-burcu',
        HC_PLUGIN_URL . 'modules/uranus-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-uranus-burcu-css',
        HC_PLUGIN_URL . 'modules/uranus-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-uranus-burcu-hesaplama">
        <div class="hc-header">
            <h3>Uranüs Burcu, Deha ve Devrim Potansiyeli Hesaplama</h3>
            <p class="hc-subtitle">Doğum anınızdaki Uranüs konumunu, nesilsel devrim izinizi, sıradışı zihinsel dehanızı ve özgürleşme alanınızı keşfedin.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-uranus-tarih">Doğum Tarihi *</label>
            <input type="date" id="hc-uranus-tarih" value="1995-05-15" class="hc-input" required>
        </div>

        <button type="button" class="hc-btn" onclick="hcUranusBurcuHesapla()">♅ Uranüs Burcumu Hesapla</button>

        <div class="hc-result" id="hc-uranus-burcu-result">
            <div class="hc-uranus-summary-card">
                <div class="hc-uranus-badge-row">
                    <span class="hc-uranus-badge-deg" id="hc-uranus-deg-badge">-</span>
                    <span class="hc-uranus-badge-motion" id="hc-uranus-motion-badge">-</span>
                </div>
                <div class="hc-uranus-result-title" id="hc-uranus-value">-</div>
                <div class="hc-uranus-result-subtitle" id="hc-uranus-meta">-</div>
            </div>

            <div class="hc-uranus-report-card">
                <h4 class="hc-uranus-report-title">⚡ İnovasyon, Özgürlük ve Nesilsel Uyanış</h4>
                <div id="hc-uranus-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
