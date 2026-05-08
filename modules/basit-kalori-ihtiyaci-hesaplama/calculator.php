<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_basit_kalori_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-basit-kalori',
        HC_PLUGIN_URL . 'modules/basit-kalori-ihtiyaci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-basit-kalori">
        <h3>Basit Kalori İhtiyacı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-bk-kilo">Vücut Ağırlığı (kg)</label>
            <input type="number" id="hc-bk-kilo" placeholder="kg">
        </div>

        <div class="hc-form-group">
            <label for="hc-bk-hedef">Hedefiniz</label>
            <select id="hc-bk-hedef">
                <option value="26">Kilo Vermek (Definisyon)</option>
                <option value="31">Kiloyu Korumak (Maintenance)</option>
                <option value="36">Kilo Almak (Hacim/Bulking)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcBasitKaloriHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-basit-kalori-result">
            <span>Tahmini Günlük Kalori İhtiyacınız:</span>
            <div class="hc-result-value" id="hc-bk-value">-</div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Bu hesaplama ortalama değerleri baz alır (26-30, 31-35, 36-40 kcal/kg). Daha kesin sonuçlar için detaylı hesaplayıcıları kullanabilirsiniz.
            </p>
        </div>
    </div>
    <?php
}
