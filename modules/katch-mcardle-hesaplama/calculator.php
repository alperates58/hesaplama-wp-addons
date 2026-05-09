<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_katch_mcardle_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-katch-mcardle',
        HC_PLUGIN_URL . 'modules/katch-mcardle-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-katch-mcardle">
        <h3>Katch-McArdle BMH Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-km-kilo">Vücut Ağırlığı (kg)</label>
            <input type="number" id="hc-km-kilo" placeholder="kg">
        </div>

        <div class="hc-form-group">
            <label for="hc-km-yag">Vücut Yağ Oranı (%)</label>
            <input type="number" id="hc-km-yag" placeholder="%">
        </div>

        <button class="hc-btn" onclick="hcKatchMcArdleHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-katch-mcardle-result">
            <div class="hc-result-item">
                <span>Yağsız Vücut Kütlesi (LBM):</span>
                <strong id="hc-km-lbm">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Bazal Metabolizma Hızınız (BMH):</span>
                <div class="hc-result-value" id="hc-km-value">-</div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Katch-McArdle formülü, kas kütlesini baz aldığı için yağ oranı düşük kişilerde diğer formüllerden daha doğru sonuç verir.
            </p>
        </div>
    </div>
    <?php
}
