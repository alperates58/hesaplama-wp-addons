<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hibrit_calisma_maliyet_karsilastirma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hybrid-karsilastirma',
        HC_PLUGIN_URL . 'modules/hibrit-calisma-maliyet-karsilastirma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hybrid-karsilastirma-css',
        HC_PLUGIN_URL . 'modules/hibrit-calisma-maliyet-karsilastirma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hibrit-calisma-maliyet-karsilastirma-hesaplama">
        <h3>Hibrit Çalışma Maliyet Karşılaştırma Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hcm-ofis-gun">Haftada Kaç Gün Ofise Gidiyorsunuz?</label>
            <input type="number" id="hc-hcm-ofis-gun" placeholder="Örn: 2" step="1" min="0" max="7" value="2">
        </div>
        <div class="hc-form-group">
            <label for="hc-hcm-yol">Günlük Yol / Ulaşım Gideriniz (₺)</label>
            <input type="number" id="hc-hcm-yol" placeholder="Örn: 150" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-hcm-yemek">Günlük Dışarıda Yemek Gideriniz (₺)</label>
            <input type="number" id="hc-hcm-yemek" placeholder="Örn: 200" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-hcm-ev-ek">Evden Çalıştığınız Her Gün İçin Ek Fatura Maliyeti (₺)</label>
            <input type="number" id="hc-hcm-ev-ek" placeholder="Örn: 50" step="any" min="0" value="50">
        </div>
        <button class="hc-btn" onclick="hcHybridMaliyetHesapla()">Maliyetleri Karşılaştır</button>
        <div class="hc-result" id="hc-hcm-result">
            <h4>Maliyet Karşılaştırma Analizi (Aylık):</h4>
            <table>
                <thead>
                    <tr>
                        <th>Gider Türü</th>
                        <th>Tam Zamanlı Ofis</th>
                        <th>Hibrit Düzen</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Aylık Ulaşım Maliyeti</td>
                        <td id="hc-hcm-res-yol-ofis">0.00 ₺</td>
                        <td id="hc-hcm-res-yol-hibrit">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Aylık Dışarıda Yemek</td>
                        <td id="hc-hcm-res-yemek-ofis">0.00 ₺</td>
                        <td id="hc-hcm-res-yemek-hibrit">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Aylık Ev Faturaları Artışı</td>
                        <td>0.00 ₺</td>
                        <td id="hc-hcm-res-fatura-hibrit">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold;">
                        <td>Toplam Aylık Maliyet</td>
                        <td id="hc-hcm-res-toplam-ofis" style="color:var(--hc-front-red);">0.00 ₺</td>
                        <td id="hc-hcm-res-toplam-hibrit" style="color:var(--hc-front-blue-dark);">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td colspan="2">Aylık Hibrit Tasarrufunuz</td>
                        <td id="hc-hcm-res-tasarruf">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}