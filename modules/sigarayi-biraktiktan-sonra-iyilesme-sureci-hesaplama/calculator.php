<?php
if (!defined('ABSPATH')) exit;

function hc_render_sigarayi_biraktiktan_sonra_iyilesme_sureci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sigarayi-biraktiktan-sonra-iyilesme-sureci-hesaplama',
        HC_PLUGIN_URL . 'modules/sigarayi-biraktiktan-sonra-iyilesme-sureci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sigarayi-biraktiktan-sonra-iyilesme-sureci-hesaplama-css',
        HC_PLUGIN_URL . 'modules/sigarayi-biraktiktan-sonra-iyilesme-sureci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );

    ?>
    <div class="hc-calculator hc-quit-smoking-calculator">
        <h3>Sigarayı Bırakma İyileşme Süreci Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-quit-date">Sigara bırakma tarihini seçin:</label>
            <input type="date" id="hc-quit-date" name="quit_date" required>
        </div>
        <button type="button" id="hc-calculate-btn" class="hc-btn">Hesapla</button>
        <div id="hc-result" class="hc-result"></div>
    </div>
    <?php

}
