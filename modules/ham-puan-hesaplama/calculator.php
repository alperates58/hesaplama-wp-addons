<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ham_puan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ham-puan-hesaplama',
        HC_PLUGIN_URL . 'modules/ham-puan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ham-puan-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ham-puan-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ham-puan">
        <h3>Ham Puan (Net) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hp-correct">Doğru Sayısı:</label>
            <input type="number" id="hc-hp-correct" class="hc-input" placeholder="Örn: 35">
        </div>
        <div class="hc-form-group">
            <label for="hc-hp-wrong">Yanlış Sayısı:</label>
            <input type="number" id="hc-hp-wrong" class="hc-input" placeholder="Örn: 4">
        </div>
        <div class="hc-form-group">
            <label for="hc-hp-factor">Yanlış Götürme Oranı (1 Yanlış Kaç Doğruyu Götürür?):</label>
            <select id="hc-hp-factor" class="hc-input">
                <option value="3">3 Yanlış 1 Doğruyu Götürür (0.33)</option>
                <option value="4" selected>4 Yanlış 1 Doğruyu Götürür (0.25)</option>
                <option value="0">Yanlışlar Doğruları Götürmez</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcHamPuanHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ham-puan-result">
            <div class="hc-result-label">Net (Ham) Puan:</div>
            <div class="hc-result-value" id="hc-res-hp-net">-</div>
            <p id="hc-hp-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
