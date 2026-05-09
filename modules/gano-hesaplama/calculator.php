<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gano_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gano-hesaplama',
        HC_PLUGIN_URL . 'modules/gano-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-gano-calc">
        <h3>GANO Hesaplama</h3>
        <p style="font-size: 13px; color: #666; margin-bottom: 20px;">Dönemlik ortalamalarınızı ve o dönemdeki toplam kredilerinizi girin.</p>
        <div id="hc-gano-semesters">
            <div class="hc-form-group hc-gano-row" style="display: flex; gap: 10px; margin-bottom: 10px;">
                <input type="number" step="0.01" class="hc-gano-avg" placeholder="Dönem Ort." style="flex: 1;">
                <input type="number" step="1" class="hc-gano-credit" placeholder="Toplam Kredi" style="flex: 1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcGanoAddRow()" style="background: var(--hc-front-muted); margin-bottom: 10px;">+ Dönem Ekle</button>
        <button class="hc-btn" onclick="hcGanoHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-gano-result">
            <div class="hc-result-title">Genel Ortalama (GANO):</div>
            <div class="hc-result-value" id="hc-gano-val">-</div>
        </div>
    </div>
    <?php
}
