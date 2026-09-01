<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_ve_duragan_gezegen_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stationary',
        HC_PLUGIN_URL . 'modules/burc-ve-duragan-gezegen-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stationary-css',
        HC_PLUGIN_URL . 'modules/burc-ve-duragan-gezegen-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stationary">
        <div class="hc-header">
            <h3>Durağan (Stationary - S) Gezegen Hesaplama</h3>
            <p class="hc-subtitle">Doğum anınızda gökyüzünde yön değiştirmek üzere duraklayan (S - Stationary) gezegenlerin kadersel odaklanma ve deha potansiyelini keşfedin.</p>
        </div>

        <div class="hc-st-tabs">
            <button type="button" class="hc-st-tab active" onclick="hcStSetTab('auto')">🎯 Otomatik Doğum Haritası Analizi</button>
            <button type="button" class="hc-st-tab" onclick="hcStSetTab('manual')">📚 Manuel Gezegen İnceleme</button>
        </div>

        <div id="hc-st-pane-auto" class="hc-st-pane active">
            <div class="hc-form-row">
                <div class="hc-form-group">
                    <label for="hc-st-date">Doğum Tarihi *</label>
                    <input type="date" id="hc-st-date" value="1995-05-15" class="hc-input" required>
                </div>
                <div class="hc-form-group">
                    <label for="hc-st-time">Doğum Saati (Opsiyonel)</label>
                    <input type="time" id="hc-st-time" value="12:00" class="hc-input">
                </div>
            </div>
            <button type="button" class="hc-btn" onclick="hcStationaryOtomatikHesapla()">🪐 Doğumumdaki Durağan Gezegenleri Bul</button>
        </div>

        <div id="hc-st-pane-manual" class="hc-st-pane">
            <div class="hc-form-row">
                <div class="hc-form-group">
                    <label for="hc-st-planet">Durağan Gezegen</label>
                    <select id="hc-st-planet" class="hc-input">
                        <option value="merkur">☿️ Merkür (S)</option>
                        <option value="venus">♀️ Venüs (S)</option>
                        <option value="mars">♂️ Mars (S)</option>
                        <option value="jupiter">♃ Jüpiter (S)</option>
                        <option value="saturn">♄ Satürn (S)</option>
                        <option value="uranus">♅ Uranüs (S)</option>
                        <option value="neptun">♆ Neptün (S)</option>
                        <option value="pluton">♇ Plüton (S)</option>
                    </select>
                </div>
                <div class="hc-form-group">
                    <label for="hc-st-sign">Bulunduğu Burç</label>
                    <select id="hc-st-sign" class="hc-input">
                        <option value="koc">♈ Koç</option><option value="boga">♉ Boğa</option><option value="ikizler">♊ İkizler</option>
                        <option value="yengec">♋ Yengeç</option><option value="aslan">♌ Aslan</option><option value="basak">♍ Başak</option>
                        <option value="terazi">♎ Terazi</option><option value="akrep">♏ Akrep</option><option value="yay">♐ Yay</option>
                        <option value="oglak">♑ Oğlak</option><option value="kova">♒ Kova</option><option value="balik">♓ Balık</option>
                    </select>
                </div>
            </div>
            <button type="button" class="hc-btn" onclick="hcStationaryManuelHesapla()">📖 Durağan Güç Noktasını İncele</button>
        </div>

        <div class="hc-result" id="hc-st-result">
            <div class="hc-st-hero" id="hc-st-hero"></div>

            <div class="hc-st-section">
                <h4 class="hc-st-sec-title">📊 Gezegen Hızları ve Hareket Durumları</h4>
                <div id="hc-st-list" class="hc-st-list"></div>
            </div>

            <div class="hc-st-section">
                <h4 class="hc-st-sec-title">📖 Detaylı Kadersel Odaklanma Analizi</h4>
                <div class="hc-result-content" id="hc-st-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
