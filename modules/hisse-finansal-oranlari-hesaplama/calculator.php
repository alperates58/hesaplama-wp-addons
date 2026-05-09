<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hisse_finansal_oranlari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stock-ratios',
        HC_PLUGIN_URL . 'modules/hisse-finansal-oranlari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stock-ratios-css',
        HC_PLUGIN_URL . 'modules/hisse-finansal-oranlari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stock-ratios">
        <h3>Hisse Finansal Oranları (Özet)</h3>
        
        <div class="hc-form-group">
            <label>Piyasa Verileri</label>
            <input type="number" id="hc-sr-price" step="0.01" placeholder="Hisse Fiyatı (TL)">
            <input type="number" id="hc-sr-shares" placeholder="Toplam Hisse Adedi">
        </div>

        <div class="hc-form-group">
            <label>Mali Veriler (Yıllık)</label>
            <input type="number" id="hc-sr-profit" placeholder="Net Kar (TL)">
            <input type="number" id="hc-sr-equity" placeholder="Özsermaye (TL)">
            <input type="number" id="hc-sr-ebitda" placeholder="FAVÖK (TL)">
            <input type="number" id="hc-sr-debt" placeholder="Net Borç (TL)">
        </div>
        
        <button class="hc-btn" onclick="hcStockRatiosHesapla()">Tümünü Hesapla</button>
        
        <div class="hc-result" id="hc-stock-ratios-result">
            <div class="hc-result-item">
                <span>Fiyat Kazanç (F/K):</span>
                <strong id="hc-sr-res-pe">-</strong>
            </div>
            <div class="hc-result-item">
                <span>PD / DD:</span>
                <strong id="hc-sr-res-pb">-</strong>
            </div>
            <div class="hc-result-item">
                <span>FD / FAVÖK:</span>
                <strong id="hc-sr-res-evebitda">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Hisse Başına Kar (EPS):</span>
                <strong id="hc-sr-res-eps">-</strong>
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666; margin-top: 15px;">Temel Değerleme Çarpanları</p>
        </div>
    </div>
    <?php
}
