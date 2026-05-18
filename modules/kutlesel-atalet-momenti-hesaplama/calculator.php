<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kutlesel_atalet_momenti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kutlesel-atalet-momenti-hesaplama',
        HC_PLUGIN_URL . 'modules/kutlesel-atalet-momenti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kutlesel-atalet-momenti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kutlesel-atalet-momenti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-inertia">
        <h3>Kütlesel Atalet Momenti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-inertia-geom">Geometri / Şekil Seçimi</label>
            <select id="hc-inertia-geom" onchange="hcInertiaGeomChange()">
                <option value="solid-sphere">Dolu Küre (I = 2/5 &times; m &times; r²)</option>
                <option value="hollow-sphere">İçi Boş Küre (I = 2/3 &times; m &times; r²)</option>
                <option value="solid-cylinder">Dolu Silindir veya Disk (I = 1/2 &times; m &times; r²)</option>
                <option value="thin-hollow-cylinder">İnce Çeperli Boru/Halka (I = m &times; r²)</option>
                <option value="rod-center">İnce Çubuk - Merkezden Dönen (I = 1/12 &times; m &times; L²)</option>
                <option value="rod-end">İnce Çubuk - Uçtan Dönen (I = 1/3 &times; m &times; L²)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-inertia-mass">Cismin Kütlesi (m - kg)</label>
            <input type="number" id="hc-inertia-mass" placeholder="Örn: 5" value="5">
        </div>

        <div class="hc-form-group">
            <label for="hc-inertia-dim" id="hc-inertia-dim-label">Yarıçap (r - metre)</label>
            <input type="number" id="hc-inertia-dim" placeholder="Örn: 0.5" value="0.5">
        </div>

        <button class="hc-btn" onclick="hcKütleselAtaletMomentiHesapla()">Atalet Momentini Hesapla</button>

        <div class="hc-result" id="hc-kutlesel-atalet-momenti-result">
            <div class="hc-result-label">Atalet Momenti (I):</div>
            <div class="hc-result-value" id="hc-inertia-val">-</div>
            
            <div id="hc-inertia-formula-desc" style="margin-top: 15px; font-size: 13px; color: var(--hc-front-muted);">
                <!-- Formül açıklaması -->
            </div>
        </div>
    </div>
    <?php
}
