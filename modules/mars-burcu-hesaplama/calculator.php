<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mars_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mars-burcu',
        HC_PLUGIN_URL . 'modules/mars-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mars-burcu-css',
        HC_PLUGIN_URL . 'modules/mars-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mars-burcu-hesaplama">
        <div class="hc-header">
            <h3>Mars Burcu, Tutku ve Motivasyon Hesaplama</h3>
            <p class="hc-subtitle">Doğum anınızdaki Mars konumunu, savaşçı ruhunuzu, eyleme geçme gücünüzü ve öfke yönetim tarzınızı keşfedin.</p>
        </div>

        <div class="hc-form-grid-2">
            <div class="hc-form-group">
                <label for="hc-mars-tarih">Doğum Tarihi *</label>
                <input type="date" id="hc-mars-tarih" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-mars-saat">Doğum Saati (Opsiyonel)</label>
                <input type="time" id="hc-mars-saat" value="12:00" class="hc-input">
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcMarsBurcuHesapla()">♂ Mars Burcumu Hesapla</button>

        <div class="hc-result" id="hc-mars-burcu-result">
            <div class="hc-mars-summary-card">
                <div class="hc-mars-badge-row">
                    <span class="hc-mars-badge-deg" id="hc-mars-deg-badge">-</span>
                    <span class="hc-mars-badge-motion" id="hc-mars-motion-badge">-</span>
                </div>
                <div class="hc-mars-result-title" id="hc-mars-value">-</div>
                <div class="hc-mars-result-subtitle" id="hc-mars-meta">-</div>
            </div>

            <div class="hc-mars-report-card">
                <h4 class="hc-mars-report-title">🔥 Eylem Gücü, Mücadele Tarzı ve Tutku Dinamiği</h4>
                <div id="hc-mars-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
