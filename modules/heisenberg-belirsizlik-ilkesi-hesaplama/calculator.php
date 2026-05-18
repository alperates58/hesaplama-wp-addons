<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_heisenberg_belirsizlik_ilkesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-heisenberg-belirsizlik-ilkesi-hesaplama',
        HC_PLUGIN_URL . 'modules/heisenberg-belirsizlik-ilkesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-heisenberg-belirsizlik-ilkesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/heisenberg-belirsizlik-ilkesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-heisenberg-belirsizlik-ilkesi-hesaplama">
        <h3>Heisenberg Belirsizlik İlkesi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-hbi-tip">Belirsizlik Tipi</label>
            <select id="hc-hbi-tip" onchange="hcHbiTipDegisti()">
                <option value="konum">Konum - Momentum Belirsizliği (Δx · Δp ≥ ℏ/2)</option>
                <option value="enerji">Enerji - Zaman Belirsizliği (ΔE · Δt ≥ ℏ/2)</option>
            </select>
        </div>
        
        <div id="hc-hbi-girdiler">
            <div class="hc-form-group">
                <label for="hc-hbi-deger">Konum Belirsizliği (Δx - metre)</label>
                <input type="number" step="any" id="hc-hbi-deger" placeholder="Örn: 1e-10 (Atomik ölçek)" required>
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcHeisenbergBelirsizlikIlkesiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-heisenberg-belirsizlik-ilkesi-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
