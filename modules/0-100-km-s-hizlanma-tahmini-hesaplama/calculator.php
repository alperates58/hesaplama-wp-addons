<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_0_100_km_s_hizlanma_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-accel-calc',
        HC_PLUGIN_URL . 'modules/0-100-km-s-hizlanma-tahmini-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-acc-box">
        <h3>0-100 km/s Hızlanma Tahmini</h3>
        <div class="hc-form-group">
            <label>Motor Gücü (HP)</label>
            <input type="number" id="hc-acc-hp" placeholder="Örn: 150">
        </div>
        <div class="hc-form-group">
            <label>Araç Ağırlığı (kg)</label>
            <input type="number" id="hc-acc-kg" placeholder="Örn: 1300">
        </div>
        <div class="hc-form-group">
            <label>Çekiş Sistemi</label>
            <select id="hc-acc-drive">
                <option value="1.0">Önden Çekiş (FWD)</option>
                <option value="0.95">Arkadan İtiş (RWD)</option>
                <option value="0.85" selected>Dört Çeker (AWD)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcAccHesapla()">Tahmini Süre</button>
        <div class="hc-result" id="hc-acc-result">
            <div class="hc-result-title">Tahmini 0-100 Süresi:</div>
            <div class="hc-result-value" id="hc-acc-val">-</div>
            <p style="font-size: 11px; margin-top: 10px; color: #888;">* Değerler tahmini olup; şanzıman tipi, lastik tutunması ve hava koşullarına göre değişir.</p>
        </div>
    </div>
    <?php
}
