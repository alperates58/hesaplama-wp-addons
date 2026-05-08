<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_quicki_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-quicki',
        HC_PLUGIN_URL . 'modules/quicki-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-quicki-box">
        <h3>QUICKI İnsülin Duyarlılığı</h3>
        
        <div class="hc-form-group">
            <label for="hc-qi-glucose">Açlık Kan Şekeri (mg/dL)</label>
            <input type="number" id="hc-qi-glucose" placeholder="Örn: 90">
        </div>

        <div class="hc-form-group">
            <label for="hc-qi-insulin">Açlık İnsülini (µU/mL)</label>
            <input type="number" id="hc-qi-insulin" step="0.1" placeholder="Örn: 8.5">
        </div>

        <button class="hc-btn" onclick="hcQUICKIHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-quicki-result">
            <div class="hc-result-item">
                <span>QUICKI Skoru:</span>
                <div class="hc-result-value" id="hc-qi-value">-</div>
            </div>
            <div id="hc-qi-interp" style="margin-top: 15px; padding: 10px; border-radius: 5px; text-align: center; font-weight: bold;">
                <!-- JS -->
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *QUICKI (Quantitative Insulin Sensitivity Check Index), insülin duyarlılığını ölçen bilimsel bir indekstir.
            </p>
        </div>
    </div>
    <?php
}
