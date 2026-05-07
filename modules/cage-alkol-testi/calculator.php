<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cage_alkol_testi( $atts ) {
    wp_enqueue_script(
        'hc-cage-alkol-testi',
        HC_PLUGIN_URL . 'modules/cage-alkol-testi/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cage-alkol-testi-css',
        HC_PLUGIN_URL . 'modules/cage-alkol-testi/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cage-alkol-testi">
        <h3>CAGE Alkol Risk Testi</h3>
        
        <div class="hc-form-group">
            <label>1. Hiç alkolü azaltmanız gerektiğini düşündüğünüz oldu mu?</label>
            <select class="hc-cage-q" id="hc-cage-q1">
                <option value="0">Hayır</option>
                <option value="1">Evet</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>2. Çevrenizdekiler içki içmenizle ilgili eleştirilerde bulunduğunda sizi rahatsız ettiler mi?</label>
            <select class="hc-cage-q" id="hc-cage-q2">
                <option value="0">Hayır</option>
                <option value="1">Evet</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>3. Hiç alkol aldığınız için kendinizi kötü veya suçlu hissettiniz mi?</label>
            <select class="hc-cage-q" id="hc-cage-q3">
                <option value="0">Hayır</option>
                <option value="1">Evet</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>4. Sabah kalktığınızda kendinize gelmek için alkol aldığınız (Güne başlarken alkol) oldu mu?</label>
            <select class="hc-cage-q" id="hc-cage-q4">
                <option value="0">Hayır</option>
                <option value="1">Evet</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcCageHesapla()">Sonucu Gör</button>
        
        <div class="hc-result" id="hc-cage-alkol-testi-result">
            <div style="text-align: center;">
                <span style="display: block; font-size: 14px; color: var(--hc-front-muted);">Evet Sayısı</span>
                <span class="hc-result-value" id="hc-cage-res-puan">0</span>
            </div>
            
            <div id="hc-cage-res-yorum" style="margin-top: 20px; padding: 18px; border-radius: 12px; font-size: 15px; line-height: 1.6; text-align: center;">
            </div>

            <p style="font-size: 12px; color: var(--hc-front-muted); margin-top: 15px; font-style: italic;">
                * CAGE testi dünyada yaygın olarak kullanılan bir tarama testidir. 2 ve üzeri "Evet" cevabı klinik değerlendirme gerektiren bir duruma işaret eder.
            </p>
        </div>
    </div>
    <?php
}
