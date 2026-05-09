<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lastik_olcusu_karsilastirma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tire-compare-calc',
        HC_PLUGIN_URL . 'modules/lastik-olcusu-karsilastirma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tcc-box">
        <h3>Lastik Ölçüsüne Göre Hız Göstergesi Hatası Hesaplama</h3>
        <div class="hc-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="hc-form-section">
                <h4>Orijinal Lastik</h4>
                <div style="display: flex; gap: 5px;">
                    <input type="number" id="hc-tcc-w1" placeholder="205" style="width: 60px;">
                    <input type="number" id="hc-tcc-r1" placeholder="55" style="width: 60px;">
                    <input type="number" id="hc-tcc-j1" placeholder="16" style="width: 60px;">
                </div>
            </div>
            <div class="hc-form-section">
                <h4>Yeni Lastik</h4>
                <div style="display: flex; gap: 5px;">
                    <input type="number" id="hc-tcc-w2" placeholder="225" style="width: 60px;">
                    <input type="number" id="hc-tcc-r2" placeholder="45" style="width: 60px;">
                    <input type="number" id="hc-tcc-j2" placeholder="17" style="width: 60px;">
                </div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcTccHesapla()">Karşılaştır</button>
        <div class="hc-result" id="hc-tcc-result">
            <div style="text-align: center; margin-bottom: 15px;">
                <div style="font-size: 14px; color: #666;">Çap Değişim Oranı:</div>
                <div id="hc-tcc-diff-pct" style="font-size: 32px; font-weight: bold;">-</div>
            </div>
            <div id="hc-tcc-verdict" style="font-weight: bold; text-align: center;"></div>
            <hr>
            <div style="font-size: 13px; line-height: 1.6;">
                Orijinal Çap: <span id="hc-tcc-dia1">-</span><br>
                Yeni Çap: <span id="hc-tcc-dia2">-</span><br>
                Hız Göstergesi Hatası: 100 km/h iken gerçek hız <span id="hc-tcc-speed">-</span> olacak.
            </div>
        </div>
    </div>
    <?php
}
