<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lastik_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tire-size-calc',
        HC_PLUGIN_URL . 'modules/lastik-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tsc-box">
        <h3>Lastik Ölçüsü Hesaplama</h3>
        <div style="display: flex; gap: 10px; align-items: center; justify-content: center; margin-bottom: 20px;">
            <div class="hc-form-group" style="width: 80px;"><input type="number" id="hc-tsc-width" placeholder="205"></div>
            <div style="font-size: 24px; font-weight: bold;">/</div>
            <div class="hc-form-group" style="width: 80px;"><input type="number" id="hc-tsc-ratio" placeholder="55"></div>
            <div style="font-size: 24px; font-weight: bold;">R</div>
            <div class="hc-form-group" style="width: 80px;"><input type="number" id="hc-tsc-rim" placeholder="16"></div>
        </div>
        <button class="hc-btn" onclick="hcTscHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tsc-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Toplam Çap:</strong><br><span id="hc-tsc-diameter">-</span></div>
                <div><strong>Yanak Yüksekliği:</strong><br><span id="hc-tsc-sidewall">-</span></div>
                <div><strong>Lastik Çevresi:</strong><br><span id="hc-tsc-circ">-</span></div>
                <div><strong>1 km'de Devir:</strong><br><span id="hc-tsc-revs">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
