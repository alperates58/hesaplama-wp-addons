<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dunya_saati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dunya-saati',
        HC_PLUGIN_URL . 'modules/dunya-saati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-dunya-saati-hesaplama">
        <h3>Dünya Saati Hesaplama</h3>
        <div id="hc-ds-container">
            <!-- Saatler buraya gelecek -->
        </div>
        <button class="hc-btn" onclick="hcDunyaSaatiGuncelle()" style="margin-top: 15px;">Saatleri Güncelle</button>
    </div>
    <style>
    .hc-ds-card {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px;
        border-bottom: 1px solid #eee;
    }
    .hc-ds-city { font-weight: bold; }
    .hc-ds-time { color: var(--hc-front-blue); font-size: 18px; font-weight: bold; }
    </style>
    <?php
}
