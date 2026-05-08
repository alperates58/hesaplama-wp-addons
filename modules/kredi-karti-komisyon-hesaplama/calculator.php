<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kredi_karti_komisyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kredi-karti-komisyon-hesaplama',
        HC_PLUGIN_URL . 'modules/kredi-karti-komisyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kredi-karti-komisyon-css',
        HC_PLUGIN_URL . 'modules/kredi-karti-komisyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kredi-karti-komisyon-hesaplama">
        <h3>Kredi Kartı Komisyon Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-kk-price">Peşin Fiyat (TL)</label>
            <input type="number" id="hc-kk-price" placeholder="Örn: 1200">
        </div>

        <div class="hc-form-group">
            <label for="hc-kk-inst">Taksit Sayısı</label>
            <select id="hc-kk-inst">
                <option value="1">Tek Çekim</option>
                <option value="3">3 Taksit</option>
                <option value="6">6 Taksit</option>
                <option value="9">9 Taksit</option>
                <option value="12">12 Taksit</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-kk-rate">Vade Farkı / Komisyon Oranı (%)</label>
            <input type="number" id="hc-kk-rate" step="0.01" value="0">
            <small>Banka veya mağazanın uyguladığı vade farkı oranı.</small>
        </div>
        
        <button class="hc-btn" onclick="hcKKHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-kk-result">
            <div class="hc-result-item">
                <span>Vade Farkı Tutarı:</span>
                <strong id="hc-kk-res-kom">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Taksit Tutarı:</span>
                <strong id="hc-kk-res-monthly">-</strong>
            </div>
            <div class="hc-result-value" id="hc-kk-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam Geri Ödeme (TL)</p>
        </div>
    </div>
    <?php
}
