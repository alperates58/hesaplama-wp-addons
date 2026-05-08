<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisa_calisma_odenegi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kisa-calisma',
        HC_PLUGIN_URL . 'modules/kisa-calisma-odenegi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kisa-calisma-css',
        HC_PLUGIN_URL . 'modules/kisa-calisma-odenegi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kisa-calisma-odenegi-hesaplama">
        <h3>Kısa Çalışma Ödeneği Hesaplama (2026)</h3>
        
        <div class="hc-form-group">
            <label for="hc-kc-salary">Son 12 Aylık Ortalama Brüt Maaş (TL)</label>
            <input type="number" id="hc-kc-salary" placeholder="Aylık Ortalama Brüt">
        </div>

        <div class="hc-form-group">
            <label for="hc-kc-reduction">Çalışma Süresindeki Azalma Oranı</label>
            <select id="hc-kc-reduction">
                <option value="1">Tamamen Durdurma (3/3)</option>
                <option value="0.66">2/3 Oranında Azaltma</option>
                <option value="0.33">1/3 Oranında Azaltma</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcKisaCalismaHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-kisa-calisma-result">
            <div class="hc-result-item">
                <span>Hesaplanan Ödenek (%60):</span>
                <strong id="hc-kc-res-raw">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Tavan Sınırı (Min. Ücret x 1.5):</span>
                <strong>49.545,00 ₺</strong>
            </div>
            <div class="hc-result-value" id="hc-kc-res-final">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Aylık Net Kısa Çalışma Ödeneği</p>
        </div>
    </div>
    <?php
}
