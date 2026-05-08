<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_limited_sirket_vergi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ltd-vergi',
        HC_PLUGIN_URL . 'modules/limited-sirket-vergi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ltd-vergi-css',
        HC_PLUGIN_URL . 'modules/limited-sirket-vergi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-limited-sirket-vergi-hesaplama">
        <h3>Limited Şirket Vergi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ls-profit">Yıllık Vergi Öncesi Kar (TL)</label>
            <input type="number" id="hc-ls-profit" placeholder="Gelir - Gider">
        </div>

        <div class="hc-form-group">
            <label for="hc-ls-dist">Kar Dağıtımı Yapılacak mı?</label>
            <select id="hc-ls-dist">
                <option value="0">Hayır (Sadece Kurumlar Vergisi)</option>
                <option value="1">Evet (Tamamı Dağıtılacak - %10 Stopaj)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcLtdVergiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ltd-result">
            <div class="hc-result-item">
                <span>Kurumlar Vergisi (%25):</span>
                <strong id="hc-ls-res-kv">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Kar Dağıtım Stopajı:</span>
                <strong id="hc-ls-res-stopaj">-</strong>
            </div>
            <div class="hc-result-value" id="hc-ls-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam Vergi Yükü</p>
        </div>
    </div>
    <?php
}
