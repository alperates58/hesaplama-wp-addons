<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_alkol_risk_testi( $atts ) {
    wp_enqueue_script(
        'hc-alkol-risk-testi',
        HC_PLUGIN_URL . 'modules/alkol-risk-testi/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-alkol-risk-testi-css',
        HC_PLUGIN_URL . 'modules/alkol-risk-testi/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-alkol-risk-testi">
        <h3>Alkol Kullanım Risk Testi (AUDIT)</h3>
        
        <div class="hc-audit-questions">
            <div class="hc-form-group">
                <label>1. Alkollü içecekleri ne sıklıkta kullanırsınız?</label>
                <select class="hc-audit-q" data-q="1">
                    <option value="0">Hiçbir zaman</option>
                    <option value="1">Ayda bir veya daha az</option>
                    <option value="2">Ayda 2-4 kez</option>
                    <option value="3">Haftada 2-3 kez</option>
                    <option value="4">Haftada 4 veya daha fazla</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label>2. Alkol aldığınız zaman bir seferde ortalama kaç kadeh/şişe içersiniz?</label>
                <select class="hc-audit-q" data-q="2">
                    <option value="0">1 veya 2</option>
                    <option value="1">3 veya 4</option>
                    <option value="2">5 veya 6</option>
                    <option value="3">7, 8 veya 9</option>
                    <option value="4">10 veya daha fazla</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label>3. Bir seferde 6 veya daha fazla standart içki içme sıklığınız nedir?</label>
                <select class="hc-audit-q" data-q="3">
                    <option value="0">Hiçbir zaman</option>
                    <option value="1">Ayda birden daha az</option>
                    <option value="2">Ayda bir</option>
                    <option value="3">Haftada bir</option>
                    <option value="4">Günlük veya hemen hemen her gün</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label>4. Geçtiğimiz yıl içinde kaç kez içmeye başladıktan sonra alkol alımını durduramadınız?</label>
                <select class="hc-audit-q" data-q="4">
                    <option value="0">Hiçbir zaman</option>
                    <option value="1">Ayda birden daha az</option>
                    <option value="2">Ayda bir</option>
                    <option value="3">Haftada bir</option>
                    <option value="4">Günlük veya hemen hemen her gün</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label>5. Geçtiğimiz yıl içinde alkollü içki içmeniz nedeniyle normalde sizden bekleneni yapmakta kaç kez başarısız oldunuz?</label>
                <select class="hc-audit-q" data-q="5">
                    <option value="0">Hiçbir zaman</option>
                    <option value="1">Ayda birden daha az</option>
                    <option value="2">Ayda bir</option>
                    <option value="3">Haftada bir</option>
                    <option value="4">Günlük veya hemen hemen her gün</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label>6. Geçtiğimiz yıl, içki içtiğiniz bir gecenin sabahında kendinize gelebilmek için alkollü bir içki almanızın gerektiği durumlar oldu mu?</label>
                <select class="hc-audit-q" data-q="6">
                    <option value="0">Hiçbir zaman</option>
                    <option value="1">Ayda birden daha az</option>
                    <option value="2">Ayda bir</option>
                    <option value="3">Haftada bir</option>
                    <option value="4">Günlük veya hemen hemen her gün</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label>7. Geçtiğimiz yıl kaç kez alkollü bir içki içtikten sonra suçluluk veya pişmanlık duyduğunuz oldu?</label>
                <select class="hc-audit-q" data-q="7">
                    <option value="0">Hiçbir zaman</option>
                    <option value="1">Ayda birden daha az</option>
                    <option value="2">Ayda bir</option>
                    <option value="3">Haftada bir</option>
                    <option value="4">Günlük veya hemen hemen her gün</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label>8. Geçtiğimiz yıl içinde ne sıklıkla alkollü içki içtiğiniz için ertesi sabah bir önceki gece olanları hatırlayamadınız?</label>
                <select class="hc-audit-q" data-q="8">
                    <option value="0">Hiçbir zaman</option>
                    <option value="1">Ayda birden daha az</option>
                    <option value="2">Ayda bir</option>
                    <option value="3">Haftada bir</option>
                    <option value="4">Günlük veya hemen hemen her gün</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label>9. Siz veya bir başkası, sizin alkol almanız yüzünden yaralandı mı?</label>
                <select class="hc-audit-q" data-q="9">
                    <option value="0">Hayır</option>
                    <option value="2">Evet ama geçtiğimiz yıl içinde değil</option>
                    <option value="4">Evet geçtiğimiz yıl içinde</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label>10. Bir arkadaşınız, bir doktor veya başka bir sağlık çalışanı size alkol almayı kesmenizi veya azaltmanızı önerdi mi?</label>
                <select class="hc-audit-q" data-q="10">
                    <option value="0">Hayır</option>
                    <option value="2">Evet ama geçtiğimiz yıl içinde değil</option>
                    <option value="4">Evet geçtiğimiz yıl içinde</option>
                </select>
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcFullAuditHesapla()">Testi Tamamla</button>
        
        <div class="hc-result" id="hc-alkol-risk-testi-result">
            <div style="text-align: center;">
                <span style="display: block; font-size: 14px; color: var(--hc-front-muted);">Toplam AUDIT Skoru</span>
                <span class="hc-result-value" id="hc-audit-res-puan">0</span>
            </div>
            
            <div id="hc-audit-res-yorum" style="margin-top: 20px; padding: 18px; border-radius: 12px; font-size: 15px; line-height: 1.6;">
            </div>

            <p style="font-size: 12px; color: var(--hc-front-muted); margin-top: 15px; font-style: italic;">
                * Bu test bir tarama aracıdır. Elde edilen puanlar alkol kullanımınızın risk düzeyini gösterir. Kesin tanı için bir psikiyatri uzmanına başvurunuz.
            </p>
        </div>
    </div>
    <?php
}
