<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_perde_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-curtain-size',
        HC_PLUGIN_URL . 'modules/perde-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-curtain-size-css',
        HC_PLUGIN_URL . 'modules/perde-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-curtain-size">
        <h3>Perde Ölçüsü Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-curt-w">Porniş/Ray Genişliği (cm)</label>
            <input type="number" id="hc-curt-w" placeholder="Örn: 250">
        </div>
        <div class="hc-form-group">
            <label for="hc-curt-pile">Pile Yoğunluğu</label>
            <select id="hc-curt-pile">
                <option value="1">Pilesiz (1:1)</option>
                <option value="2">Seyrek Pile (1:2)</option>
                <option value="2.5" selected>Normal Pile (1:2.5)</option>
                <option value="3">Sık Pile (1:3)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcCurtainSizeHesapla()">Gereken Kumaş Eni</button>
        <div class="hc-result" id="hc-curtain-size-result">
            <div class="hc-result-item">
                <span>Kumaş Genişliği:</span>
                <span class="hc-result-value" id="hc-res-curt-width">0 cm</span>
            </div>
            <p class="hc-curt-note">Dikiş payları (+10cm) sonuca eklenmiştir.</p>
        </div>
    </div>
    <?php
}
