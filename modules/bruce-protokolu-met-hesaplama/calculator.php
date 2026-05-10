<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bruce_protokolu_met_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bruce-met',
        HC_PLUGIN_URL . 'modules/bruce-protokolu-met-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bruce-met-css',
        HC_PLUGIN_URL . 'modules/bruce-protokolu-met-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bruce-met">
        <h3>Bruce Protokolü MET Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-bm-time">Toplam Süre (Dakika):</label>
            <input type="number" id="hc-bm-time" step="0.1" placeholder="10.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-bm-gender">Cinsiyet:</label>
            <select id="hc-bm-gender">
                <option value="male">Erkek</option>
                <option value="female">Kadın</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBruceMetHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bruce-met-result">
            <div class="hc-met-grid">
                <div class="hc-met-item">
                    <strong>MET Değeri</strong>
                    <div id="hc-bm-res-met">-</div>
                </div>
                <div class="hc-met-item">
                    <strong>VO₂ Max</strong>
                    <div id="hc-bm-res-vo2">-</div>
                </div>
            </div>
            <p style="margin-top:15px; font-size:0.8rem;">Bruce Protokolü efor testi standartlarına dayanır.</p>
        </div>
    </div>
    <?php
}
