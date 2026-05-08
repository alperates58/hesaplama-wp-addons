<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gebelik_testi_zamani( $atts ) {
    wp_enqueue_script(
        'hc-test-timing',
        HC_PLUGIN_URL . 'modules/gebelik-testi-zamani/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-test-box">
        <h3>Gebelik Testi Ne Zaman Yapılmalı?</h3>
        
        <div class="hc-form-group">
            <label for="hc-gt-lmp">Son Adet Tarihi (SAT)</label>
            <input type="date" id="hc-gt-lmp">
        </div>

        <div class="hc-form-group">
            <label for="hc-gt-cycle">Ortalama Döngü Süresi (Gün)</label>
            <input type="number" id="hc-gt-cycle" value="28">
        </div>

        <button class="hc-btn" onclick="hcTestZamaniHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-test-timing-result">
            <div class="hc-result-item">
                <span>Kan Testi (Beta hCG):</span>
                <strong id="hc-gt-blood">-</strong>
            </div>
            <div class="hc-result-item">
                <span>İdrar Testi:</span>
                <strong id="hc-gt-urine">-</strong>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px; border-top: 1px solid #eee; padding-top: 10px;">
                *Kan testi daha erken sonuç verir. İdrar testi için adet gecikmesini beklemek en doğru sonucu (yalancı negatifliği önlemek için) sağlar.
            </p>
        </div>
    </div>
    <?php
}
