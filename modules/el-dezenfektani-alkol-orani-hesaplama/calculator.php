<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_el_dezenfektani_alkol_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-el-dezenfektani',
        HC_PLUGIN_URL . 'modules/el-dezenfektani-alkol-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-el-dezenfektani-css',
        HC_PLUGIN_URL . 'modules/el-dezenfektani-alkol-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-el-dezenfektani">
        <h3>El Dezenfektanı Hazırlama</h3>
        <div class="hc-form-group">
            <label for="hc-ed-v2">İstenen Toplam Hacim (ml)</label>
            <input type="number" id="hc-ed-v2" placeholder="Örn: 1000" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ed-c2">İstenen Alkol Oranı (%)</label>
            <input type="number" id="hc-ed-c2" placeholder="Örn: 70" value="70" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ed-c1">Eldeki Alkolün Saflığı (%)</label>
            <input type="number" id="hc-ed-c1" placeholder="Örn: 96" value="96" step="any">
        </div>
        <button class="hc-btn" onclick="hcEDHesapla()">Miktarları Hesapla</button>
        <div class="hc-result" id="hc-ed-result">
            <div class="hc-ed-grid">
                <div class="hc-ed-item"><span>Gereken Alkol:</span> <span id="hc-ed-alkol">-</span></div>
                <div class="hc-ed-item"><span>Gereken Su/Katkı:</span> <span id="hc-ed-su">-</span></div>
            </div>
            <div class="hc-result-note">Hesaplama V₁ * C₁ = V₂ * C₂ formülüne göredir.</div>
        </div>
    </div>
    <?php
}
