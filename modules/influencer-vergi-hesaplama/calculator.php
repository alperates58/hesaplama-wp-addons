<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_influencer_vergi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-influencer-vergi-hesaplama',
        HC_PLUGIN_URL . 'modules/influencer-vergi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-influencer-vergi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/influencer-vergi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-influencer-vergi-hesaplama">
        <h3>Influencer Vergi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-inf-income">Toplam Yıllık Kazanç (TL)</label>
            <input type="number" id="hc-inf-income" placeholder="Örn: 500000">
            <small>Sosyal medya platformlarından gelen toplam brüt tutar.</small>
        </div>
        
        <button class="hc-btn" onclick="hcInfluencerVergiHesapla()">Vergi Hesapla</button>
        
        <div class="hc-result" id="hc-influencer-result">
            <div class="hc-result-item">
                <span>Vergi Durumu:</span>
                <strong id="hc-inf-status">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Banka Kesintisi (%15):</span>
                <strong id="hc-inf-stopaj">-</strong>
            </div>
            <div class="hc-result-item" id="hc-inf-extra-tax-row" style="display:none;">
                <span>Ek Gelir Vergisi:</span>
                <strong id="hc-inf-extra-tax">-</strong>
            </div>
            <div class="hc-result-value" id="hc-inf-net">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Net Kalan (Elinize Geçecek Tutar)</p>
        </div>
    </div>
    <?php
}
