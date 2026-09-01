<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_yonetici_element_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-element',
        HC_PLUGIN_URL . 'modules/burc-yonetici-element-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-element-css',
        HC_PLUGIN_URL . 'modules/burc-yonetici-element-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-element">
        <div class="hc-header">
            <h3>Burç Yönetici Elementi ve Gezegen Simyası Hesaplama</h3>
            <p class="hc-subtitle">Doğum tarihinizi girerek veya burcunuzu seçerek ruhunuzun ana elementini, yönetici gezegenini ve 4 element dengesini keşfedin.</p>
        </div>

        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-bye-date">Doğum Tarihi *</label>
                <input type="date" id="hc-bye-date" value="1995-05-15" class="hc-input" onchange="hcByeSyncDateToSign()">
            </div>
            <div class="hc-form-group">
                <label for="hc-be-sign">Veya Burcunuzu Seçin</label>
                <select id="hc-be-sign" class="hc-input">
                    <option value="koc">♈ Koç (Yönetici: Mars - Ateş)</option>
                    <option value="boga" selected>♉ Boğa (Yönetici: Venüs - Toprak)</option>
                    <option value="ikizler">♊ İkizler (Yönetici: Merkür - Hava)</option>
                    <option value="yengec">♋ Yengeç (Yönetici: Ay - Su)</option>
                    <option value="aslan">♌ Aslan (Yönetici: Güneş - Ateş)</option>
                    <option value="basak">♍ Başak (Yönetici: Merkür - Toprak)</option>
                    <option value="terazi">♎ Terazi (Yönetici: Venüs - Hava)</option>
                    <option value="akrep">♏ Akrep (Yönetici: Mars / Plüton - Su)</option>
                    <option value="yay">♐ Yay (Yönetici: Jüpiter - Ateş)</option>
                    <option value="oglak">♑ Oğlak (Yönetici: Satürn - Toprak)</option>
                    <option value="kova">♒ Kova (Yönetici: Satürn / Uranüs - Hava)</option>
                    <option value="balik">♓ Balık (Yönetici: Jüpiter / Neptün - Su)</option>
                </select>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcBurcElementHesapla()">✨ Yönetici Elementimi Bul</button>

        <div class="hc-result" id="hc-be-result">
            <div class="hc-bye-hero" id="hc-bye-hero"></div>

            <div class="hc-bye-section">
                <h4 class="hc-bye-sec-title">📊 4 Element Dağılımı</h4>
                <div class="hc-bye-dim-grid" id="hc-bye-dim-grid"></div>
            </div>

            <div class="hc-bye-section">
                <h4 class="hc-bye-sec-title">📖 Yönetici Element & Gezegen Rehberliği</h4>
                <div class="hc-result-content" id="hc-be-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
