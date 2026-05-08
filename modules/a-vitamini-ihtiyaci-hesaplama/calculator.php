<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_a_vitamini_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vit-a',
        HC_PLUGIN_URL . 'modules/a-vitamini-ihtiyaci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-vit-a">
        <h3>A Vitamini İhtiyacı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-va-cinsiyet">Cinsiyet</label>
            <select id="hc-va-cinsiyet">
                <option value="erkek">Erkek</option>
                <option value="kadin">Kadın</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-va-yas">Yaş</label>
            <input type="number" id="hc-va-yas" placeholder="Yaş">
        </div>

        <div class="hc-form-group">
            <label for="hc-va-durum">Özel Durum (Kadınlar İçin)</label>
            <select id="hc-va-durum">
                <option value="normal">Normal</option>
                <option value="gebe">Hamilelik</option>
                <option value="emzirme">Emzirme Dönemi</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcVitaminAHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-vit-a-result">
            <span>Günlük Önerilen A Vitamini (RAE):</span>
            <div class="hc-result-value" id="hc-va-value">-</div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *RAE (Retinol Aktivite Eşdeğeri). 1 mcg RAE = 3.33 IU. A vitamini yağda çözünen bir vitamin olduğu için aşırı alımı toksik etki yaratabilir.
            </p>
        </div>
    </div>
    <?php
}
