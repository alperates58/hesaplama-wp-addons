<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_audit_c_testi( $atts ) {
    wp_enqueue_script(
        'hc-audit-c-testi',
        HC_PLUGIN_URL . 'modules/audit-c-testi/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-audit-c-testi-css',
        HC_PLUGIN_URL . 'modules/audit-c-testi/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-audit-c-testi">
        <h3>AUDIT-C Alkol Kullanım Risk Testi</h3>
        
        <div class="hc-form-group">
            <label for="hc-auditc-cinsiyet">Cinsiyetiniz</label>
            <select id="hc-auditc-cinsiyet">
                <option value="erkek">Erkek</option>
                <option value="kadin">Kadın</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>1. Geçen yıl içinde ne sıklıkla alkol içeren bir içki içtiniz?</label>
            <select class="hc-auditc-q" id="hc-auditc-q1">
                <option value="0">Asla</option>
                <option value="1">Ayda bir veya daha az</option>
                <option value="2">Ayda iki ila dört kez</option>
                <option value="3">Haftada iki ila üç kez</option>
                <option value="4">Haftada dört veya daha fazla</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>2. Geçen yıl içerken, normal bir günde kaç tane alkol içeren içki içtiniz?</label>
            <select class="hc-auditc-q" id="hc-auditc-q2">
                <option value="0">1 veya 2 içecek</option>
                <option value="1">3 veya 4 içecek</option>
                <option value="2">5 veya 6 içecek</option>
                <option value="3">7 ila 9 içecek</option>
                <option value="4">10 veya daha fazla içecek</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>3. Geçen yıl bir kerede ne sıklıkla altı veya daha fazla içki içtiniz?</label>
            <select class="hc-auditc-q" id="hc-auditc-q3">
                <option value="0">Asla</option>
                <option value="1">Ayda birden daha az</option>
                <option value="2">Ayda bir</option>
                <option value="3">Haftada bir</option>
                <option value="4">Günlük veya neredeyse her gün</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcAuditCHesapla()">Sonucu Gör</button>
        
        <div class="hc-result" id="hc-audit-c-testi-result">
            <div style="text-align: center;">
                <span style="display: block; font-size: 14px; color: var(--hc-front-muted);">Toplam Puan</span>
                <span class="hc-result-value" id="hc-auditc-res-puan">0</span>
            </div>
            
            <div id="hc-auditc-res-yorum" style="margin-top: 20px; padding: 18px; border-radius: 12px; font-size: 15px; line-height: 1.6; text-align: center;">
            </div>

            <p style="font-size: 12px; color: var(--hc-front-muted); margin-top: 15px; font-style: italic;">
                * Bu test bir tarama aracıdır. Elde edilen yüksek puanlar alkol kullanımı ile ilgili sağlık riski taşıdığınızı gösterir. Detaylı değerlendirme için bir uzmana başvurmalısınız.
            </p>
        </div>
    </div>
    <?php
}
