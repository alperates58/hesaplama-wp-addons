<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tadilat_butcesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-reno-budget',
        HC_PLUGIN_URL . 'modules/tadilat-butcesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-reno-budget-css',
        HC_PLUGIN_URL . 'modules/tadilat-butcesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-reno-budget">
        <h3>Tadilat Bütçesi Tahmini</h3>
        <div class="hc-form-group">
            <label for="hc-reno-paint">Boya Alanı (m² - Duvar)</label>
            <input type="number" id="hc-reno-paint" placeholder="Örn: 200" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-reno-floor">Zemin Alanı (m² - Parke/Seramik)</label>
            <input type="number" id="hc-reno-floor" placeholder="Örn: 100" min="0">
        </div>
        <div class="hc-check-group">
            <input type="checkbox" id="hc-reno-kitchen"> <label for="hc-reno-kitchen">Mutfak Yenileme (+75.000 ₺)</label>
        </div>
        <div class="hc-check-group">
            <input type="checkbox" id="hc-reno-bath"> <label for="hc-reno-bath">Banyo Yenileme (+40.000 ₺)</label>
        </div>
        <button class="hc-btn" onclick="hcRenoBudgetHesapla()">Bütçe Çıkart</button>
        <div class="hc-result" id="hc-reno-budget-result">
            <div class="hc-result-item">
                <span>Tahmini Toplam Bütçe:</span>
                <span class="hc-result-value" id="hc-res-reno-total">0 TL</span>
            </div>
            <p class="hc-reno-note">Malzeme ve işçilik dahil 2026 ortalama fiyatlarıdır.</p>
        </div>
    </div>
    <?php
}
