<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dgs_puan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dgs-calc',
        HC_PLUGIN_URL . 'modules/dgs-puan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-dgs-calc-box">
        <h3>DGS Puan Hesaplama</h3>
        <div class="hc-form-section">
            <div class="hc-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div class="hc-form-group"><label>Sayısal (50)</label><input type="number" id="hc-dgs-say" placeholder="Doğru"></div>
                <div class="hc-form-group"><label>Yanlış</label><input type="number" id="hc-dgs-say-y" placeholder="Yanlış"></div>
                
                <div class="hc-form-group"><label>Sözel (50)</label><input type="number" id="hc-dgs-soz" placeholder="Doğru"></div>
                <div class="hc-form-group"><label>Yanlış</label><input type="number" id="hc-dgs-soz-y" placeholder="Yanlış"></div>
            </div>
        </div>
        <div class="hc-form-group">
            <label>Ön Lisans Başarı Puanı (ÖBP)</label>
            <input type="number" step="0.01" id="hc-dgs-obp" placeholder="Örn: 70.00">
            <p style="font-size: 11px; color: #888;">Diploma Notu * 0.8 * 5 şeklinde hesaplanır.</p>
        </div>
        <button class="hc-btn" onclick="hcDgsHesapla()">Puanları Hesapla</button>
        <div class="hc-result" id="hc-dgs-result">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div><strong>DGS Sayısal:</strong> <span id="hc-dgs-res-say">-</span></div>
                <div><strong>DGS Sözel:</strong> <span id="hc-dgs-res-soz">-</span></div>
                <div><strong>DGS E.A.:</strong> <span id="hc-dgs-res-ea">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
