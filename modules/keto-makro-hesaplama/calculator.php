<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_keto_makro_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-keto',
        HC_PLUGIN_URL . 'modules/keto-makro-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-keto">
        <h3>Ketojenik Makro Hesaplayıcı</h3>
        
        <div class="hc-form-group">
            <label for="hc-keto-toplam">Günlük Toplam Kalori Hedefi (kcal)</label>
            <input type="number" id="hc-keto-toplam" placeholder="Örn: 1800">
        </div>

        <div class="hc-form-group">
            <label for="hc-keto-seviye">Keto Tipi</label>
            <select id="hc-keto-seviye">
                <option value="standart">Standart Keto (%70 Yağ, %25 Protein, %5 Karb)</option>
                <option value="yuksek-protein">Yüksek Proteinli Keto (%60 Yağ, %35 Protein, %5 Karb)</option>
                <option value="hedefli">Hedefli (Sporcular) (%65 Yağ, %20 Protein, %15 Karb)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcKetoHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-keto-makro-result">
            <div style="margin-top: 20px;">
                <div class="hc-result-item" style="border-left: 5px solid #f9a825; padding-left: 10px; margin-bottom: 15px;">
                    <span style="font-size: 0.8em; color: #666;">Yağ (9 kcal/g)</span>
                    <div style="display: flex; justify-content: space-between; align-items: baseline;">
                        <strong id="hc-keto-fat-g" style="font-size: 1.8em;">-</strong>
                        <span id="hc-keto-fat-kcal">- kcal</span>
                    </div>
                </div>
                <div class="hc-result-item" style="border-left: 5px solid #d84315; padding-left: 10px; margin-bottom: 15px;">
                    <span style="font-size: 0.8em; color: #666;">Protein (4 kcal/g)</span>
                    <div style="display: flex; justify-content: space-between; align-items: baseline;">
                        <strong id="hc-keto-prot-g" style="font-size: 1.8em;">-</strong>
                        <span id="hc-keto-prot-kcal">- kcal</span>
                    </div>
                </div>
                <div class="hc-result-item" style="border-left: 5px solid #1565c0; padding-left: 10px; margin-bottom: 15px;">
                    <span style="font-size: 0.8em; color: #666;">Net Karbonhidrat (4 kcal/g)</span>
                    <div style="display: flex; justify-content: space-between; align-items: baseline;">
                        <strong id="hc-keto-carb-g" style="font-size: 1.8em;">-</strong>
                        <span id="hc-keto-carb-kcal">- kcal</span>
                    </div>
                </div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px; border-top: 1px solid #eee; padding-top: 10px;">
                *Ketojenik diyette net karbonhidrat alımının günlük 20-50 gram arasında tutulması hedeflenir.
            </p>
        </div>
    </div>
    <?php
}
