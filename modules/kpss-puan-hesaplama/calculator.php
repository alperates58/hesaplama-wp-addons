<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kpss_puan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kpss-calc',
        HC_PLUGIN_URL . 'modules/kpss-puan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-kpss-calc-box">
        <h3>KPSS Puan Hesaplama</h3>
        <div class="hc-form-section">
            <div class="hc-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div class="hc-form-group"><label>Genel Yetenek (60)</label><input type="number" id="hc-kpss-gy" placeholder="Doğru"></div>
                <div class="hc-form-group"><label>Yanlış</label><input type="number" id="hc-kpss-gy-y" placeholder="Yanlış"></div>
                
                <div class="hc-form-group"><label>Genel Kültür (60)</label><input type="number" id="hc-kpss-gk" placeholder="Doğru"></div>
                <div class="hc-form-group"><label>Yanlış</label><input type="number" id="hc-kpss-gk-y" placeholder="Yanlış"></div>
                
                <div class="hc-form-group"><label>Eğitim Bil. (80)</label><input type="number" id="hc-kpss-eb" placeholder="Doğru"></div>
                <div class="hc-form-group"><label>Yanlış</label><input type="number" id="hc-kpss-eb-y" placeholder="Yanlış"></div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcKpssHesapla()">Puanları Hesapla</button>
        <div class="hc-result" id="hc-kpss-result">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div><strong>KPSS P3 (Lisans):</strong> <span id="hc-kpss-res-p3">-</span></div>
                <div><strong>KPSS P93 (Ön Lisans):</strong> <span id="hc-kpss-res-p93">-</span></div>
                <div><strong>KPSS P94 (Ortaöğ.):</strong> <span id="hc-kpss-res-p94">-</span></div>
                <div><strong>KPSS P10 (Öğretmen):</strong> <span id="hc-kpss-res-p10">-</span></div>
            </div>
            <p style="font-size: 12px; margin-top: 15px; color: #666;">* 4 yanlış 1 doğruyu götürür. Katsayılar tahmini standart sapmaya göredir.</p>
        </div>
    </div>
    <?php
}
