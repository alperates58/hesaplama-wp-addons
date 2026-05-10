<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_set_arasi_dinlenme_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-set-arasi-dinlenme-suresi-hesaplama',
        HC_PLUGIN_URL . 'modules/set-arasi-dinlenme-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-set-arasi-dinlenme-suresi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/set-arasi-dinlenme-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rest">
        <h3>Set Arası Dinlenme Süresi</h3>
        <div class="hc-form-group">
            <label for="hc-rest-goal">Antrenman Hedefi</label>
            <select id="hc-rest-goal">
                <option value="strength">Maksimum Kuvvet (1-5 Tekrar)</option>
                <option value="hypertrophy" selected>Kas Gelişimi / Hipertrofi (6-12 Tekrar)</option>
                <option value="endurance">Dayanıklılık (15+ Tekrar)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSetArasiDinlenmeSuresiHesapla()">Öneriyi Gör</button>
        <div class="hc-result" id="hc-rest-result">
            <div class="hc-result-label">Önerilen Dinlenme Süresi:</div>
            <div class="hc-result-value" id="hc-rest-val">-</div>
            <div id="hc-rest-why" style="margin-top: 10px; font-size: 0.9em; font-style: italic;"></div>
        </div>
    </div>
    <?php
}
