<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_akis_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-akis-hiz',
        HC_PLUGIN_URL . 'modules/akis-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-akis-hiz-css',
        HC_PLUGIN_URL . 'modules/akis-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-akis-hiz">
        <h3>Akış Hızı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ah-debi">Debi (Q)</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-ah-debi" placeholder="Miktar" step="0.001" style="flex: 1;">
                <select id="hc-ah-debi-birim" style="width: 100px;">
                    <option value="m3s">m³/s</option>
                    <option value="m3h">m³/saat</option>
                    <option value="ls">L/s</option>
                </select>
            </div>
        </div>

        <div class="hc-form-group">
            <label>Kesit Tipi</label>
            <select id="hc-ah-kesit-tipi" onchange="hcAkisHiziTipDegistir()">
                <option value="daire">Dairesel Boru (Çap)</option>
                <option value="dikdortgen">Dikdörtgen Kanal</option>
                <option value="alan">Serbest Alan (m²)</option>
            </select>
        </div>

        <div id="hc-ah-kesit-inputs">
            <div id="hc-ah-in-daire" class="hc-ah-input-group">
                <label for="hc-ah-cap">Boru Çapı (D)</label>
                <input type="number" id="hc-ah-cap" placeholder="Milimetre (mm)" step="1">
            </div>
            <div id="hc-ah-in-dikdortgen" class="hc-ah-input-group" style="display:none;">
                <label for="hc-ah-genislik">Genişlik (w)</label>
                <input type="number" id="hc-ah-genislik" placeholder="Metre (m)" step="0.01">
                <label for="hc-ah-yukseklik">Yükseklik (h)</label>
                <input type="number" id="hc-ah-yukseklik" placeholder="Metre (m)" step="0.01">
            </div>
            <div id="hc-ah-in-alan" class="hc-ah-input-group" style="display:none;">
                <label for="hc-ah-alan">Kesit Alanı (A)</label>
                <input type="number" id="hc-ah-alan" placeholder="m²" step="0.001">
            </div>
        </div>

        <button class="hc-btn" onclick="hcAkisHiziHesapla()">Hızı Hesapla</button>

        <div class="hc-result" id="hc-akis-hiz-result">
            <div class="hc-result-item">
                <span>Akış Hızı (v):</span>
                <strong class="hc-result-value" id="hc-ah-res-v">-</strong>
            </div>
            <div class="hc-result-note" id="hc-ah-res-note"></div>
        </div>
    </div>
    <?php
}
