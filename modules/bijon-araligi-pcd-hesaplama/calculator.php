<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bijon_araligi_pcd_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pcd-calc',
        HC_PLUGIN_URL . 'modules/bijon-araligi-pcd-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pcd-box">
        <h3>Bijon Aralığı (PCD) Hesaplama</h3>
        <div class="hc-form-group">
            <label>Bijon Sayısı</label>
            <select id="hc-pcd-count">
                <option value="4">4 Bijon</option>
                <option value="5" selected>5 Bijon</option>
                <option value="6">6 Bijon</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Bitişik İki Bijon Arası Mesafe (mm)</label>
            <input type="number" id="hc-pcd-dist" placeholder="Örn: 64.7">
            <p style="font-size: 11px; color: #888; margin-top: 5px;">* İki deliğin merkezi arasındaki mesafeyi ölçün.</p>
        </div>
        <button class="hc-btn" onclick="hcPcdHesapla()">PCD Değerini Hesapla</button>
        <div class="hc-result" id="hc-pcd-result">
            <div class="hc-result-title">PCD Değeri:</div>
            <div class="hc-result-value" id="hc-pcd-val">-</div>
        </div>
    </div>
    <?php
}
