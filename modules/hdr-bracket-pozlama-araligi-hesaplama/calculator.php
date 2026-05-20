<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hdr_bracket_pozlama_araligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hdr-bracket-pozlama-araligi-hesaplama',
        HC_PLUGIN_URL . 'modules/hdr-bracket-pozlama-araligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hdr-bracket-pozlama-araligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hdr-bracket-pozlama-araligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hdr-bracket-pozlama-araligi-hesaplama">
        <h3>HDR Bracket Pozlama Aralığı Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-hdr-num-shots">Çekim Sayısı</label>
            <select id="hc-hdr-num-shots" class="hc-select">
                <option value="3" selected>3 Çekim</option>
                <option value="5">5 Çekim</option>
                <option value="7">7 Çekim</option>
                <option value="9">9 Çekim</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-hdr-scene-contrast">Sahne Kontrast Seviyesi</label>
            <select id="hc-hdr-scene-contrast" class="hc-select">
                <option value="2.0">Düşük Kontrast (±2 EV)</option>
                <option value="3.0" selected>Orta Kontrast (±3 EV)</option>
                <option value="4.0">Yüksek Kontrast (±4 EV)</option>
                <option value="5.0">Çok Yüksek Kontrast (±5 EV)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcHdrBracketPozlamaAralgiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-hdr-bracket-pozlama-araligi-hesaplama-result">
            <div class="hc-result-item">
                <span>Önerilen EV Aralığı:</span>
                <strong id="hc-hdr-ev-spacing-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Çekim Sırası:</span>
            </div>
            <div id="hc-hdr-sequence-val" style="padding-left: 20px;">-</div>
        </div>
    </div>
    <?php
}
