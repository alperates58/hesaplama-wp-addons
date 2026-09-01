<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-uyumu',
        HC_PLUGIN_URL . 'modules/burc-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-uyumu-css',
        HC_PLUGIN_URL . 'modules/burc-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-uyumu-hesaplama">
        <div class="hc-header">
            <h3>Burç Uyumu Hesaplama</h3>
            <p class="hc-subtitle">Burçlarınızın element, nitelik ve zodyak açı ilişkisine göre aşk, iletişim, tutku ve evlilik uyumunu öğrenin.</p>
        </div>

        <div class="hc-form-grid-2">
            <div class="hc-form-group">
                <label for="hc-burc1">Sizin Burcunuz *</label>
                <select id="hc-burc1" class="hc-input">
                    <option value="Koç">♈ Koç (21 Mart - 19 Nisan)</option>
                    <option value="Boğa">♉ Boğa (20 Nisan - 20 Mayıs)</option>
                    <option value="İkizler">♊ İkizler (21 Mayıs - 20 Haziran)</option>
                    <option value="Yengeç">♋ Yengeç (21 Haziran - 22 Temmuz)</option>
                    <option value="Aslan" selected>♌ Aslan (23 Temmuz - 22 Ağustos)</option>
                    <option value="Başak">♍ Başak (23 Ağustos - 22 Eylül)</option>
                    <option value="Terazi">♎ Terazi (23 Eylül - 22 Ekim)</option>
                    <option value="Akrep">♏ Akrep (23 Ekim - 21 Kasım)</option>
                    <option value="Yay">♐ Yay (22 Kasım - 21 Aralık)</option>
                    <option value="Oğlak">♑ Oğlak (22 Aralık - 19 Ocak)</option>
                    <option value="Kova">♒ Kova (20 Ocak - 18 Şubat)</option>
                    <option value="Balık">♓ Balık (19 Şubat - 20 Mart)</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label for="hc-burc2">Partnerinizin Burcu *</label>
                <select id="hc-burc2" class="hc-input">
                    <option value="Koç">♈ Koç (21 Mart - 19 Nisan)</option>
                    <option value="Boğa">♉ Boğa (20 Nisan - 20 Mayıs)</option>
                    <option value="İkizler">♊ İkizler (21 Mayıs - 20 Haziran)</option>
                    <option value="Yengeç">♋ Yengeç (21 Haziran - 22 Temmuz)</option>
                    <option value="Aslan">♌ Aslan (23 Temmuz - 22 Ağustos)</option>
                    <option value="Başak">♍ Başak (23 Ağustos - 22 Eylül)</option>
                    <option value="Terazi" selected>♎ Terazi (23 Eylül - 22 Ekim)</option>
                    <option value="Akrep">♏ Akrep (23 Ekim - 21 Kasım)</option>
                    <option value="Yay">♐ Yay (22 Kasım - 21 Aralık)</option>
                    <option value="Oğlak">♑ Oğlak (22 Aralık - 19 Ocak)</option>
                    <option value="Kova">♒ Kova (20 Ocak - 18 Şubat)</option>
                    <option value="Balık">♓ Balık (19 Şubat - 20 Mart)</option>
                </select>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcBurcUyumuHesapla()">❤️ Burç Uyumunu Analiz Et</button>

        <div class="hc-result" id="hc-burc-uyumu-result">
            <div class="hc-bu-hero" id="hc-bu-hero"></div>

            <div class="hc-bu-section">
                <h4 class="hc-bu-sec-title">📊 4 Temel Uyum Boyutu</h4>
                <div class="hc-bu-dim-grid" id="hc-bu-dim-grid"></div>
            </div>

            <div class="hc-bu-section">
                <h4 class="hc-bu-sec-title">📖 Detaylı Burç Uyumu Analizi</h4>
                <div class="hc-result-desc" id="hc-uyum-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
