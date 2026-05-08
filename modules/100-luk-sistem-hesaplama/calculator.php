<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_100_luk_sistem_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-100luk-sistem',
        HC_PLUGIN_URL . 'modules/100-luk-sistem-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-100luk-calc">
        <h3>100’lük Sistem Ortalama Hesaplama</h3>
        <div id="hc-100luk-courses">
            <div class="hc-form-group hc-100luk-course-row" style="display: flex; gap: 10px; margin-bottom: 10px;">
                <input type="number" step="0.01" class="hc-100luk-grade" placeholder="Not (0-100)" style="flex: 1;">
                <input type="number" step="1" class="hc-100luk-hour" placeholder="Ders Saati" style="flex: 1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hc100LukAddRow()" style="background: var(--hc-front-muted); margin-bottom: 10px;">+ Ders Ekle</button>
        <button class="hc-btn" onclick="hc100LukHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-100luk-result">
            <div class="hc-result-title">Yıl Sonu Başarı Puanı:</div>
            <div class="hc-result-value" id="hc-100luk-val">-</div>
        </div>
    </div>
    <?php
}
