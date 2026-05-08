<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_4_luk_sistem_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-4luk-sistem',
        HC_PLUGIN_URL . 'modules/4-luk-sistem-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-4luk-calc">
        <h3>4’lük Sistem Ortalama Hesaplama</h3>
        <div id="hc-4luk-courses">
            <div class="hc-form-group hc-4luk-course-row" style="display: flex; gap: 10px; margin-bottom: 10px;">
                <input type="number" step="0.01" class="hc-4luk-grade" placeholder="Not (0-4)" style="flex: 1;">
                <input type="number" step="0.5" class="hc-4luk-credit" placeholder="Kredi" style="flex: 1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hc4LukAddRow()" style="background: var(--hc-front-muted); margin-bottom: 10px;">+ Ders Ekle</button>
        <button class="hc-btn" onclick="hc4LukHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-4luk-result">
            <div class="hc-result-title">Not Ortalamanız (GPA):</div>
            <div class="hc-result-value" id="hc-4luk-val">-</div>
        </div>
    </div>
    <?php
}
