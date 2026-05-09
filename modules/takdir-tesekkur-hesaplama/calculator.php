<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_takdir_tesekkur_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-takdir-tesekkur',
        HC_PLUGIN_URL . 'modules/takdir-tesekkur-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tt-calc">
        <h3>Takdir Teşekkür Hesaplama</h3>
        <div class="hc-form-group">
            <label>Dönem Ortalaması</label>
            <input type="number" step="0.01" id="hc-tt-avg" placeholder="0-100">
        </div>
        <div class="hc-form-group">
            <label>Zayıf Dersiniz Var mı?</label>
            <select id="hc-tt-fails">
                <option value="no">Hayır</option>
                <option value="yes">Evet</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcTtHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tt-result">
            <div class="hc-result-title">Belge Durumu:</div>
            <div class="hc-result-value" id="hc-tt-val">-</div>
        </div>
    </div>
    <?php
}
