<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tam_sayili_kesirden_bilesik_kesre_cevirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mixed-to-imp',
        HC_PLUGIN_URL . 'modules/tam-sayili-kesirden-bilesik-kesre-cevirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mti">
        <h3>Kesir Çevirme (Tam Sayılı → Bileşik)</h3>
        <div style="display:flex; align-items:center; gap:10px; margin-bottom:20px;">
            <input type="number" id="hc-mti-w" placeholder="Tam" style="width:60px">
            <div style="display:flex; flex-direction:column;">
                <input type="number" id="hc-mti-n" placeholder="Pay" style="width:60px; margin-bottom:2px">
                <input type="number" id="hc-mti-d" placeholder="Payda" style="width:60px">
            </div>
        </div>
        <button class="hc-btn" onclick="hcMtiHesapla()">Çevir</button>
        <div class="hc-result" id="hc-mti-result">
            <strong>Bileşik Kesir:</strong>
            <div id="hc-mti-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
