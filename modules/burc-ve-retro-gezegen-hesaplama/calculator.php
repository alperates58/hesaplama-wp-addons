<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_ve_retro_gezegen_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-retro',
        HC_PLUGIN_URL . 'modules/burc-ve-retro-gezegen-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-retro-css',
        HC_PLUGIN_URL . 'modules/burc-ve-retro-gezegen-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-retro">
        <div class="hc-header">
            <h3>Retro (Rx) Gezegen ve Burç Analizi</h3>
            <p class="hc-subtitle">Doğum haritanızdaki geri giden (Retrograde - Rx) gezegenleri otomatik hesaplayın veya seçtiğiniz retro gezegenin karmik derslerini keşfedin.</p>
        </div>

        <div class="hc-rx-tabs">
            <button type="button" class="hc-rx-tab active" onclick="hcRxSetTab('auto')">🎯 Otomatik Harita Analizi</button>
            <button type="button" class="hc-rx-tab" onclick="hcRxSetTab('manual')">📚 Manuel Gezegen Seçimi</button>
        </div>

        <div id="hc-rx-pane-auto" class="hc-rx-pane active">
            <div class="hc-form-row">
                <div class="hc-form-group">
                    <label for="hc-rx-date">Doğum Tarihi *</label>
                    <input type="date" id="hc-rx-date" value="1995-05-15" class="hc-input" required>
                </div>
                <div class="hc-form-group">
                    <label for="hc-rx-time">Doğum Saati (Opsiyonel)</label>
                    <input type="time" id="hc-rx-time" value="12:00" class="hc-input">
                </div>
            </div>
            <button type="button" class="hc-btn" onclick="hcRetroOtomatikHesapla()">℞ Doğumumdaki Retroları Bul</button>
        </div>

        <div id="hc-rx-pane-manual" class="hc-rx-pane">
            <div class="hc-form-row">
                <div class="hc-form-group">
                    <label for="hc-rx-planet">Retro Gezegen</label>
                    <select id="hc-rx-planet" class="hc-input">
                        <option value="merkur">☿️ Merkür (Rx)</option>
                        <option value="venus">♀️ Venüs (Rx)</option>
                        <option value="mars">♂️ Mars (Rx)</option>
                        <option value="jupiter">♃ Jüpiter (Rx)</option>
                        <option value="saturn">♄ Satürn (Rx)</option>
                        <option value="uranus">♅ Uranüs (Rx)</option>
                        <option value="neptun">♆ Neptün (Rx)</option>
                        <option value="pluton">♇ Plüton (Rx)</option>
                    </select>
                </div>
                <div class="hc-form-group">
                    <label for="hc-rx-sign">Bulunduğu Burç</label>
                    <select id="hc-rx-sign" class="hc-input">
                        <option value="koc">♈ Koç</option><option value="boga">♉ Boğa</option><option value="ikizler">♊ İkizler</option>
                        <option value="yengec">♋ Yengeç</option><option value="aslan">♌ Aslan</option><option value="basak">♍ Başak</option>
                        <option value="terazi">♎ Terazi</option><option value="akrep">♏ Akrep</option><option value="yay">♐ Yay</option>
                        <option value="oglak">♑ Oğlak</option><option value="kova">♒ Kova</option><option value="balik">♓ Balık</option>
                    </select>
                </div>
            </div>
            <button type="button" class="hc-btn" onclick="hcRetroManuelHesapla()">📖 Retro Dersi Analiz Et</button>
        </div>

        <div class="hc-result" id="hc-rx-result">
            <div class="hc-rx-hero" id="hc-rx-hero"></div>

            <div class="hc-rx-section">
                <h4 class="hc-rx-sec-title">🪐 Gezegen Hareket Durumları (Direct / Retro)</h4>
                <div id="hc-rx-list" class="hc-rx-list"></div>
            </div>

            <div class="hc-rx-section">
                <h4 class="hc-rx-sec-title">📖 Ruhsal Ödevler ve Karmik Anlamlar</h4>
                <div class="hc-result-content" id="hc-rx-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
