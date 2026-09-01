<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_ve_sabit_yildizlar_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sabit-yildiz',
        HC_PLUGIN_URL . 'modules/burc-ve-sabit-yildizlar-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sabit-yildiz-css',
        HC_PLUGIN_URL . 'modules/burc-ve-sabit-yildizlar-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sabit-yildiz">
        <div class="hc-header">
            <h3>Sabit Yıldızlar ve Kraliyet Yıldızları Hesaplama</h3>
            <p class="hc-subtitle">Doğum haritanızdaki gezegenlerin 4 Kraliyet Yıldızı (Regulus, Aldebaran, Antares, Fomalhaut) ve Behenian kadim yıldızlarla (Sirius, Spica, Algol, Vega) kavuşumlarını otomatik keşfedin.</p>
        </div>

        <div class="hc-sy-tabs">
            <button type="button" class="hc-sy-tab active" onclick="hcSySetTab('auto')">🎯 Otomatik Harita Yıldız Taraması</button>
            <button type="button" class="hc-sy-tab" onclick="hcSySetTab('manual')">📚 Manuel Derece Sorgulama</button>
        </div>

        <div id="hc-sy-pane-auto" class="hc-sy-pane active">
            <div class="hc-form-row">
                <div class="hc-form-group">
                    <label for="hc-sy-date">Doğum Tarihi *</label>
                    <input type="date" id="hc-sy-date" value="1995-05-15" class="hc-input" required>
                </div>
                <div class="hc-form-group">
                    <label for="hc-sy-time">Doğum Saati (Opsiyonel)</label>
                    <input type="time" id="hc-sy-time" value="12:00" class="hc-input">
                </div>
            </div>
            <button type="button" class="hc-btn" onclick="hcSabitYildizOtomatikHesapla()">✨ Haritamdaki Sabit Yıldızları Bul</button>
        </div>

        <div id="hc-sy-pane-manual" class="hc-sy-pane">
            <div class="hc-form-row">
                <div class="hc-form-group">
                    <label for="hc-sy-sign">Burç Seçin</label>
                    <select id="hc-sy-sign" class="hc-input">
                        <option value="koc">♈ Koç</option><option value="boga">♉ Boğa</option><option value="ikizler">♊ İkizler</option>
                        <option value="yengec">♋ Yengeç</option><option value="aslan">♌ Aslan</option><option value="basak">♍ Başak</option>
                        <option value="terazi">♎ Terazi</option><option value="akrep">♏ Akrep</option><option value="yay">♐ Yay</option>
                        <option value="oglak">♑ Oğlak</option><option value="kova">♒ Kova</option><option value="balik">♓ Balık</option>
                    </select>
                </div>
                <div class="hc-form-group">
                    <label for="hc-sy-deg">Derece (0° - 29°)</label>
                    <input type="number" id="hc-sy-deg" class="hc-input" min="0" max="29" value="24" placeholder="Örn: 24">
                </div>
            </div>
            <button type="button" class="hc-btn" onclick="hcSabitYildizManuelHesapla()">📖 Yıldız Temasını Kontrol Et</button>
        </div>

        <div class="hc-result" id="hc-sy-result">
            <div class="hc-sy-hero" id="hc-sy-hero"></div>

            <div class="hc-sy-section">
                <h4 class="hc-sy-sec-title">✨ Tespit Edilen Sabit Yıldız Kavuşumları</h4>
                <div id="hc-sy-list" class="hc-sy-list"></div>
            </div>

            <div class="hc-sy-section">
                <h4 class="hc-sy-sec-title">📖 Kadim Yıldız Bilgisi ve Kadersel Mesajlar</h4>
                <div class="hc-result-content" id="hc-sy-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
