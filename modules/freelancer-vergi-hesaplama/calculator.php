<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_freelancer_vergi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-freelancer-vergi-hesaplama',
        HC_PLUGIN_URL . 'modules/freelancer-vergi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-freelancer-vergi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/freelancer-vergi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-freelancer-vergi-hesaplama">
        <h3>Freelancer Vergi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-income">Brüt Aylık Gelir (TL)</label>
            <input type="number" id="hc-income" placeholder="Örn: 50000">
        </div>
        
        <div class="hc-form-group">
            <label for="hc-expenses">Aylık İş Giderleri (TL)</label>
            <input type="number" id="hc-expenses" placeholder="Örn: 5000">
        </div>

        <div class="hc-form-group">
            <label for="hc-abroad">Hizmet İhracatı (Yurt Dışına Satış)</label>
            <select id="hc-abroad">
                <option value="no">Hayır</option>
                <option value="yes">Evet (%80 Kazanç İstisnası)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-kdv-rate">KDV Oranı (%)</label>
            <select id="hc-kdv-rate">
                <option value="20">%20 (Standart)</option>
                <option value="10">%10</option>
                <option value="0">%0 (Muaf)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcFreelancerVergiHesapla()">Vergi Hesapla</button>
        
        <div class="hc-result" id="hc-freelancer-result">
            <div class="hc-result-item">
                <span>Ödenecek KDV:</span>
                <strong id="hc-res-kdv">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Gelir Vergisi (Yıllık Tahmini):</span>
                <strong id="hc-res-income-tax">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Vergi Yükü:</span>
                <strong id="hc-res-total-tax">-</strong>
            </div>
            <div class="hc-result-value" id="hc-res-net">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Net Kalan (Vergiler Sonrası)</p>
        </div>
    </div>
    <?php
}
