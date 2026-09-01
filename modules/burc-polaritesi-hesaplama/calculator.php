<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_polaritesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-polarite',
        HC_PLUGIN_URL . 'modules/burc-polaritesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-polarite-css',
        HC_PLUGIN_URL . 'modules/burc-polaritesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-polarite">
        <div class="hc-header">
            <h3>Burç Polaritesi (Eril / Yang & Dişil / Yin) Hesaplama</h3>
            <p class="hc-subtitle">Doğum tarihinizi girerek veya burcunuzu seçerek enerjinizin dışa dönük (Eril/Yang) mi yoksa içe dönük ve alıcı (Dişil/Yin) mi olduğunu keşfedin.</p>
        </div>

        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-bp-date">Doğum Tarihi *</label>
                <input type="date" id="hc-bp-date" value="1995-05-15" class="hc-input" onchange="hcBpSyncDateToSign()">
            </div>
            <div class="hc-form-group">
                <label for="hc-bp-sign">Veya Burcunuzu Seçin</label>
                <select id="hc-bp-sign" class="hc-input">
                    <option value="koc">♈ Koç (Eril / Ateş)</option>
                    <option value="boga" selected>♉ Boğa (Dişil / Toprak)</option>
                    <option value="ikizler">♊ İkizler (Eril / Hava)</option>
                    <option value="yengec">♋ Yengeç (Dişil / Su)</option>
                    <option value="aslan">♌ Aslan (Eril / Ateş)</option>
                    <option value="basak">♍ Başak (Dişil / Toprak)</option>
                    <option value="terazi">♎ Terazi (Eril / Hava)</option>
                    <option value="akrep">♏ Akrep (Dişil / Su)</option>
                    <option value="yay">♐ Yay (Eril / Ateş)</option>
                    <option value="oglak">♑ Oğlak (Dişil / Toprak)</option>
                    <option value="kova">♒ Kova (Eril / Hava)</option>
                    <option value="balik">♓ Balık (Dişil / Su)</option>
                </select>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcBurcPolariteHesapla()">☯️ Polariteyi Hesapla</button>

        <div class="hc-result" id="hc-bp-result">
            <div class="hc-bp-hero" id="hc-bp-hero"></div>

            <div class="hc-bp-section">
                <h4 class="hc-bp-sec-title">📊 4 Enerji Polaritesi Boyutu</h4>
                <div class="hc-bp-dim-grid" id="hc-bp-dim-grid"></div>
            </div>

            <div class="hc-bp-section">
                <h4 class="hc-bp-sec-title">📖 Detaylı Polarite & Enerji Akış Analizi</h4>
                <div class="hc-result-content" id="hc-bp-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
