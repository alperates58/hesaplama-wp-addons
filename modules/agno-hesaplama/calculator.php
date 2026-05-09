<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_agno_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-agno-hesaplama',
        HC_PLUGIN_URL . 'modules/agno-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-agno-calc">
        <h3>AGNO Hesaplama</h3>
        <div class="hc-form-group">
            <label>Önceki Toplam Kredi</label>
            <input type="number" id="hc-agno-prev-credits" placeholder="Dönem öncesi toplam kredi">
        </div>
        <div class="hc-form-group">
            <label>Önceki AGNO</label>
            <input type="number" step="0.01" id="hc-agno-prev-val" placeholder="Dönem öncesi ortalama">
        </div>
        <hr style="margin: 20px 0; border: 0; border-top: 1px solid #eee;">
        <div id="hc-agno-current-courses">
            <label>Bu Dönemki Dersler</label>
            <div class="hc-form-group hc-agno-row" style="display: flex; gap: 10px; margin-bottom: 10px;">
                <input type="number" step="0.01" class="hc-agno-grade" placeholder="Not (0-4)" style="flex: 1;">
                <input type="number" step="1" class="hc-agno-credit" placeholder="Kredi" style="flex: 1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcAgnoAddRow()" style="background: var(--hc-front-muted); margin-bottom: 10px;">+ Ders Ekle</button>
        <button class="hc-btn" onclick="hcAgnoHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-agno-result">
            <div class="hc-result-title">Yeni AGNO:</div>
            <div class="hc-result-value" id="hc-agno-val">-</div>
        </div>
    </div>
    <?php
}
