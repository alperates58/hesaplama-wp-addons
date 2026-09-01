<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_ve_gezegen_asilligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-asalet',
        HC_PLUGIN_URL . 'modules/burc-ve-gezegen-asilligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-asalet-css',
        HC_PLUGIN_URL . 'modules/burc-ve-gezegen-asilligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-asalet">
        <div class="hc-header">
            <h3>Gezegen Asaletleri (Essential Dignities) Hesaplama</h3>
            <p class="hc-subtitle">Gezegenlerinizin Yönetici (Domicile), Yücelim (Exaltation), Zararda (Detriment), Düşüşte (Fall) veya Peregrin durumlarını ve harita asalet puanını öğrenin.</p>
        </div>

        <div class="hc-as-tabs">
            <button type="button" class="hc-as-tab active" onclick="hcAsSetTab('auto')">🎯 Otomatik Harita Asalet Tablosu</button>
            <button type="button" class="hc-as-tab" onclick="hcAsSetTab('manual')">📚 Manuel Gezegen İnceleme</button>
        </div>

        <div id="hc-as-pane-auto" class="hc-as-pane active">
            <div class="hc-form-row">
                <div class="hc-form-group">
                    <label for="hc-as-date">Doğum Tarihi *</label>
                    <input type="date" id="hc-as-date" value="1995-05-15" class="hc-input" required>
                </div>
                <div class="hc-form-group">
                    <label for="hc-as-time">Doğum Saati (Opsiyonel)</label>
                    <input type="time" id="hc-as-time" value="12:00" class="hc-input">
                </div>
            </div>
            <button type="button" class="hc-btn" onclick="hcAsaletOtomatikHesapla()">👑 Haritamın Asalet Puanını Hesapla</button>
        </div>

        <div id="hc-as-pane-manual" class="hc-as-pane">
            <div class="hc-form-row">
                <div class="hc-form-group">
                    <label for="hc-as-planet">Gezegen Seçin</label>
                    <select id="hc-as-planet" class="hc-input">
                        <option value="gunes">☀️ Güneş</option><option value="ay">🌙 Ay</option>
                        <option value="merkur">☿️ Merkür</option><option value="venus">♀️ Venüs</option>
                        <option value="mars">♂️ Mars</option><option value="jupiter">♃ Jüpiter</option>
                        <option value="saturn">♄ Satürn</option><option value="uranus">♅ Uranüs</option>
                        <option value="neptun">♆ Neptün</option><option value="pluton">♇ Plüton</option>
                    </select>
                </div>
                <div class="hc-form-group">
                    <label for="hc-as-sign">Burç Seçin</label>
                    <select id="hc-as-sign" class="hc-input">
                        <option value="koc">♈ Koç</option><option value="boga">♉ Boğa</option><option value="ikizler">♊ İkizler</option>
                        <option value="yengec">♋ Yengeç</option><option value="aslan">♌ Aslan</option><option value="basak">♍ Başak</option>
                        <option value="terazi">♎ Terazi</option><option value="akrep">♏ Akrep</option><option value="yay">♐ Yay</option>
                        <option value="oglak">♑ Oğlak</option><option value="kova">♒ Kova</option><option value="balik">♓ Balık</option>
                    </select>
                </div>
            </div>
            <button type="button" class="hc-btn" onclick="hcAsaletManuelHesapla()">📖 Asalet Durumunu Analiz Et</button>
        </div>

        <div class="hc-result" id="hc-as-result">
            <div class="hc-as-hero" id="hc-as-hero"></div>

            <div class="hc-as-section">
                <h4 class="hc-as-sec-title">📊 Klasik & Modern Asalet Matrisi</h4>
                <div id="hc-as-list" class="hc-as-list"></div>
            </div>

            <div class="hc-as-section">
                <h4 class="hc-as-sec-title">📖 Detaylı Asalet ve Güç Analizi</h4>
                <div class="hc-result-content" id="hc-as-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
