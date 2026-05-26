<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kira_tespit_davasi_kira_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kira-tespit-davasi',
        HC_PLUGIN_URL . 'modules/kira-tespit-davasi-kira-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kira-tespit-davasi-css',
        HC_PLUGIN_URL . 'modules/kira-tespit-davasi-kira-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kira-tespit-davasi-kira-hesaplama">
        <h3>Kira Tespit Davası Kira Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ktd-mevcut">Mevcut Kira Bedeli (₺)</label>
            <input type="number" id="hc-ktd-mevcut" placeholder="Örn: 12000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ktd-rayic">Bölgedeki Emsal Rayiç Bedel (Mevcut Piyasa Kirası) (₺)</label>
            <input type="number" id="hc-ktd-rayic" placeholder="Örn: 30000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ktd-sure">Kiracılık Süresi (Yıl)</label>
            <input type="number" id="hc-ktd-sure" placeholder="Örn: 6" min="1" value="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-ktd-indirim">Hakkaniyet İndirim Oranı (Eski Kiracı İndirimi)</label>
            <select id="hc-ktd-indirim">
                <option value="10">10% İndirim</option>
                <option value="15" selected>15% İndirim (Genel Uygulama)</option>
                <option value="20">20% İndirim</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKiraTespitDavasiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ktd-result">
            <div id="hc-ktd-uyari" style="display:none; margin-bottom:12px; padding:10px; background:#fffbeb; border:1px solid #fde68a; color:#b45309; border-radius:8px; font-size:13px;"></div>
            <h4>Mahkemece Tespit Edilebilecek Yeni Kira Bedeli:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Emsal Piyasa Bedeli</td>
                        <td id="hc-ktd-res-rayic">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Uygulanan Hakkaniyet İndirimi</td>
                        <td id="hc-ktd-res-indirim-tutari">0 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Öngörülen Mahkeme Kirası</td>
                        <td id="hc-ktd-res-yeni">0 ₺</td>
                    </tr>
                    <tr style="font-size:13px; color:#475569;">
                        <td>Mevcut Kiraya Göre Artış Oranı</td>
                        <td id="hc-ktd-res-oran">%0</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}