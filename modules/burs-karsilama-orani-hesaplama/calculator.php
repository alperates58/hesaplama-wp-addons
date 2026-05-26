<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burs_karsilama_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-scholarship-cov',
        HC_PLUGIN_URL . 'modules/burs-karsilama-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-scholarship-cov-css',
        HC_PLUGIN_URL . 'modules/burs-karsilama-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burs-karsilama-orani-hesaplama">
        <h3>Burs Karşılama Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bko-gider">Aylık Toplam Gideriniz (Eğitim + Yaşam - ₺)</label>
            <input type="number" id="hc-bko-gider" placeholder="Örn: 30000" min="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-bko-burs">Aylık Aldığınız Burs Tutarı (₺)</label>
            <input type="number" id="hc-bko-burs" placeholder="Örn: 15000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-bko-is">Aylık Part-time / Ek İş Geliriniz (₺)</label>
            <input type="number" id="hc-bko-is" placeholder="Örn: 10000" min="0">
        </div>
        <button class="hc-btn" onclick="hcBkoHesapla()">Karşılama Oranını Gör</button>
        
        <div class="hc-result" id="hc-bko-result">
            <h4>Bütçe Dengesi Analizi:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam Gelir Karşılama Oranı</td>
                        <td id="hc-bko-res-oran">%0.0</td>
                    </tr>
                    <tr>
                        <td>Aylık Toplam Ek Geliriniz</td>
                        <td id="hc-bko-res-gelir">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Bütçe Durumu (Açık / Fazla)</td>
                        <td id="hc-bko-res-fark" style="font-weight:bold;">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}