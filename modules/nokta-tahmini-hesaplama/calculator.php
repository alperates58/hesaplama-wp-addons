<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_nokta_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-nokta-tahmini-hesaplama',
        HC_PLUGIN_URL . 'modules/nokta-tahmini-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-nokta-tahmini-hesaplama-css',
        HC_PLUGIN_URL . 'modules/nokta-tahmini-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-nokta-tahmini-hesaplama">
        <h3>Nokta Tahmini Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pt-type">Tahmin Tipi</label>
            <select id="hc-pt-type" onchange="hcChangePtType()">
                <option value="mean">Popülasyon Ortalaması (μ)</option>
                <option value="prop">Popülasyon Oranı (p)</option>
            </select>
        </div>
        <div id="hc-pt-mean-inputs">
            <div class="hc-form-group">
                <label for="hc-pt-data">Örneklem Verileri (Virgül ile ayırın)</label>
                <textarea id="hc-pt-data" rows="4" placeholder="10, 12, 15, 14, 18"></textarea>
            </div>
        </div>
        <div id="hc-pt-prop-inputs" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-pt-x">Başarı Sayısı (x)</label>
                <input type="number" id="hc-pt-x" min="0">
            </div>
            <div class="hc-form-group">
                <label for="hc-pt-n">Örneklem Büyüklüğü (n)</label>
                <input type="number" id="hc-pt-n" min="1">
            </div>
        </div>
        <button class="hc-btn" onclick="hcNoktaTahminiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-nokta-tahmini-hesaplama-result">
            <span class="hc-label">Nokta Tahmini:</span>
            <div class="hc-result-value" id="hc-pt-res-val">0</div>
            <div id="hc-pt-res-desc" style="margin-top:10px; font-style:italic;"></div>
        </div>
    </div>
    <?php
}
