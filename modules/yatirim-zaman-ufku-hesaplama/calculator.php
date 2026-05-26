<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yatirim_zaman_ufku_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-time-horizon',
        HC_PLUGIN_URL . 'modules/yatirim-zaman-ufku-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-time-horizon-css',
        HC_PLUGIN_URL . 'modules/yatirim-zaman-ufku-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yatirim-zaman-ufku-hesaplama">
        <h3>Yatırım Zaman Ufku Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-yzu-hedef">Hedef Finansal Birikim Tutarı (₺ / Döviz)</label>
            <input type="number" id="hc-yzu-hedef" placeholder="Örn: 1000000" min="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-yzu-baslangic">Mevcut Başlangıç Birikimi (Kapital)</label>
            <input type="number" id="hc-yzu-baslangic" value="50000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-yzu-aylik">Aylık Düzenli İlave Edilecek Yatırım Tutarı</label>
            <input type="number" id="hc-yzu-aylik" value="5000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-yzu-getiri">Beklenen Yıllık Ortalama Getiri Oranı (%)</label>
            <input type="number" id="hc-yzu-getiri" value="15" min="0.1" max="100">
        </div>
        <button class="hc-btn" onclick="hcZamanUfkuHesapla()">Gerekli Süreyi Hesapla</button>
        
        <div class="hc-result" id="hc-yzu-result">
            <h4>Zaman Ufku Analiz Sonuçları:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Hedefe Ulaşma Süresi</td>
                        <td id="hc-yzu-res-sure">-</td>
                    </tr>
                    <tr>
                        <td>Cebinizden Çıkan Toplam Para</td>
                        <td id="hc-yzu-res-ana-para">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Kazanılan Toplam Getiri (Bileşik Etki)</td>
                        <td id="hc-yzu-res-nemalandirma">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}