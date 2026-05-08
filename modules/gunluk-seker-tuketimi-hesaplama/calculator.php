<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_seker_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sugar-consumption',
        HC_PLUGIN_URL . 'modules/gunluk-seker-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-sugar">
        <h3>Günlük Şeker Tüketimi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sc-grams">Günlük Tüketilen Şeker (Gram)</label>
            <input type="number" id="hc-sc-grams" placeholder="Örn: 50">
        </div>

        <div class="hc-form-group">
            <label for="hc-sc-tdee">Günlük Toplam Kalori İhtiyacınız (Opsiyonel)</label>
            <input type="number" id="hc-sc-tdee" placeholder="Varsayılan: 2000 kcal">
        </div>

        <button class="hc-btn" onclick="hcSekerTuketimiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-sugar-consumption-result">
            <div class="hc-result-item">
                <span>Şekerden Gelen Enerji:</span>
                <div class="hc-result-value" id="hc-sc-kcal">-</div>
            </div>
            <div class="hc-result-item">
                <span>Toplam Enerji İçindeki Payı:</span>
                <strong id="hc-sc-percent">-</strong>
            </div>
            <div id="hc-sc-status" style="margin-top: 15px; padding: 10px; border-radius: 5px; text-align: center; font-weight: bold;">
                <!-- Durum mesajı buraya -->
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Dünya Sağlık Örgütü (WHO), ilave şeker tüketiminin günlük enerjinin %10'undan az olmasını, ideal olarak %5'in altında tutulmasını önermektedir.
            </p>
        </div>
    </div>
    <?php
}
