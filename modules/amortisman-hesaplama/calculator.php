<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_amortisman_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-amortisman-hesaplama',
        HC_PLUGIN_URL . 'modules/amortisman-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-amortisman-css',
        HC_PLUGIN_URL . 'modules/amortisman-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-amortisman-hesaplama">
        <h3>Amortisman Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-am-value">Varlık Değeri (TL)</label>
            <input type="number" id="hc-am-value" placeholder="Örn: 100000">
        </div>

        <div class="hc-form-group">
            <label for="hc-am-life">Faydalı Ömür (Yıl)</label>
            <input type="number" id="hc-am-life" placeholder="Örn: 5">
        </div>

        <div class="hc-form-group">
            <label for="hc-am-method">Hesaplama Yöntemi</label>
            <select id="hc-am-method">
                <option value="straight">Normal (Eşit Tutarlı)</option>
                <option value="declining">Azalan Bakiyeler (Hızlandırılmış)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcAmortismanHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-amortisman-result">
            <div class="hc-result-item">
                <span>Amortisman Oranı:</span>
                <strong id="hc-am-res-rate">-</strong>
            </div>
            <div class="hc-result-item">
                <span>İlk Yıl Amortismanı:</span>
                <strong id="hc-am-res-first">-</strong>
            </div>
            <div class="hc-result-value" id="hc-am-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Yıllık Amortisman Tutarı</p>
            <div id="hc-am-schedule" style="margin-top:15px; font-size:0.85em;"></div>
        </div>
    </div>
    <?php
}
