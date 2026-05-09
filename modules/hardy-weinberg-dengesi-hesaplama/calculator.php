<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hardy_weinberg_dengesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hardy-weinberg-dengesi-hesaplama',
        HC_PLUGIN_URL . 'modules/hardy-weinberg-dengesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hardy-weinberg-dengesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hardy-weinberg-dengesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hardy-weinberg-dengesi-hesaplama">
        <h3>Hardy-Weinberg Dengesi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hw-p">Alel Frekansı (p - Baskın)</label>
            <input type="number" id="hc-hw-p" placeholder="Örn: 0.6" step="any" min="0" max="1">
        </div>
        <button class="hc-btn" onclick="hcHWHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hw-result">
            <div class="hc-hw-grid">
                <div class="hc-hw-item">
                    <span class="hc-result-label">p (Baskın Alel):</span>
                    <span class="hc-result-value" id="hc-hw-p-val">-</span>
                </div>
                <div class="hc-hw-item">
                    <span class="hc-result-label">q (Çekinik Alel):</span>
                    <span class="hc-result-value" id="hc-hw-q-val">-</span>
                </div>
                <div class="hc-hw-item">
                    <span class="hc-result-label">p² (Homozigot B.):</span>
                    <span class="hc-result-value" id="hc-hw-pp-val">-</span>
                </div>
                <div class="hc-hw-item">
                    <span class="hc-result-label">2pq (Heterozigot):</span>
                    <span class="hc-result-value" id="hc-hw-pq-val">-</span>
                </div>
                <div class="hc-hw-item">
                    <span class="hc-result-label">q² (Homozigot Ç.):</span>
                    <span class="hc-result-value" id="hc-hw-qq-val">-</span>
                </div>
            </div>
            <div class="hc-result-note">p + q = 1 ve p² + 2pq + q² = 1</div>
        </div>
    </div>
    <?php
}
