<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gebe_kalma_tarihi( $atts ) {
    wp_enqueue_script(
        'hc-conception-date',
        HC_PLUGIN_URL . 'modules/gebe-kalma-tarihi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-concep-box">
        <h3>Gebe Kalma Tarihi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-cd-method">Hesaplama Yöntemi</label>
            <select id="hc-cd-method" onchange="hcCDToggle()">
                <option value="lmp">Son Adet Tarihine Göre</option>
                <option value="edd">Tahmini Doğum Tarihine Göre</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-cd-date-group">
            <label id="hc-cd-date-label">Son Adet Tarihi (SAT)</label>
            <input type="date" id="hc-cd-date">
        </div>

        <button class="hc-btn" onclick="hcGebeKalmaHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-gebe-kalma-result">
            <div class="hc-result-item">
                <span>Muhtemel Gebe Kalma Tarihi:</span>
                <div class="hc-result-value" id="hc-cd-value">-</div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Gebe kalma tarihi genellikle yumurtlamanın gerçekleştiği gündür. Bu tarih, 28 günlük standart döngü üzerinden hesaplanmıştır.
            </p>
        </div>
    </div>
    <?php
}
