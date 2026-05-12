<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_turk_kahvesi_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-turkish-coffee-js',
        HC_PLUGIN_URL . 'modules/turk-kahvesi-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-turkish-coffee-css',
        HC_PLUGIN_URL . 'modules/turk-kahvesi-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-turkish-coffee">
        <h3>Türk Kahvesi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-tc-cups">Fincan Sayısı</label>
            <input type="number" id="hc-tc-cups" value="1" min="1" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-tc-sugar">Şeker Tercihi</label>
            <select id="hc-tc-sugar">
                <option value="0">Sade (0 Şeker)</option>
                <option value="0.5">Az Şekerli (0.5 Küp/Çay K.)</option>
                <option value="1">Orta (1 Küp/Çay K.)</option>
                <option value="2">Şekerli (2 Küp/Çay K.)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcKahveHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-turkish-coffee-result">
            <div id="hc-tc-res-list">
                <!-- JS populated -->
            </div>
            <div class="hc-result-note">
                <strong>İpucu:</strong> Kahveyi soğuk suyla karıştırıp çok kısık ateşte köpürene kadar pişirin.
            </div>
        </div>
    </div>
    <?php
}
