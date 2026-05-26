<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uzaktan_calisma_yillik_tasarrufu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-remote-tasarruf',
        HC_PLUGIN_URL . 'modules/uzaktan-calisma-yillik-tasarrufu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-remote-tasarruf-css',
        HC_PLUGIN_URL . 'modules/uzaktan-calisma-yillik-tasarrufu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-uzaktan-calisma-yillik-tasarrufu-hesaplama">
        <h3>Uzaktan Çalışma Yıllık Tasarrufu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-uct-yol">Günlük Yol / Ulaşım Gideri (Yakıt, toplu taşıma, otopark vb.) (₺)</label>
            <input type="number" id="hc-uct-yol" placeholder="Örn: 150" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-uct-yemek">Günlük Dışarıda Yemek Gideri (₺)</label>
            <input type="number" id="hc-uct-yemek" placeholder="Örn: 200" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-uct-kahve">Günlük Kahve, Atıştırmalık vb. Giderler (₺)</label>
            <input type="number" id="hc-uct-kahve" placeholder="Örn: 80" step="any" min="0" value="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-uct-giysi">Aylık İş Kıyafeti / Bakım Giderleri (₺)</label>
            <input type="number" id="hc-uct-giysi" placeholder="Örn: 1000" step="any" min="0" value="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-uct-gun">Haftada Kaç Gün Ofise Gidiyordunuz?</label>
            <input type="number" id="hc-uct-gun" placeholder="Örn: 5" step="1" min="1" max="7" value="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-uct-ek-ev">Uzaktan Çalışırken Evdeki Aylık Ek Gider Artışı (Elektrik, doğalgaz vb.) (₺)</label>
            <input type="number" id="hc-uct-ek-ev" placeholder="Örn: 1200" step="any" min="0" value="1200">
        </div>
        <button class="hc-btn" onclick="hcRemoteTasarrufHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-uct-result">
            <h4>Finansal Tasarruf Analizi (Yıllık):</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Eski Ulaşım ve Yol Gideri (Yıllık)</td>
                        <td id="hc-uct-res-yol" style="font-weight:bold;">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Eski Yemek ve İkram Gideri (Yıllık)</td>
                        <td id="hc-uct-res-yemek" style="font-weight:bold;">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Evdeki Ek Fatura Artışı (Yıllık)</td>
                        <td id="hc-uct-res-ev" style="font-weight:bold; color:var(--hc-front-red);">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Yıllık Net Finansal Tasarrufunuz</td>
                        <td id="hc-uct-res-toplam">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}