<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bisiklet_kadans_ve_hiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bisiklet-kadans-ve-hiz-hesaplama',
        HC_PLUGIN_URL . 'modules/bisiklet-kadans-ve-hiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bisiklet-kadans-ve-hiz-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bisiklet-kadans-ve-hiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bike-cad-speed">
        <h3>Bisiklet Kadans ve Hız</h3>
        <div class="hc-form-group">
            <label for="hc-bike-cadence">Kadans (RPM - Dakikadaki Pedal Devri)</label>
            <input type="number" id="hc-bike-cadence" placeholder="Örn: 90" value="90">
        </div>
        <div class="hc-form-group">
            <label for="hc-bike-chainring">Aynakol Diş Sayısı (Ön)</label>
            <input type="number" id="hc-bike-chainring" placeholder="Örn: 50" value="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-bike-cog">Ruble Diş Sayısı (Arka)</label>
            <input type="number" id="hc-bike-cog" placeholder="Örn: 15" value="15">
        </div>
        <div class="hc-form-group">
            <label for="hc-bike-tire">Tekerlek Çapı / Lastik</label>
            <select id="hc-bike-tire">
                <option value="2105">700x23c (2105 mm)</option>
                <option value="2136" selected>700x25c (2136 mm)</option>
                <option value="2168">700x28c (2168 mm)</option>
                <option value="2068">26x2.0 (2068 mm)</option>
                <option value="2298">29x2.2 (2298 mm)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBisikletKadansVeHizHesapla()">Hızı Hesapla</button>
        <div class="hc-result" id="hc-bike-result">
            <div class="hc-result-label">Tahmini Hız:</div>
            <div class="hc-result-value" id="hc-bike-speed-val">-</div>
            <div id="hc-bike-ratio" style="margin-top: 10px; font-size: 0.9em;"></div>
        </div>
    </div>
    <?php
}
