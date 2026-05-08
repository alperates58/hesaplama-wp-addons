<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_acil_durum_fonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-efund',
        HC_PLUGIN_URL . 'modules/acil-durum-fonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-efund-css',
        HC_PLUGIN_URL . 'modules/acil-durum-fonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-efund">
        <h3>Acil Durum Fonu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ef-expense">Aylık Zorunlu Giderler (TL)</label>
            <input type="number" id="hc-ef-expense" placeholder="Kira, fatura, mutfak toplamı">
        </div>

        <div class="hc-form-group">
            <label for="hc-ef-months">Kaç Ay Güvence Altına Alınsın?</label>
            <select id="hc-ef-months">
                <option value="3">3 Ay (Minimum Güvenlik)</option>
                <option value="6" selected>6 Ay (Standart Güvenlik)</option>
                <option value="12">12 Ay (Tam Güvenlik)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcAcilDurumHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-efund-result">
            <div class="hc-result-value" id="hc-ef-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Kenara Ayrılması Gereken Toplam Tutar</p>
        </div>
    </div>
    <?php
}
