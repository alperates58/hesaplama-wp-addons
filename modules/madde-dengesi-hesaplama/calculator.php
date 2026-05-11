<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_madde_dengesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-madde-denge',
        HC_PLUGIN_URL . 'modules/madde-dengesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-madde-denge">
        <h3>Madde Dengesi (Karışım) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>1. Akış (M<sub>1</sub>, C<sub>1</sub>)</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-md-m1" placeholder="Kütle (kg)" step="any">
                <input type="number" id="hc-md-c1" placeholder="Kons. (%)" step="any">
            </div>
        </div>

        <div class="hc-form-group">
            <label>2. Akış (M<sub>2</sub>, C<sub>2</sub>)</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-md-m2" placeholder="Kütle (kg)" step="any">
                <input type="number" id="hc-md-c2" placeholder="Kons. (%)" step="any">
            </div>
        </div>

        <button class="hc-btn" onclick="hcMaddeDengesiHesapla()">Karışımı Hesapla</button>

        <div class="hc-result" id="hc-md-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Toplam Kütle:</span>
                <span class="hc-result-value" id="hc-md-res-mass">--</span>
                <span class="hc-result-unit">kg</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Son Konsantrasyon:</span>
                <span class="hc-result-value" id="hc-md-res-conc">--</span>
                <span class="hc-result-unit">%</span>
            </div>
        </div>
    </div>
    <?php
}
