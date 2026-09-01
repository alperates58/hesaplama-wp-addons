<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_saturn_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-saturn-burcu',
        HC_PLUGIN_URL . 'modules/saturn-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-saturn-burcu-css',
        HC_PLUGIN_URL . 'modules/saturn-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-saturn-burcu-hesaplama">
        <div class="hc-header">
            <h3>Satürn Burcu ve Karmik Yaşam Dersi Hesaplama</h3>
            <p class="hc-subtitle">Doğum anınızdaki Satürn konumunu, hayatınızdaki en büyük sınav ve olgunlaşma alanlarını, ustalaşacağınız karmik misyonu keşfedin.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-saturn-tarih">Doğum Tarihi *</label>
            <input type="date" id="hc-saturn-tarih" value="1995-05-15" class="hc-input" required>
        </div>

        <button type="button" class="hc-btn" onclick="hcSaturnBurcuHesapla()">♄ Satürn Burcumu Hesapla</button>

        <div class="hc-result" id="hc-saturn-burcu-result">
            <div class="hc-saturn-summary-card">
                <div class="hc-saturn-badge-row">
                    <span class="hc-saturn-badge-deg" id="hc-saturn-deg-badge">-</span>
                    <span class="hc-saturn-badge-motion" id="hc-saturn-motion-badge">-</span>
                </div>
                <div class="hc-saturn-result-title" id="hc-saturn-value">-</div>
                <div class="hc-saturn-result-subtitle" id="hc-saturn-meta">-</div>
            </div>

            <div class="hc-saturn-report-card">
                <h4 class="hc-saturn-report-title">🏛️ Karmik Sınavlar, Olgunlaşma ve Yaşam Ustalığı</h4>
                <div id="hc-saturn-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
