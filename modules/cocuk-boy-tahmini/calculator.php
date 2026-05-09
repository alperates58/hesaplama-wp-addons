<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cocuk_boy_tahmini( $atts ) {
    wp_enqueue_script(
        'hc-cocuk-boy-tahmini',
        HC_PLUGIN_URL . 'modules/cocuk-boy-tahmini/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cocuk-boy-tahmini-css',
        HC_PLUGIN_URL . 'modules/cocuk-boy-tahmini/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cocuk-boy-tahmini">
        <h3>Çocuk Boy Tahmini (Hedef Boy)</h3>
        
        <div class="hc-form-group">
            <label for="hc-cbt-cinsiyet">Çocuğun Cinsiyeti</label>
            <select id="hc-cbt-cinsiyet">
                <option value="erkek">Erkek</option>
                <option value="kadin">Kız</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-cbt-anne">Annenin Boyu (cm)</label>
            <input type="number" id="hc-cbt-anne" placeholder="Örn: 165" min="100" max="250">
        </div>

        <div class="hc-form-group">
            <label for="hc-cbt-baba">Babanın Boyu (cm)</label>
            <input type="number" id="hc-cbt-baba" placeholder="Örn: 180" min="100" max="250">
        </div>
        
        <button class="hc-btn" onclick="hcCocukBoyTahminiHesapla()">Tahmin Et</button>
        
        <div class="hc-result" id="hc-cocuk-boy-tahmini-result">
            <div style="text-align: center;">
                <span style="display: block; font-size: 14px; color: var(--hc-front-muted);">Tahmini Hedef Boy</span>
                <span class="hc-result-value" id="hc-cbt-res-boy">0 cm</span>
            </div>
            
            <div id="hc-cbt-res-aralik" style="margin-top: 15px; text-align: center; font-size: 15px; color: var(--hc-front-text); font-weight: 600;">
            </div>

            <div style="margin-top: 20px; padding: 15px; background: rgba(21, 94, 239, 0.05); border-radius: 12px; font-size: 13px; line-height: 1.5;">
                <strong>Hesaplama Yöntemi:</strong><br>
                Bu hesaplama "Anne-Baba Boyu Ortalaması" yöntemini (Mid-Parental Height) kullanır. Sonuç yaklaşık ±5 cm sapma gösterebilir. Çocuğun beslenmesi, spor alışkanlıkları ve genel sağlık durumu nihai boyu etkileyen diğer faktörlerdir.
            </div>
        </div>
    </div>
    <?php
}
