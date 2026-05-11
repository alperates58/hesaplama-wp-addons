<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gumruk_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gumruk-vergisi-hesaplama',
        HC_PLUGIN_URL . 'modules/gumruk-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gumruk-vergisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gumruk-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gumruk-vergisi">
        <h3>Gümrük Vergisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-gv-value">Eşyanın Gümrük Kıymeti (₺)</label>
            <input type="number" id="hc-gv-value" placeholder="Örn: 50.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-gv-rate">Gümrük Vergisi Oranı (%)</label>
            <input type="number" id="hc-gv-rate" placeholder="Örn: 20" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-gv-ek">Ek Mali Yükümlülük Oranı (%)</label>
            <input type="number" id="hc-gv-ek" placeholder="Örn: 10" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcGumrukVergisiHesapla()">Vergiyi Hesapla</button>
        <div class="hc-result" id="hc-gv-result">
            <div class="hc-result-item">
                <span>Gümrük Vergisi Tutarı:</span>
                <strong id="hc-gv-res-amount">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Ek Mali Yükümlülük:</span>
                <strong id="hc-gv-res-ek">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Ödenecek Vergi:</span>
                <strong class="hc-result-value" id="hc-gv-res-total">-</strong>
            </div>
        </div>
    </div>
    <?php
}
