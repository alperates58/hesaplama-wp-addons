<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_venus_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-venus-burcu',
        HC_PLUGIN_URL . 'modules/venus-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-venus-burcu-css',
        HC_PLUGIN_URL . 'modules/venus-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-venus-burcu-hesaplama">
        <div class="hc-header">
            <h3>Venüs Burcu ve Aşk Dili Hesaplama</h3>
            <p class="hc-subtitle">Doğum anınızdaki Venüs konumunu, aşk ve çekim tarzınızı, estetik zevkinizi ve değer algınızı keşfedin.</p>
        </div>

        <div class="hc-form-grid-2">
            <div class="hc-form-group">
                <label for="hc-venus-tarih">Doğum Tarihi *</label>
                <input type="date" id="hc-venus-tarih" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-venus-saat">Doğum Saati (Opsiyonel)</label>
                <input type="time" id="hc-venus-saat" value="12:00" class="hc-input">
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcVenusBurcuHesapla()">♀ Venüs Burcumu Hesapla</button>

        <div class="hc-result" id="hc-venus-burcu-result">
            <div class="hc-venus-summary-card">
                <div class="hc-venus-badge-row">
                    <span class="hc-venus-badge-deg" id="hc-venus-deg-badge">-</span>
                    <span class="hc-venus-badge-motion" id="hc-venus-motion-badge">-</span>
                </div>
                <div class="hc-venus-result-title" id="hc-venus-value">-</div>
                <div class="hc-venus-result-subtitle" id="hc-venus-meta">-</div>
            </div>

            <div class="hc-venus-report-card">
                <h4 class="hc-venus-report-title">💖 Aşk Dili, Çekim Tarzı ve İlişki Dinamiği</h4>
                <div id="hc-venus-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
