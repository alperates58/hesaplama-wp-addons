<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lgs_puan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lgs-calc',
        HC_PLUGIN_URL . 'modules/lgs-puan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lgs-calc-box">
        <h3>LGS Puan Hesaplama</h3>
        <div class="hc-form-section">
            <div class="hc-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div class="hc-form-group"><label>Türkçe (20)</label><input type="number" id="hc-lgs-tur" placeholder="Doğru"></div>
                <div class="hc-form-group"><label>Yanlış</label><input type="number" id="hc-lgs-tur-y" placeholder="Yanlış"></div>
                
                <div class="hc-form-group"><label>Matematik (20)</label><input type="number" id="hc-lgs-mat" placeholder="Doğru"></div>
                <div class="hc-form-group"><label>Yanlış</label><input type="number" id="hc-lgs-mat-y" placeholder="Yanlış"></div>
                
                <div class="hc-form-group"><label>Fen (20)</label><input type="number" id="hc-lgs-fen" placeholder="Doğru"></div>
                <div class="hc-form-group"><label>Yanlış</label><input type="number" id="hc-lgs-fen-y" placeholder="Yanlış"></div>
                
                <div class="hc-form-group"><label>İnkılap (10)</label><input type="number" id="hc-lgs-ink" placeholder="Doğru"></div>
                <div class="hc-form-group"><label>Yanlış</label><input type="number" id="hc-lgs-ink-y" placeholder="Yanlış"></div>
                
                <div class="hc-form-group"><label>Din (10)</label><input type="number" id="hc-lgs-din" placeholder="Doğru"></div>
                <div class="hc-form-group"><label>Yanlış</label><input type="number" id="hc-lgs-din-y" placeholder="Yanlış"></div>
                
                <div class="hc-form-group"><label>Y. Dil (10)</label><input type="number" id="hc-lgs-ing" placeholder="Doğru"></div>
                <div class="hc-form-group"><label>Yanlış</label><input type="number" id="hc-lgs-ing-y" placeholder="Yanlış"></div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcLgsHesapla()">Puanı Hesapla</button>
        <div class="hc-result" id="hc-lgs-result">
            <div class="hc-result-title">Tahmini LGS Puanı:</div>
            <div class="hc-result-value" id="hc-lgs-val">-</div>
            <p style="font-size: 12px; margin-top: 10px; color: #666;">* 3 yanlış 1 doğruyu götürür. Katsayılar: T:4, M:4, F:4, İ:1, D:1, Y:1.</p>
        </div>
    </div>
    <?php
}
