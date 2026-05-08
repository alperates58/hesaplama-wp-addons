<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_adim_mesafe_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-step-dist',
        HC_PLUGIN_URL . 'modules/adim-mesafe-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-step-dist">
        <h3>Adım Sayısı - Mesafe Hesaplayıcı</h3>
        
        <div class="hc-form-group">
            <label for="hc-sd-steps">Adım Sayısı</label>
            <input type="number" id="hc-sd-steps" placeholder="Örn: 10000">
        </div>

        <div class="hc-form-group">
            <label for="hc-sd-height">Boyunuz (cm)</label>
            <input type="number" id="hc-sd-height" placeholder="cm">
        </div>

        <div class="hc-form-group">
            <label for="hc-sd-sex">Cinsiyet</label>
            <select id="hc-sd-sex">
                <option value="male">Erkek</option>
                <option value="female">Kadın</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcAdımMesafeHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-step-dist-result">
            <div class="hc-result-item">
                <span>Tahmini Mesafe:</span>
                <div class="hc-result-value" id="hc-sd-value">-</div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Mesafe, boyunuza göre hesaplanan ortalama adım uzunluğu üzerinden tahmin edilmiştir.
            </p>
        </div>
    </div>
    <?php
}
