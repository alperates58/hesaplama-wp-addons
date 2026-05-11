<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_emlak_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-emlak-vergisi',
        HC_PLUGIN_URL . 'modules/emlak-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-emlak-vergisi-css',
        HC_PLUGIN_URL . 'modules/emlak-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-emlak-vergi">
        <h3>Emlak Vergisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ev-value">Rayiç Değer / Vergi Değeri (₺)</label>
            <input type="number" id="hc-ev-value" placeholder="Örn: 5.000.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-ev-city">Şehir Türü</label>
            <select id="hc-ev-city">
                <option value="2">Büyükşehir Belediyesi</option>
                <option value="1">Diğer Belediyeler</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ev-type">Gayrimenkul Türü</label>
            <select id="hc-ev-type">
                <option value="0.001">Konut</option>
                <option value="0.002">İşyeri</option>
                <option value="0.003">Arsa</option>
                <option value="0.001">Arazi</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcEmlakVergisiHesapla()">Vergi Hesapla</button>
        <div class="hc-result" id="hc-ev-result">
            <div class="hc-result-item">
                <span>Yıllık Emlak Vergisi:</span>
                <strong class="hc-result-value" id="hc-ev-res-total">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Kültür Varlıkları Katkı Payı (%10):</span>
                <strong id="hc-ev-res-culture">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Ödenecek (Yıllık):</span>
                <strong id="hc-ev-res-grand">-</strong>
            </div>
        </div>
    </div>
    <?php
}
