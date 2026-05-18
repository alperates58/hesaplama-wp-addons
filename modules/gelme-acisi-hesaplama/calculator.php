<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gelme_acisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gelme-acisi-hesaplama',
        HC_PLUGIN_URL . 'modules/gelme-acisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gelme-acisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gelme-acisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gelme-acisi-hesaplama">
        <h3>Gelme Açısı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ga-mod">Olay Türü</label>
            <select id="hc-ga-mod" onchange="hcGelmeAcisiModDegisti()">
                <option value="yansima">Yansıma Yasasından</option>
                <option value="kirilma">Kırılma (Snell) Yasasından</option>
            </select>
        </div>
        
        <div id="hc-ga-girdiler">
            <div class="hc-form-group">
                <label for="hc-ga-yansima">Yansıma Açısı (derece)</label>
                <input type="number" step="any" id="hc-ga-yansima" placeholder="Örn: 30" required>
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcGelmeAcisiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-gelme-acisi-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
