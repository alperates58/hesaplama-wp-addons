<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bahce_sulama_su_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bahce-sulama',
        HC_PLUGIN_URL . 'modules/bahce-sulama-su-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bahce-sulama-css',
        HC_PLUGIN_URL . 'modules/bahce-sulama-su-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bahce-sulama">
        <h3>Bahçe Sulama Su Tüketimi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-irr-method">Sulama Yöntemi</label>
            <select id="hc-irr-method">
                <option value="hose">Hortumla Sulama (Standart Başlık)</option>
                <option value="sprinkler">Fıskiye Sistemi</option>
                <option value="drip">Damlama Sulama (Metre Başına)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-irr-size">Alan / Uzunluk</label>
            <input type="number" id="hc-irr-size" placeholder="m² veya Metre" min="1" value="100">
            <small id="hc-irr-size-hint">m² (Hortum/Fıskiye için) veya Metre (Damlama için)</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-irr-duration">Haftalık Sulama Süresi (Dakika)</label>
            <input type="number" id="hc-irr-duration" placeholder="Örn: 60" min="1" value="60">
        </div>
        <button class="hc-btn" onclick="hcBahceSulamaHesapla()">Tüketimi Hesapla</button>
        <div class="hc-result" id="hc-bahce-sulama-result">
            <div class="hc-result-item">
                <span>Haftalık Su Tüketimi:</span>
                <span class="hc-result-value" id="hc-res-weekly-water">0 Litre</span>
            </div>
            <div class="hc-result-item">
                <span>Yıllık Tahmini (Sulama Sezonu):</span>
                <span id="hc-res-yearly-water">0 m³</span>
            </div>
            <div class="hc-res-tip">
                <strong>💡 Tasarruf İpucu:</strong> Damlama sulama sistemi kullanarak hortumla sulamaya göre %70'e kadar su tasarrufu sağlayabilirsiniz.
            </div>
        </div>
    </div>
    <?php
}
