<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yasa_gore_dogurganlik( $atts ) {
    wp_enqueue_script(
        'hc-fertility-age',
        HC_PLUGIN_URL . 'modules/yasa-gore-dogurganlik/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-fert-box">
        <h3>Yaşa Göre Doğurganlık Oranı</h3>
        
        <div class="hc-form-group">
            <label for="hc-fa-age">Yaşınız</label>
            <input type="number" id="hc-fa-age" placeholder="Yaş">
        </div>

        <button class="hc-btn" onclick="hcDogurganlikHesapla()">Analiz Et</button>

        <div class="hc-result" id="hc-fertility-age-result">
            <div class="hc-result-item">
                <span>1 Yılda Hamile Kalma Şansı:</span>
                <div class="hc-result-value" id="hc-fa-value">-</div>
            </div>
            <div id="hc-fa-desc" style="margin-top: 15px; font-size: 0.9em; line-height: 1.5;">
                <!-- Açıklama -->
            </div>
            <p style="font-size: 0.8em; color: #666; margin-top: 15px; border-top: 1px solid #eee; padding-top: 10px;">
                *Bu veriler genel popülasyon istatistiklerine dayanmaktadır. Kişisel sağlık durumu oranları değiştirebilir.
            </p>
        </div>
    </div>
    <?php
}
