<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dus_su_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dus-su',
        HC_PLUGIN_URL . 'modules/dus-su-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dus-su-css',
        HC_PLUGIN_URL . 'modules/dus-su-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dus-su">
        <h3>Duş Su Tüketimi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-shower-duration">Duş Süresi (Dakika)</label>
            <input type="number" id="hc-shower-duration" placeholder="Örn: 10" min="1" value="8">
        </div>
        <div class="hc-form-group">
            <label for="hc-shower-type">Duş Başlığı Tipi</label>
            <select id="hc-shower-type">
                <option value="standard">Standart (~9.5 L/dk)</option>
                <option value="eco">Tasarruflu (~6.5 L/dk)</option>
                <option value="high">Yüksek Akışlı (~15 L/dk)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcDusSuHesapla()">Tüketimi Hesapla</button>
        <div class="hc-result" id="hc-dus-su-result">
            <div class="hc-result-item">
                <span>Tek Seferlik Tüketim:</span>
                <span class="hc-result-value" id="hc-res-shower-liters">0 Litre</span>
            </div>
            <div class="hc-res-info">
                <p id="hc-res-shower-desc">Haftada 5 duş ile yıllık 0 Litre su harcanmaktadır.</p>
            </div>
        </div>
    </div>
    <?php
}
