<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_temizlik_hizmeti_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cleaning-cost',
        HC_PLUGIN_URL . 'modules/temizlik-hizmeti-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cleaning-cost-css',
        HC_PLUGIN_URL . 'modules/temizlik-hizmeti-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cleaning-cost">
        <h3>Temizlik Hizmeti Tahmini</h3>
        <div class="hc-form-group">
            <label for="hc-clean-house">Ev Tipi</label>
            <select id="hc-clean-house">
                <option value="1">1+1 Daire</option>
                <option value="2">2+1 Daire</option>
                <option value="3" selected>3+1 Daire</option>
                <option value="4">4+1 veya Dubleks</option>
                <option value="5">Villa / Büyük Konut</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Ek Hizmetler</label>
            <div class="hc-check-group">
                <input type="checkbox" id="hc-clean-window"> <label for="hc-clean-window">Cam Temizliği (+250 ₺)</label>
            </div>
            <div class="hc-check-group">
                <input type="checkbox" id="hc-clean-balcony"> <label for="hc-clean-balcony">Balkon Yıkama (+150 ₺)</label>
            </div>
            <div class="hc-check-group">
                <input type="checkbox" id="hc-clean-oven"> <label for="hc-clean-oven">Fırın/Buzdolabı İçi (+100 ₺)</label>
            </div>
        </div>
        <button class="hc-btn" onclick="hcCleaningCostHesapla()">Tahmini Al</button>
        <div class="hc-result" id="hc-cleaning-cost-result">
            <div class="hc-result-item">
                <span>Tahmini Maliyet:</span>
                <span class="hc-result-value" id="hc-res-clean-total">0 TL</span>
            </div>
            <p class="hc-clean-note">Fiyatlar 2026 piyasa ortalamalarına göre tahmin edilmiştir.</p>
        </div>
    </div>
    <?php
}
