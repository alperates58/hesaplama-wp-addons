<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gelir_gider_defteri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gelir-gider-defteri-hesaplama',
        HC_PLUGIN_URL . 'modules/gelir-gider-defteri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gelir-gider-defteri-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gelir-gider-defteri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gelir-gider-defteri">
        <h3>Gelir Gider Defteri</h3>
        <div id="hc-ggd-entries">
            <div class="hc-ggd-entry">
                <input type="text" class="hc-ggd-desc" placeholder="Açıklama (Örn: Maaş)">
                <input type="number" class="hc-ggd-amount" placeholder="Tutar">
                <select class="hc-ggd-type">
                    <option value="gelir">Gelir (+)</option>
                    <option value="gider">Gider (-)</option>
                </select>
            </div>
        </div>
        <button class="hc-btn-secondary" onclick="hcGgdAddEntry()">+ Satır Ekle</button>
        <button class="hc-btn" onclick="hcGgdHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ggd-result">
            <div class="hc-result-item">
                <span>Toplam Gelir:</span>
                <strong id="hc-ggd-res-gelir" style="color: green;">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Gider:</span>
                <strong id="hc-ggd-res-gider" style="color: red;">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Net Bakiye:</span>
                <strong class="hc-result-value" id="hc-ggd-res-net">-</strong>
            </div>
        </div>
    </div>
    <?php
}
