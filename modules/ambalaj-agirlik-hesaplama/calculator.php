<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ambalaj_agirlik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pkg-weight',
        HC_PLUGIN_URL . 'modules/ambalaj-agirlik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pkg-weight-css',
        HC_PLUGIN_URL . 'modules/ambalaj-agirlik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pkg-weight">
        <h3>Ambalaj Ağırlık Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pw-materyal">Malzeme Tipi</label>
            <select id="hc-pw-materyal">
                <option value="700">Karton / Mukavva (~700 kg/m³)</option>
                <option value="920">Plastik (LDPE/Naylon) (~920 kg/m³)</option>
                <option value="800">Kağıt (~800 kg/m³)</option>
                <option value="2700">Alüminyum Folyo (~2700 kg/m³)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-pw-alan">Toplam Yüzey Alanı (m²)</label>
            <input type="number" id="hc-pw-alan" placeholder="Örn: 0.5" step="0.01">
        </div>

        <div class="hc-form-group">
            <label for="hc-pw-kalinlik">Malzeme Kalınlığı (mm)</label>
            <input type="number" id="hc-pw-kalinlik" placeholder="Örn: 0.2" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcAmbalajAgirlikHesapla()">Ağırlığı Hesapla</button>

        <div class="hc-result" id="hc-pkg-weight-result">
            <div class="hc-result-item">
                <span>Tahmini Ağırlık:</span>
                <strong class="hc-result-value" id="hc-pw-res-val">-</strong>
            </div>
            <div class="hc-result-note" id="hc-pw-res-note"></div>
        </div>
    </div>
    <?php
}
