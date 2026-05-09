<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yalitim_enerji_tasarrufu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-insulation-calc',
        HC_PLUGIN_URL . 'modules/yalitim-enerji-tasarrufu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-insulation-calc-css',
        HC_PLUGIN_URL . 'modules/yalitim-enerji-tasarrufu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-insulation-calc">
        <h3>Yalıtım Tasarruf Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-it-bill">Mevcut Aylık Isınma Faturası (₺)</label>
            <input type="number" id="hc-it-bill" placeholder="Örn: 2500" step="10">
            <small>Kış aylarındaki ortalama fatura tutarınız.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-it-type">Yalıtım Kapsamı</label>
            <select id="hc-it-type">
                <option value="40" selected>Dış Cephe Mantolama (%40-50 Tasarruf)</option>
                <option value="20">Sadece Çatı Yalıtımı (%20-25 Tasarruf)</option>
                <option value="15">Sadece Pencere Değişimi (%15-20 Tasarruf)</option>
                <option value="55">Tam Yalıtım - Komple (%50-60 Tasarruf)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcYalitimHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-it-result">
            <div class="hc-result-item">
                <span>Tahmini Aylık Tasarruf:</span>
                <span class="hc-result-value highlight" id="hc-res-it-monthly">-</span>
            </div>
            <div class="hc-result-item">
                <span>Yeni Aylık Faturanız:</span>
                <span class="hc-result-value" id="hc-res-it-new">-</span>
            </div>
            <div class="hc-result-note">
                * Yalıtım, ısıl kayıpları azaltarak konforu artırır ve faturaları düşürür.
            </div>
        </div>
    </div>
    <?php
}
