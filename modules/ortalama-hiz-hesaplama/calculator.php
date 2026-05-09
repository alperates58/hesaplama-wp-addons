<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ortalama_hiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-avg-speed-calc',
        HC_PLUGIN_URL . 'modules/ortalama-hiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ash-box">
        <h3>Ortalama Hız Hesaplama</h3>
        <div class="hc-form-group">
            <label>Gidilen Mesafe (km)</label>
            <input type="number" id="hc-ash-dist" placeholder="Örn: 450">
        </div>
        <div class="hc-form-group">
            <label>Geçen Süre</label>
            <div style="display: flex; gap: 5px;">
                <input type="number" id="hc-ash-h" placeholder="Saat">
                <input type="number" id="hc-ash-m" placeholder="Dakika">
            </div>
        </div>
        <button class="hc-btn" onclick="hcAshHesapla()">Hızı Hesapla</button>
        <div class="hc-result" id="hc-ash-result">
            <div class="hc-result-title">Ortalama Hız:</div>
            <div class="hc-result-value" id="hc-ash-val">-</div>
        </div>
    </div>
    <?php
}
