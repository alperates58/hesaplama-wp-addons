<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kasko_deger_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kasko-ratio',
        HC_PLUGIN_URL . 'modules/kasko-deger-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kasko-ratio-css',
        HC_PLUGIN_URL . 'modules/kasko-deger-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kasko-deger-orani-hesaplama">
        <h3>Kasko Değer Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kdo-deger">Araç Kasko Değeri (₺)</label>
            <input type="number" id="hc-kdo-deger" placeholder="Örn: 850000" min="10000">
        </div>
        <div class="hc-form-group">
            <label for="hc-kdo-prim">Size Sunulan Kasko Teklif Primi (₺)</label>
            <input type="number" id="hc-kdo-prim" placeholder="Örn: 18000" min="500">
        </div>
        <div class="hc-form-group">
            <label for="hc-kdo-hasarsizlik">Hasarsızlık Kademesi</label>
            <select id="hc-kdo-hasarsizlik">
                <option value="1.0">4. Basamak (%0 indirim / Yeni Giriş)</option>
                <option value="0.7">5. Basamak (%30 hasarsızlık indirimi)</option>
                <option value="0.6">6. Basamak (%40 hasarsızlık indirimi)</option>
                <option value="0.5" selected>7. Basamak (%50 hasarsızlık indirimi - Hasarsız)</option>
                <option value="1.1">3. Basamak (%10 hasar sürprimi)</option>
                <option value="1.2">2. Basamak (%20 hasar sürprimi)</option>
                <option value="1.3">1. Basamak (%30 hasar sürprimi - Çok hasarlı)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKaskoOranHesapla()">Kasko Oranını Analiz Et</button>
        
        <div class="hc-result" id="hc-kdo-result">
            <h4>Kasko Analiz Sonucu:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Kasko Prim Oranı</td>
                        <td id="hc-kdo-res-oran">%0.00</td>
                    </tr>
                    <tr>
                        <td>Teklif Değerlendirmesi</td>
                        <td id="hc-kdo-res-degerlendirme">Hesaplanıyor...</td>
                    </tr>
                    <tr>
                        <td>Hasarsızlık İndirimi Etkisi</td>
                        <td id="hc-kdo-res-indirim">Etki Yok</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}