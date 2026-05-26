<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_velayet_nafaka_guncelleme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-velayet-nafaka-guncelleme',
        HC_PLUGIN_URL . 'modules/velayet-nafaka-guncelleme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-velayet-nafaka-guncelleme-css',
        HC_PLUGIN_URL . 'modules/velayet-nafaka-guncelleme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-velayet-nafaka-guncelleme-hesaplama">
        <h3>Velayet / Nafaka Güncelleme Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-vng-tutar">Karar Verilen / Mevcut Ödenen Nafaka Tutarı (₺)</label>
            <input type="number" id="hc-vng-tutar" placeholder="Örn: 5000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-vng-yil">Nafakanın Belirlendiği veya Son Güncellendiği Yıl</label>
            <select id="hc-vng-yil">
                <option value="2025">2025 Yılı</option>
                <option value="2024">2024 Yılı</option>
                <option value="2023">2023 Yılı</option>
                <option value="2022">2022 Yılı</option>
                <option value="2021">2021 Yılı</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-vng-hedef">Güncelleneceği Yıl (Hedef)</label>
            <select id="hc-vng-hedef">
                <option value="2026">2026 Yılı (Güncel - Enflasyon Projeksiyonlu)</option>
                <option value="2025">2025 Yılı</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-vng-ozel-oran">Özel Artış Oranı (%) (Boş bırakılırsa yasal yıllık ortalama TÜFE uygulanır)</label>
            <input type="number" id="hc-vng-ozel-oran" placeholder="Örn: 30" min="0">
        </div>
        <button class="hc-btn" onclick="hcVelayetNafakaGuncellemeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-vng-result">
            <h4>Nafaka Güncelleme Sonuçları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Eski Nafaka Tutarı</td>
                        <td id="hc-vng-res-eski">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Uygulanan Birleşik Enflasyon/Artış Oranı</td>
                        <td id="hc-vng-res-oran">%0</td>
                    </tr>
                    <tr>
                        <td>Artış Miktarı</td>
                        <td id="hc-vng-res-artis" style="color:var(--hc-front-green);">+0 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Yeni Güncel Nafaka Tutarı</td>
                        <td id="hc-vng-res-yeni">0 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}