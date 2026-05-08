<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yks_puan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yks-calc',
        HC_PLUGIN_URL . 'modules/yks-puan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-yks-calc-box">
        <h3>YKS (TYT-AYT) Puan Hesaplama</h3>
        
        <div class="hc-form-section">
            <h4>TYT Netleri</h4>
            <div class="hc-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div class="hc-form-group"><label>Türkçe (40)</label><input type="number" id="hc-yks-tyt-tur" placeholder="Doğru"></div>
                <div class="hc-form-group"><label>Yanlış</label><input type="number" id="hc-yks-tyt-tur-y" placeholder="Yanlış"></div>
                
                <div class="hc-form-group"><label>Sosyal (20)</label><input type="number" id="hc-yks-tyt-sos" placeholder="Doğru"></div>
                <div class="hc-form-group"><label>Yanlış</label><input type="number" id="hc-yks-tyt-sos-y" placeholder="Yanlış"></div>
                
                <div class="hc-form-group"><label>Matematik (40)</label><input type="number" id="hc-yks-tyt-mat" placeholder="Doğru"></div>
                <div class="hc-form-group"><label>Yanlış</label><input type="number" id="hc-yks-tyt-mat-y" placeholder="Yanlış"></div>
                
                <div class="hc-form-group"><label>Fen (20)</label><input type="number" id="hc-yks-tyt-fen" placeholder="Doğru"></div>
                <div class="hc-form-group"><label>Yanlış</label><input type="number" id="hc-yks-tyt-fen-y" placeholder="Yanlış"></div>
            </div>
        </div>

        <div class="hc-form-section">
            <h4>AYT Netleri</h4>
            <div class="hc-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div class="hc-form-group"><label>Matematik (40)</label><input type="number" id="hc-yks-ayt-mat" placeholder="Doğru"></div>
                <div class="hc-form-group"><label>Yanlış</label><input type="number" id="hc-yks-ayt-mat-y" placeholder="Yanlış"></div>
                
                <div class="hc-form-group"><label>Ed-Sos1 (40)</label><input type="number" id="hc-yks-ayt-ed" placeholder="Doğru"></div>
                <div class="hc-form-group"><label>Yanlış</label><input type="number" id="hc-yks-ayt-ed-y" placeholder="Yanlış"></div>
                
                <div class="hc-form-group"><label>Sos2 (40)</label><input type="number" id="hc-yks-ayt-sos2" placeholder="Doğru"></div>
                <div class="hc-form-group"><label>Yanlış</label><input type="number" id="hc-yks-ayt-sos2-y" placeholder="Yanlış"></div>
                
                <div class="hc-form-group"><label>Fen (40)</label><input type="number" id="hc-yks-ayt-fen" placeholder="Doğru"></div>
                <div class="hc-form-group"><label>Yanlış</label><input type="number" id="hc-yks-ayt-fen-y" placeholder="Yanlış"></div>
            </div>
        </div>

        <div class="hc-form-group">
            <label>Diploma Notu (100 üzerinden)</label>
            <input type="number" step="0.01" id="hc-yks-diploma" placeholder="Örn: 85.50">
        </div>

        <button class="hc-btn" onclick="hcYksHesapla()">Puanları Hesapla</button>
        
        <div class="hc-result" id="hc-yks-result">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div><strong>TYT:</strong> <span id="hc-yks-res-tyt">-</span></div>
                <div><strong>SAY:</strong> <span id="hc-yks-res-say">-</span></div>
                <div><strong>SÖZ:</strong> <span id="hc-yks-res-soz">-</span></div>
                <div><strong>EA:</strong> <span id="hc-yks-res-ea">-</span></div>
            </div>
            <p style="font-size: 12px; margin-top: 15px; color: #666;">* Puanlara OBP (%12) dahil edilmiştir.</p>
        </div>
    </div>
    <?php
}
