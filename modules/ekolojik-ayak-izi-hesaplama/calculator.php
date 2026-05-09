<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ekolojik_ayak_izi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-eko-ayak',
        HC_PLUGIN_URL . 'modules/ekolojik-ayak-izi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-eko-ayak-css',
        HC_PLUGIN_URL . 'modules/ekolojik-ayak-izi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-eko-ayak">
        <h3>Ekolojik Ayak İzi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-eko-food">Beslenme Düzeni</label>
            <select id="hc-eko-food">
                <option value="meat-heavy">Et Ağırlıklı (Hemen her öğün)</option>
                <option value="average">Dengeli (Haftada birkaç gün et)</option>
                <option value="vegetarian">Vejetaryen</option>
                <option value="vegan">Vegan</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-eko-transport">Yıllık Ortalama Sürüş (km)</label>
            <input type="number" id="hc-eko-transport" placeholder="Örn: 10000" min="0" value="10000">
        </div>
        <div class="hc-form-group">
            <label for="hc-eko-energy">Aylık Elektrik Faturası (TL)</label>
            <input type="number" id="hc-eko-energy" placeholder="Örn: 500" min="0" value="500">
        </div>
        <button class="hc-btn" onclick="hcEkoAyakHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-eko-ayak-result">
            <div class="hc-result-item">
                <span>Ekolojik Ayak İziniz:</span>
                <span class="hc-result-value" id="hc-res-eko-gha">0 gha</span>
            </div>
            <div class="hc-res-note">
                <p id="hc-res-eko-earth">Eğer herkes sizin gibi yaşasaydı, bize <strong>0</strong> dünya gerekirdi.</p>
            </div>
        </div>
    </div>
    <?php
}
