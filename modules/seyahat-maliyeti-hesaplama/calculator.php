<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_seyahat_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-seyahat-maliyeti-hesaplama',
        HC_PLUGIN_URL . 'modules/seyahat-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-seyahat-maliyeti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/seyahat-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-seyahat-maliyeti-hesaplama">
        <div class="hc-header">
            <h3>Seyahat Maliyeti Hesaplama</h3>
            <p>Yolculuğunuzun yakıt ve ek masraflarını hesaplayarak kişi başı maliyeti öğrenin.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label for="hc-mesafe">Toplam Mesafe (km)</label>
                <input type="number" id="hc-mesafe" placeholder="Örn: 450" min="1">
            </div>

            <div class="hc-form-group">
                <label for="hc-tuketim">Ort. Tüketim (L/100km)</label>
                <input type="number" id="hc-tuketim" placeholder="Örn: 6.5" step="0.1" min="0.1">
            </div>

            <div class="hc-form-group">
                <label for="hc-yakit-tipi">Yakıt Tipi</label>
                <select id="hc-yakit-tipi" onchange="hcGuncelleYakitFiyati()">
                    <option value="65.40">Benzin (~65.40 ₺)</option>
                    <option value="72.80">Motorin (~72.80 ₺)</option>
                    <option value="33.80">LPG (~33.80 ₺)</option>
                    <option value="custom">Özel Fiyat Gir</option>
                </select>
            </div>

            <div class="hc-form-group" id="hc-custom-price-group" style="display:none;">
                <label for="hc-yakit-fiyat">Litre Fiyatı (₺)</label>
                <input type="number" id="hc-yakit-fiyat" placeholder="Örn: 65.50" step="0.01">
            </div>

            <div class="hc-form-group">
                <label for="hc-kisi">Kişi Sayısı</label>
                <input type="number" id="hc-kisi" value="1" min="1">
            </div>

            <div class="hc-form-group full-width">
                <label for="hc-ek-masraf">Ek Masraflar (Otoyol, Yemek vb. - ₺)</label>
                <input type="number" id="hc-ek-masraf" placeholder="Örn: 250" min="0">
            </div>
        </div>

        <button class="hc-btn" onclick="hcSeyahatHesapla()">
            <span>Maliyeti Hesapla</span>
            <svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M12,2L4.5,20.29L5.21,21L12,18L18.79,21L19.5,20.29L12,2Z"/></svg>
        </button>

        <div class="hc-result" id="hc-seyahat-result">
            <div class="hc-result-header">Yolculuk Özeti</div>
            
            <div class="hc-main-cost">
                <small>Toplam Maliyet</small>
                <strong id="hc-res-total">0,00 ₺</strong>
            </div>

            <div class="hc-sub-costs">
                <div class="hc-cost-item">
                    <span>Kişi Başı:</span>
                    <strong id="hc-res-per-person">0,00 ₺</strong>
                </div>
                <div class="hc-cost-item">
                    <span>Yakıt Tutarı:</span>
                    <strong id="hc-res-fuel">0,00 ₺</strong>
                </div>
                <div class="hc-cost-item">
                    <span>Gereken Yakıt:</span>
                    <strong id="hc-res-liters">0.00 L</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
