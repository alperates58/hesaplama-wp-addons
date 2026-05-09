<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_agirliga_gore_pisirme_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cook-time',
        HC_PLUGIN_URL . 'modules/agirliga-gore-pisirme-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cook-time-css',
        HC_PLUGIN_URL . 'modules/agirliga-gore-pisirme-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cook-time">
        <h3>Pişirme Süresi Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-ct-type">Et Türü</label>
            <select id="hc-ct-type">
                <option value="chicken">Tavuk (Bütün)</option>
                <option value="turkey">Hindi</option>
                <option value="beef_med">Dana (Orta Pişmiş)</option>
                <option value="beef_well">Dana (Tam Pişmiş)</option>
                <option value="lamb">Kuzu</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ct-weight">Ağırlık (kg)</label>
            <input type="number" id="hc-ct-weight" placeholder="Örn: 1.5" step="0.1" min="0.1">
        </div>
        <button class="hc-btn" onclick="hcCookTimeHesapla()">Süreyi Hesapla</button>
        <div class="hc-result" id="hc-cook-time-result">
            <div class="hc-result-item">
                <span>Tahmini Süre:</span>
                <span class="hc-result-value" id="hc-res-ct-time">0 Dakika</span>
            </div>
            <p class="hc-ct-info">Fırın sıcaklığı 180°C (fanlı) olarak baz alınmıştır.</p>
        </div>
    </div>
    <?php
}
