<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_frekans_poligonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-frekans-poligonu-hesaplama',
        HC_PLUGIN_URL . 'modules/frekans-poligonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-frekans-poligonu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/frekans-poligonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-freq-polygon">
        <h3>Frekans Poligonu Koordinatları</h3>
        <div class="hc-form-group">
            <label for="hc-poly-data">Veri Seti (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-poly-data" class="hc-input" placeholder="Örn: 5, 8, 12, 15, 22, 25"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-poly-bins">Grup Sayısı:</label>
            <input type="number" id="hc-poly-bins" class="hc-input" value="5" min="2">
        </div>
        <button class="hc-btn" onclick="hcFrekansPoligonuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-frekans-poligonu-result">
            <div class="hc-result-label">Poligon Koordinatları (Orta Nokta, Frekans):</div>
            <table class="hc-table" style="width: 100%; text-align: center; margin-top: 15px;">
                <thead>
                    <tr>
                        <th>Nokta #</th>
                        <th>Orta Nokta (X)</th>
                        <th>Frekans (Y)</th>
                    </tr>
                </thead>
                <tbody id="hc-poly-tbody"></tbody>
            </table>
            <p style="margin-top: 10px; font-size: 0.8em; color: #666;">Not: Poligonun eksene değmesi için başa ve sona 0 frekanslı hayali noktalar eklenmiştir.</p>
        </div>
    </div>
    <?php
}
