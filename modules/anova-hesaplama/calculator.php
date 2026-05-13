<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_anova_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-anova-hesaplama',
        HC_PLUGIN_URL . 'modules/anova-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-anova-hesaplama-css',
        HC_PLUGIN_URL . 'modules/anova-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-anova-calc">
        <h3>Tek Yönlü ANOVA Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-anova-g1">Grup 1 Verileri:</label>
            <textarea id="hc-anova-g1" class="hc-input" placeholder="Örn: 10, 12, 11"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-anova-g2">Grup 2 Verileri:</label>
            <textarea id="hc-anova-g2" class="hc-input" placeholder="Örn: 14, 16, 15"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-anova-g3">Grup 3 Verileri:</label>
            <textarea id="hc-anova-g3" class="hc-input" placeholder="Örn: 18, 20, 19"></textarea>
        </div>
        <button class="hc-btn" onclick="hcAnovaHesapla()">Varyans Analizi Yap</button>
        <div class="hc-result" id="hc-anova-hesaplama-result">
            <table class="hc-table" style="width:100%; text-align: left;">
                <thead>
                    <tr>
                        <th>Varyans Kaynağı</th>
                        <th>SS</th>
                        <th>df</th>
                        <th>MS</th>
                        <th>F</th>
                    </tr>
                </thead>
                <tbody id="hc-anova-tbody"></tbody>
            </table>
            <div style="margin-top:15px; font-weight:bold;">Sonuç: <span id="hc-anova-res-text">-</span></div>
        </div>
    </div>
    <?php
}
