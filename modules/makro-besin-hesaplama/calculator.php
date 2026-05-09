<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_makro_besin_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-macro',
        HC_PLUGIN_URL . 'modules/makro-besin-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-macro">
        <h3>Makro Besin Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-m-toplam">Günlük Toplam Kalori Hedefi (kcal)</label>
            <input type="number" id="hc-m-toplam" placeholder="Örn: 2000">
        </div>

        <div class="hc-form-group">
            <label for="hc-m-hedef">Beslenme Stratejisi</label>
            <select id="hc-m-hedef">
                <option value="dengeli">Dengeli (%50 K, %20 P, %30 Y)</option>
                <option value="dusuk-karb">Düşük Karbonhidrat (%25 K, %40 P, %35 Y)</option>
                <option value="yuksek-protein">Yüksek Protein (%35 K, %35 P, %30 Y)</option>
                <option value="sporcu">Sporcu/Performans (%60 K, %20 P, %20 Y)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcMakroHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-makro-besin-result">
            <div class="hc-macro-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-top: 20px;">
                <div class="hc-macro-card" style="background: #e3f2fd; padding: 15px; border-radius: 8px; text-align: center;">
                    <span style="display: block; font-size: 0.8em; color: #1565c0;">Karbonhidrat</span>
                    <strong id="hc-m-carb-g" style="font-size: 1.5em; display: block;">-</strong>
                    <span id="hc-m-carb-kcal" style="font-size: 0.8em; color: #666;">- kcal</span>
                </div>
                <div class="hc-macro-card" style="background: #fbe9e7; padding: 15px; border-radius: 8px; text-align: center;">
                    <span style="display: block; font-size: 0.8em; color: #d84315;">Protein</span>
                    <strong id="hc-m-prot-g" style="font-size: 1.5em; display: block;">-</strong>
                    <span id="hc-m-prot-kcal" style="font-size: 0.8em; color: #666;">- kcal</span>
                </div>
                <div class="hc-macro-card" style="background: #fff8e1; padding: 15px; border-radius: 8px; text-align: center;">
                    <span style="display: block; font-size: 0.8em; color: #f9a825;">Yağ</span>
                    <strong id="hc-m-fat-g" style="font-size: 1.5em; display: block;">-</strong>
                    <span id="hc-m-fat-kcal" style="font-size: 0.8em; color: #666;">- kcal</span>
                </div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px; text-align: center;">
                *K: Karbonhidrat (4 kcal/g), P: Protein (4 kcal/g), Y: Yağ (9 kcal/g)
            </p>
        </div>
    </div>
    <?php
}
