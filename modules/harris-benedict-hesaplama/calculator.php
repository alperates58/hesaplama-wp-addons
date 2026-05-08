<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_harris_benedict_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-harris-benedict',
        HC_PLUGIN_URL . 'modules/harris-benedict-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-harris-benedict">
        <h3>Harris-Benedict BMH Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-hb-cinsiyet">Cinsiyet</label>
            <select id="hc-hb-cinsiyet">
                <option value="erkek">Erkek</option>
                <option value="kadin">Kadın</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-hb-yas">Yaş</label>
            <input type="number" id="hc-hb-yas" placeholder="Yaş">
        </div>

        <div class="hc-form-group">
            <label for="hc-hb-boy">Boy (cm)</label>
            <input type="number" id="hc-hb-boy" placeholder="cm">
        </div>

        <div class="hc-form-group">
            <label for="hc-hb-kilo">Kilo (kg)</label>
            <input type="number" id="hc-hb-kilo" placeholder="kg">
        </div>

        <button class="hc-btn" onclick="hcHarrisBenedictHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-harris-benedict-result">
            <span>Bazal Metabolizma Hızınız (BMH):</span>
            <div class="hc-result-value" id="hc-hb-value">-</div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Harris-Benedict formülü, vücudunuzun temel fonksiyonlarını sürdürmek için ihtiyaç duyduğu minimum enerjiyi hesaplar.
            </p>
        </div>
    </div>
    <?php
}
