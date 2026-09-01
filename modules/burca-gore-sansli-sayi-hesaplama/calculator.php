<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burca_gore_sansli_sayi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-sansli-sayi',
        HC_PLUGIN_URL . 'modules/burca-gore-sansli-sayi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-sansli-sayi-css',
        HC_PLUGIN_URL . 'modules/burca-gore-sansli-sayi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-sansli-sayi">
        <div class="hc-header">
            <h3>Burca Göre Şanslı Sayı ve Numerolojik Titreşim Hesaplama</h3>
            <p class="hc-subtitle">Doğum tarihinizi girerek veya burcunuzu seçerek yönetici gezegeninizin titreşimine uyan şanslı sayılarınızı, üstat sayılarınızı ve şanslı ay günlerinizi keşfedin.</p>
        </div>

        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-ss-date">Doğum Tarihi *</label>
                <input type="date" id="hc-ss-date" value="1995-05-15" class="hc-input" onchange="hcSsSyncDateToSign()">
            </div>
            <div class="hc-form-group">
                <label for="hc-ss-sign">Veya Burcunuzu Seçin</label>
                <select id="hc-ss-sign" class="hc-input">
                    <option value="koc">♈ Koç (1, 9, 10, 19, 28)</option>
                    <option value="boga" selected>♉ Boğa (4, 6, 15, 24, 33)</option>
                    <option value="ikizler">♊ İkizler (3, 5, 14, 23, 32)</option>
                    <option value="yengec">♋ Yengeç (2, 7, 11, 20, 29)</option>
                    <option value="aslan">♌ Aslan (1, 4, 10, 13, 19)</option>
                    <option value="basak">♍ Başak (5, 8, 14, 23, 32)</option>
                    <option value="terazi">♎ Terazi (6, 9, 15, 24, 33)</option>
                    <option value="akrep">♏ Akrep (4, 9, 13, 22, 31)</option>
                    <option value="yay">♐ Yay (3, 7, 12, 21, 30)</option>
                    <option value="oglak">♑ Oğlak (4, 8, 17, 26, 35)</option>
                    <option value="kova">♒ Kova (4, 8, 13, 22, 31)</option>
                    <option value="balik">♓ Balık (3, 7, 11, 25, 29)</option>
                </select>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcBurcSansliSayiHesapla()">🔢 Şanslı Sayılarımı Hesapla</button>

        <div class="hc-result" id="hc-ss-result">
            <div class="hc-ss-hero" id="hc-ss-hero"></div>

            <div class="hc-ss-section">
                <h4 class="hc-ss-sec-title">🔢 Uğurlu Sayı Titreşimleri & Şanslı Ay Günleri</h4>
                <div class="hc-ss-badges" id="hc-ss-badges"></div>
            </div>

            <div class="hc-ss-section">
                <h4 class="hc-ss-sec-title">📖 Numerolojik Rezonans ve Kullanım Rehberi</h4>
                <div class="hc-result-content" id="hc-ss-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
