<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kira_depozito_faizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kira-depozito-faizi',
        HC_PLUGIN_URL . 'modules/kira-depozito-faizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kira-depozito-faizi-css',
        HC_PLUGIN_URL . 'modules/kira-depozito-faizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kira-depozito-faizi-hesaplama">
        <h3>Kira Depozito Faizi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kdf-tutar">Depozito Tutarı (₺)</label>
            <input type="number" id="hc-kdf-tutar" placeholder="Örn: 20000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-kdf-giris">Depozito Yatırılma Tarihi</label>
            <input type="date" id="hc-kdf-giris">
        </div>
        <div class="hc-form-group">
            <label for="hc-kdf-cikis">Depozitodan Çıkış / Hesaplama Tarihi</label>
            <input type="date" id="hc-kdf-cikis">
        </div>
        <div class="hc-form-group">
            <label for="hc-kdf-faiz">Bankanın Yıllık Ortalama Vadeli Mevduat Faiz Oranı (%)</label>
            <input type="number" id="hc-kdf-faiz" placeholder="Örn: 45" min="0" value="45">
        </div>
        <button class="hc-btn" onclick="hcDepozitoFaiziHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kdf-result">
            <h4>Depozito Faiz Hesap Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Yatırılan Anapara</td>
                        <td id="hc-kdf-res-anapara">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Faizde Kalan Gün Sayısı</td>
                        <td id="hc-kdf-res-gun">0 Gün</td>
                    </tr>
                    <tr>
                        <td>Net Faiz Getirisi (%5 Gelir Vergisi Düşülmüş)</td>
                        <td id="hc-kdf-res-faiz" style="color:var(--hc-front-green); font-weight:bold;">0 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Toplam İade Edilecek Tutar (Anapara + Faiz)</td>
                        <td id="hc-kdf-res-toplam">0 ₺</td>
                    </tr>
                </tbody>
            </table>
            <div style="margin-top:14px; padding:10px; background:#f8fafc; border-radius:8px; font-size:12px; color:#475569; line-height:1.4;">
                * Yasal Bilgi: Türk Borçlar Kanunu m.342 uyarınca, kiracı depozitoyu nakit olarak verirse para bankada açılacak vadeli tasarruf hesabına yatırılır. Banka, depozitoyu ancak her iki tarafın rızasıyla ya da kesinleşmiş icra takibi/mahkeme kararı ile iade edebilir. Getirilen faiz kiracıya aittir.
            </div>
        </div>
    </div>
    <?php
}