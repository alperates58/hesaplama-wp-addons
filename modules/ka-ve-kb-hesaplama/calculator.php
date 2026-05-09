<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ka_ve_kb_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ka-kb',
        HC_PLUGIN_URL . 'modules/ka-ve-kb-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ka-kb-css',
        HC_PLUGIN_URL . 'modules/ka-ve-kb-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ka-kb">
        <h3>Ka / Kb Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-kk-type">Giriş Türü</label>
            <select id="hc-kk-type">
                <option value="ka">Ka</option>
                <option value="pka">pKa</option>
                <option value="kb">Kb</option>
                <option value="pkb">pKb</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-kk-val">Değer</label>
            <input type="number" id="hc-kk-val" placeholder="Örn: 1.8e-5" step="any">
        </div>
        <button class="hc-btn" onclick="hcKAKBHesapla()">Dönüştür</button>
        <div class="hc-result" id="hc-kk-result">
            <div class="hc-kk-grid">
                <div class="hc-kk-item"><span>Ka:</span> <span id="hc-kk-res-ka">-</span></div>
                <div class="hc-kk-item"><span>pKa:</span> <span id="hc-kk-res-pka">-</span></div>
                <div class="hc-kk-item"><span>Kb:</span> <span id="hc-kk-res-kb">-</span></div>
                <div class="hc-kk-item"><span>pKb:</span> <span id="hc-kk-res-pkb">-</span></div>
            </div>
            <div class="hc-result-note">Kw = 1.0e-14 (25°C) baz alınmıştır.</div>
        </div>
    </div>
    <?php
}
