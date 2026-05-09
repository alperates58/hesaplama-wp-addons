<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tasinma_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-moving-cost',
        HC_PLUGIN_URL . 'modules/tasinma-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-moving-cost-css',
        HC_PLUGIN_URL . 'modules/tasinma-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-moving-cost">
        <h3>Taşınma Maliyeti Tahmini</h3>
        <div class="hc-form-group">
            <label for="hc-move-house">Ev Büyüklüğü</label>
            <select id="hc-move-house">
                <option value="1">1+1 Daire</option>
                <option value="2" selected>2+1 Daire</option>
                <option value="3">3+1 Daire</option>
                <option value="4">4+1 veya Villa</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-move-dist">Mesafe (km)</label>
            <input type="number" id="hc-move-dist" value="10" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-move-floor">Kat Durumu (Varış)</label>
            <input type="number" id="hc-move-floor" value="1" min="0">
        </div>
        <div class="hc-check-group">
            <input type="checkbox" id="hc-move-lift"> <label for="hc-move-lift">Asansör Kurulumu İstiyorum (+1500 ₺)</label>
        </div>
        <button class="hc-btn" onclick="hcMovingCostHesapla()">Tahmin Al</button>
        <div class="hc-result" id="hc-moving-cost-result">
            <div class="hc-result-item">
                <span>Tahmini Maliyet:</span>
                <span class="hc-result-value" id="hc-res-move-total">0 TL</span>
            </div>
            <p class="hc-move-info">Bu fiyatlar 2026 şehir içi nakliye ortalamalarına göre hesaplanmıştır.</p>
        </div>
    </div>
    <?php
}
