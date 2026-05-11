<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gizli_isi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-latent-heat',
        HC_PLUGIN_URL . 'modules/gizli-isi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-latent-heat">
        <h3>Gizli Isı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Kütle (m, kg)</label>
            <input type="number" id="hc-lh-m" placeholder="kg" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Özgül Gizli Isı (L, kJ/kg)</label>
            <input type="number" id="hc-lh-l" placeholder="kJ/kg" step="1">
            <small>Buz erimesi: 334, Su buharlaşması: 2257</small>
        </div>
        
        <button class="hc-btn" onclick="hcLatentHeatHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-lh-result">
            <span>Toplam Isı Enerjisi (Q):</span>
            <div class="hc-result-value" id="hc-lh-res-val">0 kJ</div>
        </div>
    </div>
    <?php
}
