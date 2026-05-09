<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunes_tutulmasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gunes-tutulmasi',
        HC_PLUGIN_URL . 'modules/gunes-tutulmasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-gunes-tutulmasi-hesaplama">
        <h3>Güneş Tutulması Hesaplama (2026)</h3>
        <p style="font-size: 14px; color: var(--hc-front-muted); margin-bottom: 20px;">
            2026 yılındaki önemli güneş tutulmalarını aşağıdan görebilirsiniz.
        </p>
        <div id="hc-gt-list">
            <!-- Tutulmalar buraya listelenecek -->
        </div>
        <button class="hc-btn" onclick="hcGunesTutulmasiHesapla()" style="margin-top: 10px;">Tutulmaları Göster</button>
        <div class="hc-result" id="hc-gt-result">
            <div id="hc-gt-content"></div>
        </div>
    </div>
    <?php
}
