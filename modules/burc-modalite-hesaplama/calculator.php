<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_modalite_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-modalite',
        HC_PLUGIN_URL . 'modules/burc-modalite-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-modalite-css',
        HC_PLUGIN_URL . 'modules/burc-modalite-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-modalite">
        <div class="hc-header">
            <h3>Burç Modalitesi (Öncü / Sabit / Değişken) Hesaplama</h3>
            <p class="hc-subtitle">Doğum tarihinizi girerek veya burcunuzu seçerek eylem tarzınızı, karar alma hızınızı ve astrolojik modalitenizi (Nitelik) öğrenin.</p>
        </div>

        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-bm-date">Doğum Tarihi *</label>
                <input type="date" id="hc-bm-date" value="1995-05-15" class="hc-input" onchange="hcBmSyncDateToSign()">
            </div>
            <div class="hc-form-group">
                <label for="hc-bm-sign">Veya Burcunuzu Seçin</label>
                <select id="hc-bm-sign" class="hc-input">
                    <option value="koc">♈ Koç (21 Mart - 19 Nisan)</option>
                    <option value="boga" selected>♉ Boğa (20 Nisan - 20 Mayıs)</option>
                    <option value="ikizler">♊ İkizler (21 Mayıs - 20 Haziran)</option>
                    <option value="yengec">♋ Yengeç (21 Haziran - 22 Temmuz)</option>
                    <option value="aslan">♌ Aslan (23 Temmuz - 22 Ağustos)</option>
                    <option value="basak">♍ Başak (23 Ağustos - 22 Eylül)</option>
                    <option value="terazi">♎ Terazi (23 Eylül - 22 Ekim)</option>
                    <option value="akrep">♏ Akrep (23 Ekim - 21 Kasım)</option>
                    <option value="yay">♐ Yay (22 Kasım - 21 Aralık)</option>
                    <option value="oglak">♑ Oğlak (22 Aralık - 19 Ocak)</option>
                    <option value="kova">♒ Kova (20 Ocak - 18 Şubat)</option>
                    <option value="balik">♓ Balık (19 Şubat - 20 Mart)</option>
                </select>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcBurcModaliteHesapla()">⚡ Modalitemi Hesapla</button>

        <div class="hc-result" id="hc-bm-result">
            <div class="hc-bm-hero" id="hc-bm-hero"></div>

            <div class="hc-bm-section">
                <h4 class="hc-bm-sec-title">📊 3 Eylem & Yönetim Boyutu</h4>
                <div class="hc-bm-dim-grid" id="hc-bm-dim-grid"></div>
            </div>

            <div class="hc-bm-section">
                <h4 class="hc-bm-sec-title">📖 Detaylı Modalite & Eylem Stratejisi</h4>
                <div class="hc-result-content" id="hc-bm-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
