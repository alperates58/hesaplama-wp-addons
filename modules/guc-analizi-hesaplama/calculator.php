<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_guc_analizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-guc-analizi-hesaplama',
        HC_PLUGIN_URL . 'modules/guc-analizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-guc-analizi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/guc-analizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-power-analysis">
        <h3>İstatistiksel Güç Analizi (Z-Testi)</h3>
        <div class="hc-form-group">
            <label for="hc-pwr-alpha">Anlamlılık Düzeyi (α):</label>
            <select id="hc-pwr-alpha" class="hc-input">
                <option value="0.01">0.01 (%99)</option>
                <option value="0.05" selected>0.05 (%95)</option>
                <option value="0.10">0.10 (%90)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-pwr-effect">Etki Büyüklüğü (Cohen's d):</label>
            <input type="number" id="hc-pwr-effect" class="hc-input" placeholder="Örn: 0.5 (Orta)" step="0.1" value="0.5">
            <small style="color: #666;">(0.2: Küçük, 0.5: Orta, 0.8: Büyük)</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-pwr-n">Örneklem Boyutu (n):</label>
            <input type="number" id="hc-pwr-n" class="hc-input" placeholder="Örn: 30" value="30">
        </div>
        <button class="hc-btn" onclick="hcGucAnaliziHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-guc-analizi-result">
            <div class="hc-result-label">İstatistiksel Güç (1 - β):</div>
            <div class="hc-result-value" id="hc-res-pwr-val">-</div>
            <p id="hc-pwr-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
