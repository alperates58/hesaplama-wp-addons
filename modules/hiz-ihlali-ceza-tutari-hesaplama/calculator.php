<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hiz_ihlali_ceza_tutari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hiz-ihlali-ceza',
        HC_PLUGIN_URL . 'modules/hiz-ihlali-ceza-tutari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hiz-ihlali-ceza-css',
        HC_PLUGIN_URL . 'modules/hiz-ihlali-ceza-tutari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hiz-ihlali-ceza-tutari-hesaplama">
        <h3>Hız İhlali Ceza Tutarı Hesaplama (2026 Yeni Sistem)</h3>
        <div class="hc-form-group">
            <label for="hc-hic-yol">Yol Tipi</label>
            <select id="hc-hic-yol">
                <option value="ici">Yerleşim Yeri İçi (Şehir İçi Yollar)</option>
                <option value="disi">Yerleşim Yeri Dışı / Otoyol / Duble Yol</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-hic-limit">Yoldaki Hız Sınırı (km/s)</label>
            <input type="number" id="hc-hic-limit" placeholder="Örn: 50 veya 82 veya 120" min="20">
        </div>
        <div class="hc-form-group">
            <label for="hc-hic-hiz">Sizin Hızınız (km/s)</label>
            <input type="number" id="hc-hic-hiz" placeholder="Örn: 105" min="20">
        </div>
        <button class="hc-btn" onclick="hcHizIhlaliHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hic-result">
            <h4>Hız İhlali Yaptırım Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Hız Aşım Miktarı</td>
                        <td id="hc-hic-res-asim" style="font-weight:bold;">0 km/s</td>
                    </tr>
                    <tr>
                        <td>Ceza Tutarı</td>
                        <td id="hc-hic-res-tutar" style="color:var(--hc-front-red); font-weight:bold; font-size:18px;">0 ₺</td>
                    </tr>
                    <tr>
                        <td>%25 Erken Ödeme İndirimli Tutar</td>
                        <td id="hc-hic-res-indirimli" style="color:var(--hc-front-green); font-weight:bold;">0 ₺</td>
                    </tr>
                    <tr style="font-size:15px; font-weight:bold;">
                        <td>Ehliyete Geçici El Konulma Durumu</td>
                        <td id="hc-hic-res-ehliyet" style="color:var(--hc-front-blue-dark);">Risk Yok</td>
                    </tr>
                </tbody>
            </table>
            <div id="hc-hic-detay" style="margin-top:14px; padding:10px; background:#f8fafc; border-radius:8px; font-size:12px; color:#475569; line-height:1.4;"></div>
        </div>
    </div>
    <?php
}