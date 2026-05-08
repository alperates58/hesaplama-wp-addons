<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vucut_su_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-body-water',
        HC_PLUGIN_URL . 'modules/vucut-su-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-body-water">
        <h3>Vücut Su Oranı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-bw-cinsiyet">Cinsiyet</label>
            <select id="hc-bw-cinsiyet">
                <option value="erkek">Erkek</option>
                <option value="kadin">Kadın</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-bw-yas">Yaş</label>
            <input type="number" id="hc-bw-yas" placeholder="Yaş">
        </div>

        <div class="hc-form-group">
            <label for="hc-bw-boy">Boy (cm)</label>
            <input type="number" id="hc-bw-boy" placeholder="cm">
        </div>

        <div class="hc-form-group">
            <label for="hc-bw-kilo">Kilo (kg)</label>
            <input type="number" id="hc-bw-kilo" placeholder="kg">
        </div>

        <button class="hc-btn" onclick="hcVucutSuOraniHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-body-water-result">
            <div class="hc-result-item">
                <span>Toplam Vücut Suyu (TBW):</span>
                <div class="hc-result-value" id="hc-bw-liters">-</div>
            </div>
            <div class="hc-result-item">
                <span>Vücut Su Oranı (%):</span>
                <strong id="hc-bw-percent">-</strong>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Watson formülü kullanılmıştır. Yetişkin bir bireyde su oranı genellikle %45-%65 arasındadır (sporcularda daha yüksek olabilir).
            </p>
        </div>
    </div>
    <?php
}
