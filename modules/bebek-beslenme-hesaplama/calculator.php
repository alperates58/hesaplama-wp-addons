<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bebek_beslenme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bebek-beslenme',
        HC_PLUGIN_URL . 'modules/bebek-beslenme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bebek-beslenme-css',
        HC_PLUGIN_URL . 'modules/bebek-beslenme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bebek-beslenme">
        <h3>Bebek Beslenme İhtiyacı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-bb-kilo">Bebeğinizin Ağırlığı (kg)</label>
            <input type="number" id="hc-bb-kilo" placeholder="Örn: 5.5" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-bb-ogun">Günde Kaç Öğün Besleniyor?</label>
            <select id="hc-bb-ogun">
                <option value="6">6 Öğün (4 Saatte Bir)</option>
                <option value="8" selected>8 Öğün (3 Saatte Bir)</option>
                <option value="10">10 Öğün (2.5 Saatte Bir)</option>
                <option value="12">12 Öğün (2 Saatte Bir)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcBebekBeslenmeHesapla()">İhtiyacı Hesapla</button>
        
        <div class="hc-result" id="hc-bebek-beslenme-result">
            <div class="hc-feeding-summary">
                <div class="hc-feeding-card">
                    <span class="hc-f-label">Günlük Toplam İhtiyaç</span>
                    <strong class="hc-f-value" id="hc-res-bb-toplam">0 ml</strong>
                </div>
                <div class="hc-feeding-card primary">
                    <span class="hc-f-label">Öğün Başı Miktar</span>
                    <strong class="hc-f-value" id="hc-res-bb-ogun">0 ml</strong>
                </div>
            </div>

            <div style="margin-top: 20px; padding: 15px; background: rgba(15, 138, 95, 0.05); border-radius: 12px; color: var(--hc-front-green); font-size: 14px; line-height: 1.5;">
                <strong>Anne Sütü / Mama Bilgisi:</strong><br>
                Genel kural olarak bebekler kg başına günlük yaklaşık 150ml süte ihtiyaç duyarlar. Bu miktar bebeğin iştahına ve büyüme hızına göre 120-180ml arasında değişebilir.
            </div>

            <div style="margin-top: 15px; border-top: 1px dashed #dce5f0; padding-top: 15px;">
                <h4 style="font-size: 14px; margin-bottom: 10px;">Sağma Miktarı Tahmini</h4>
                <p style="font-size: 13px; color: var(--hc-front-muted);">
                    Eğer bebeğinizden uzaktaysanız, her sağma seansında hedeflemeniz gereken miktar yaklaşık: 
                    <strong id="hc-res-bb-sagma" style="color: var(--hc-front-text);">0 ml</strong>'dir.
                </p>
            </div>
        </div>
    </div>
    <?php
}
