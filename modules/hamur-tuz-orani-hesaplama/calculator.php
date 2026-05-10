<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hamur_tuz_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dough-salt',
        HC_PLUGIN_URL . 'modules/hamur-tuz-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-dough-salt-calc">
        <h3>Hamur Tuz Oranı</h3>
        <div class="hc-form-group">
            <label for="hc-salt-flour">Un Miktarı (g):</label>
            <input type="number" id="hc-salt-flour" placeholder="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-salt-pct">Tuz Oranı (%):</label>
            <input type="number" id="hc-salt-pct" value="2" step="0.1">
            <small>Fırıncı yüzdesi (Genellikle %1.8 - %2.5)</small>
        </div>
        <button class="hc-btn" onclick="hcDoughSaltHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dough-salt-result">
            <strong>Gereken Tuz:</strong>
            <div id="hc-salt-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
