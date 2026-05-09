<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kandaki_alkol_orani( $atts ) {
    wp_enqueue_script(
        'hc-kandaki-alkol-orani',
        HC_PLUGIN_URL . 'modules/kandaki-alkol-orani/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kandaki-alkol-orani-css',
        HC_PLUGIN_URL . 'modules/kandaki-alkol-orani/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kandaki-alkol-orani">
        <h3>Kandaki Alkol Oranı (BAC) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-kao-cinsiyet">Cinsiyet</label>
            <select id="hc-kao-cinsiyet">
                <option value="erkek">Erkek</option>
                <option value="kadin">Kadın</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-kao-kilo">Vücut Ağırlığı (kg)</label>
            <input type="number" id="hc-kao-kilo" placeholder="Örn: 75" min="30">
        </div>

        <div class="hc-form-group">
            <label for="hc-kao-miktar">Tüketilen Toplam Saf Alkol (gram)</label>
            <input type="number" id="hc-kao-miktar" placeholder="Örn: 20">
            <small style="display:block; margin-top:5px; color:var(--hc-front-muted);">
                1 Bira (500ml) ≈ 20g saf alkol<br>
                1 Kadeh Şarap (150ml) ≈ 14g saf alkol<br>
                1 Duble Rakı (80ml) ≈ 28g saf alkol
            </small>
        </div>

        <div class="hc-form-group">
            <label for="hc-kao-sure">Son İçkiden Sonra Geçen Süre (Saat)</label>
            <input type="number" id="hc-kao-sure" value="0" min="0" step="0.5">
        </div>
        
        <button class="hc-btn" onclick="hcBACHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-kandaki-alkol-orani-result">
            <div style="text-align: center;">
                <span style="display: block; font-size: 14px; color: var(--hc-front-muted);">Tahmini Alkol Oranı</span>
                <span class="hc-result-value" id="hc-kao-res-promil">0.00 Promil</span>
            </div>
            
            <div id="hc-kao-res-uyari" style="margin-top: 20px; padding: 15px; border-radius: 12px; font-size: 14px; text-align: center; font-weight: 600;">
            </div>

            <p style="font-size: 12px; color: var(--hc-front-muted); margin-top: 15px; font-style: italic;">
                * Bu hesaplama Widmark formülüne dayanan bilimsel bir tahmindir. Metabolizma hızı, mide doluluğu ve ilaç kullanımı gibi faktörler sonucu değiştirebilir. Kesinlikle direksiyon başına geçmeyiniz!
            </p>
        </div>
    </div>
    <?php
}
