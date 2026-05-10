<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_5_3_1_antrenman_agirligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-5-3-1-antrenman-agirligi-hesaplama',
        HC_PLUGIN_URL . 'modules/5-3-1-antrenman-agirligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-5-3-1-antrenman-agirligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/5-3-1-antrenman-agirligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-531">
        <h3>5/3/1 Antrenman Programı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-531-1rm">Tahmini 1RM Değeriniz (kg)</label>
            <input type="number" id="hc-531-1rm" placeholder="Örn: 150" step="0.5">
        </div>
        <button class="hc-btn" onclick="hc531AntrenmanAgirligiHesapla()">Programı Çıkart</button>
        
        <div class="hc-result" id="hc-531-result">
            <div id="hc-531-tm-info" style="margin-bottom: 20px; font-weight: bold; color: var(--hc-primary);"></div>
            <div class="hc-531-grid">
                <div class="hc-531-week">
                    <h4>1. Hafta (5 Tekrar)</h4>
                    <div id="hc-531-w1"></div>
                </div>
                <div class="hc-531-week">
                    <h4>2. Hafta (3 Tekrar)</h4>
                    <div id="hc-531-w2"></div>
                </div>
                <div class="hc-531-week">
                    <h4>3. Hafta (5/3/1 Tekrar)</h4>
                    <div id="hc-531-w3"></div>
                </div>
                <div class="hc-531-week">
                    <h4>4. Hafta (Deload)</h4>
                    <div id="hc-531-w4"></div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
