<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_alkol_birimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-alkol-birimi-hesaplama',
        HC_PLUGIN_URL . 'modules/alkol-birimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-alkol-birimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/alkol-birimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-alkol-birimi-hesaplama">
        <h3>Alkol Birimi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-abh-hacim">İçecek Miktarı (ml)</label>
            <input type="number" id="hc-abh-hacim" placeholder="Örn: 500" min="1">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-abh-oran">Alkol Oranı (%)</label>
            <input type="number" id="hc-abh-oran" placeholder="Örn: 5" min="0" max="100" step="0.1">
        </div>

        <div style="margin-bottom: 15px; font-size: 13px; color: var(--hc-front-muted);">
            Yaygın oranlar: Bira (~%5), Şarap (~%12), Rakı/Votka/Viski (~%40-45)
        </div>
        
        <button class="hc-btn" onclick="hcAlkolBirimiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-alkol-birimi-hesaplama-result">
            <div style="text-align: center;">
                <span style="display: block; font-size: 14px; color: var(--hc-front-muted);">Toplam Alkol Birimi</span>
                <span class="hc-result-value" id="hc-abh-res-birim">0 Birim</span>
            </div>
            
            <div style="margin-top: 20px; padding: 15px; background: rgba(21, 94, 239, 0.05); border-radius: 12px; font-size: 13px; line-height: 1.5;">
                <strong>Alkol Birimi Nedir?</strong><br>
                Bir alkol birimi, 10 ml (8 gram) saf alkole eşittir. Bu hesaplama, farklı içeceklerin vücut üzerindeki etkisini karşılaştırmak için kullanılır.
            </div>
        </div>
    </div>
    <?php
}
