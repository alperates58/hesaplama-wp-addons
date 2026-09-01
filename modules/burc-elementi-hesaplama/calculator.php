<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_elementi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-elementi',
        HC_PLUGIN_URL . 'modules/burc-elementi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-elementi-css',
        HC_PLUGIN_URL . 'modules/burc-elementi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-elementi-hesaplama">
        <div class="hc-header">
            <h3>Burç Elementi ve Mizaç Hesaplama</h3>
            <p class="hc-subtitle">Doğum tarihinizi girerek veya burcunuzu seçerek 4 temel element (Ateş, Toprak, Hava, Su) ve antik mizaç dengenizi keşfedin.</p>
        </div>

        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-el-date">Doğum Tarihi *</label>
                <input type="date" id="hc-el-date" value="1995-05-15" class="hc-input" onchange="hcElSyncDateToSign()">
            </div>
            <div class="hc-form-group">
                <label for="hc-element-burc-select">Veya Burcunuzu Seçin</label>
                <select id="hc-element-burc-select" class="hc-input">
                    <option value="koc">♈ Koç (Ateş)</option>
                    <option value="boga" selected>♉ Boğa (Toprak)</option>
                    <option value="ikizler">♊ İkizler (Hava)</option>
                    <option value="yengec">♋ Yengeç (Su)</option>
                    <option value="aslan">♌ Aslan (Ateş)</option>
                    <option value="basak">♍ Başak (Toprak)</option>
                    <option value="terazi">♎ Terazi (Hava)</option>
                    <option value="akrep">♏ Akrep (Su)</option>
                    <option value="yay">♐ Yay (Ateş)</option>
                    <option value="oglak">♑ Oğlak (Toprak)</option>
                    <option value="kova">♒ Kova (Hava)</option>
                    <option value="balik">♓ Balık (Su)</option>
                </select>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcBurcElementiHesapla()">🔥 Element & Mizaç Analizini Başlat</button>

        <div class="hc-result" id="hc-burc-elementi-result">
            <div class="hc-el-hero" id="hc-el-hero"></div>

            <div class="hc-el-section">
                <h4 class="hc-el-sec-title">📊 4 Element Dağılımı ve Uyumu</h4>
                <div class="hc-el-dim-grid" id="hc-el-dim-grid"></div>
            </div>

            <div class="hc-el-section">
                <h4 class="hc-el-sec-title">📖 Element Simyası & Mizaç Yorumu</h4>
                <div class="hc-result-content" id="hc-element-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
