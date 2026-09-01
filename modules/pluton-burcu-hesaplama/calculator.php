<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pluton_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pluton-burcu',
        HC_PLUGIN_URL . 'modules/pluton-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pluton-burcu-css',
        HC_PLUGIN_URL . 'modules/pluton-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pluton-burcu-hesaplama">
        <div class="hc-header">
            <h3>Plüton Burcu, Güç ve Dönüşüm Simyası Hesaplama</h3>
            <p class="hc-subtitle">Doğum anınızdaki Plüton konumunu, nesilsel güç izinizi, küllerinden yeniden doğma kapasitenizi ve psikolojik simyanızı keşfedin.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-pluton-tarih">Doğum Tarihi *</label>
            <input type="date" id="hc-pluton-tarih" value="1995-05-15" class="hc-input" required>
        </div>

        <button type="button" class="hc-btn" onclick="hcPlutonBurcuHesapla()">♇ Plüton Burcumu Hesapla</button>

        <div class="hc-result" id="hc-pluton-burcu-result">
            <div class="hc-pluton-summary-card">
                <div class="hc-pluton-badge-row">
                    <span class="hc-pluton-badge-deg" id="hc-pluton-deg-badge">-</span>
                    <span class="hc-pluton-badge-motion" id="hc-pluton-badge-motion">-</span>
                </div>
                <div class="hc-pluton-result-title" id="hc-pluton-value">-</div>
                <div class="hc-pluton-result-subtitle" id="hc-pluton-meta">-</div>
            </div>

            <div class="hc-pluton-report-card">
                <h4 class="hc-pluton-report-title">🦅 Küllerinden Doğuş, Güç ve Ruhsal Simya</h4>
                <div id="hc-pluton-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
