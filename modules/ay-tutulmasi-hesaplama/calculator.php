<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ay_tutulmasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ay-tutulmasi',
        HC_PLUGIN_URL . 'modules/ay-tutulmasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ay-tutulmasi-hesaplama">
        <h3>Ay Tutulması Hesaplama (2026)</h3>
        <p style="font-size: 14px; color: var(--hc-front-muted); margin-bottom: 20px;">
            2026 yılındaki ay tutulmalarının detaylarını ve görünürlük bilgilerini aşağıda bulabilirsiniz.
        </p>
        <button class="hc-btn" onclick="hcAyTutulmasiHesapla()">Tutulmaları Göster</button>
        <div class="hc-result" id="hc-at-result">
            <div id="hc-at-content"></div>
        </div>
    </div>
    <?php
}
