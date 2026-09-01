<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_merkur_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-merkur-burcu',
        HC_PLUGIN_URL . 'modules/merkur-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-merkur-burcu-css',
        HC_PLUGIN_URL . 'modules/merkur-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-merkur-burcu-hesaplama">
        <div class="hc-header">
            <h3>Merkür Burcu ve İletişim Zekası Hesaplama</h3>
            <p class="hc-subtitle">Doğum anınızdaki Merkür konumunu, retro olup olmadığını, zihinsel çalışma yapınızı ve iletişim tarzınızı keşfedin.</p>
        </div>

        <div class="hc-form-grid-2">
            <div class="hc-form-group">
                <label for="hc-merkur-tarih">Doğum Tarihi *</label>
                <input type="date" id="hc-merkur-tarih" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-merkur-saat">Doğum Saati (Opsiyonel)</label>
                <input type="time" id="hc-merkur-saat" value="12:00" class="hc-input">
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcMerkurBurcuHesapla()">☿ Merkür Burcumu Hesapla</button>

        <div class="hc-result" id="hc-merkur-burcu-result">
            <div class="hc-merkur-summary-card">
                <div class="hc-merkur-badge-row">
                    <span class="hc-merkur-badge-deg" id="hc-merkur-deg-badge">-</span>
                    <span class="hc-merkur-badge-motion" id="hc-merkur-motion-badge">-</span>
                </div>
                <div class="hc-merkur-result-title" id="hc-merkur-value">-</div>
                <div class="hc-merkur-result-subtitle" id="hc-merkur-meta">-</div>
            </div>

            <div class="hc-merkur-report-card">
                <h4 class="hc-merkur-report-title">💡 Zihin Yapısı, Öğrenme Tarzı ve İletişim Gücü</h4>
                <div id="hc-merkur-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
