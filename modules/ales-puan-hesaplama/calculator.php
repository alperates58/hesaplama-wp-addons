<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ales_puan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ales-calc',
        HC_PLUGIN_URL . 'modules/ales-puan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ales-calc-box">
        <h3>ALES Puan Hesaplama</h3>
        <div class="hc-form-section">
            <div class="hc-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div class="hc-form-group"><label>Sayısal (50)</label><input type="number" id="hc-ales-say" placeholder="Doğru"></div>
                <div class="hc-form-group"><label>Yanlış</label><input type="number" id="hc-ales-say-y" placeholder="Yanlış"></div>
                
                <div class="hc-form-group"><label>Sözel (50)</label><input type="number" id="hc-ales-soz" placeholder="Doğru"></div>
                <div class="hc-form-group"><label>Yanlış</label><input type="number" id="hc-ales-soz-y" placeholder="Yanlış"></div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcAlesHesapla()">Puanları Hesapla</button>
        <div class="hc-result" id="hc-ales-result">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div><strong>ALES Sayısal:</strong> <span id="hc-ales-res-say">-</span></div>
                <div><strong>ALES Sözel:</strong> <span id="hc-ales-res-soz">-</span></div>
                <div><strong>ALES E.A.:</strong> <span id="hc-ales-res-ea">-</span></div>
            </div>
            <p style="font-size: 12px; margin-top: 15px; color: #666;">* Puanların hesaplanabilmesi için her iki testten de en az 1 net yapılmalıdır.</p>
        </div>
    </div>
    <?php
}
