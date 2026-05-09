<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dinlenme_metabolizma_hizi( $atts ) {
    wp_enqueue_script(
        'hc-dinlenme-metabolizma',
        HC_PLUGIN_URL . 'modules/dinlenme-metabolizma-hizi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-dinlenme-metabolizma">
        <h3>Dinlenme Metabolizma Hızı (RMR)</h3>
        
        <div class="hc-form-group">
            <label for="hc-rmr-cinsiyet">Cinsiyet</label>
            <select id="hc-rmr-cinsiyet">
                <option value="erkek">Erkek</option>
                <option value="kadin">Kadın</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-rmr-yas">Yaş</label>
            <input type="number" id="hc-rmr-yas" placeholder="Yaş">
        </div>

        <div class="hc-form-group">
            <label for="hc-rmr-boy">Boy (cm)</label>
            <input type="number" id="hc-rmr-boy" placeholder="cm">
        </div>

        <div class="hc-form-group">
            <label for="hc-rmr-kilo">Kilo (kg)</label>
            <input type="number" id="hc-rmr-kilo" placeholder="kg">
        </div>

        <button class="hc-btn" onclick="hcDinlenmeMetabolizmaHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-dinlenme-metabolizma-result">
            <span>Tahmini Dinlenme Metabolizma Hızınız:</span>
            <div class="hc-result-value" id="hc-rmr-value">-</div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *RMR (Resting Metabolic Rate), vücudun sindirim ve hafif hareket gibi temel olmayan ama düşük yoğunluklu aktiviteler dahil dinlenme anındaki kalori ihtiyacıdır.
            </p>
        </div>
    </div>
    <?php
}
