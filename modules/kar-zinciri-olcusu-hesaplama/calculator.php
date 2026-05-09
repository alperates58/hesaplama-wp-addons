<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kar_zinciri_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-snow-chain',
        HC_PLUGIN_URL . 'modules/kar-zinciri-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-sz-box">
        <h3>Kar Zinciri Ölçüsü Hesaplama</h3>
        <div style="display: flex; gap: 5px; margin-bottom: 20px;">
            <input type="number" id="hc-sz-w" placeholder="205" style="flex:1">
            <input type="number" id="hc-sz-r" placeholder="55" style="flex:1">
            <input type="number" id="hc-sz-j" placeholder="16" style="flex:1">
        </div>
        <button class="hc-btn" onclick="hcSzHesapla()">Zincir Grubunu Bul</button>
        <div class="hc-result" id="hc-sz-result">
            <div class="hc-result-title">Önerilen Zincir Grubu:</div>
            <div class="hc-result-value" id="hc-sz-val">-</div>
            <p style="font-size: 11px; margin-top: 10px; color: #888;">* Değerler genel standartlara göredir. Markaya göre farklılık gösterebilir.</p>
        </div>
    </div>
    <?php
}
