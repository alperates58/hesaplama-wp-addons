<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_esnaf_vergi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-esnaf-vergi',
        HC_PLUGIN_URL . 'modules/esnaf-vergi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-esnaf-vergi-css',
        HC_PLUGIN_URL . 'modules/esnaf-vergi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-esnaf-vergi-hesaplama">
        <h3>Esnaf Vergi Hesaplama (2026)</h3>
        
        <div class="hc-form-group">
            <label for="hc-ev-profit">Yıllık Ticari Kazanç (Kar) (TL)</label>
            <input type="number" id="hc-ev-profit" placeholder="Gelir - Gider">
        </div>

        <div class="hc-form-group">
            <label for="hc-ev-type">Vergi Mükellefiyet Türü</label>
            <select id="hc-ev-type">
                <option value="simple">Basit Usul (Esnaf İstisnası Mevcut)</option>
                <option value="real">Gerçek Usul (İstisna Yok)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcEsnafVergiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-esnaf-result">
            <div class="hc-result-item">
                <span>İstisna Durumu:</span>
                <strong id="hc-ev-res-status">-</strong>
            </div>
            <div class="hc-result-value" id="hc-ev-res-tax">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Yıllık Ödenecek Gelir Vergisi</p>
        </div>
    </div>
    <?php
}
