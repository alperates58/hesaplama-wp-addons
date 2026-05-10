<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kopek_yasam_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kopek-yasam',
        HC_PLUGIN_URL . 'modules/kopek-yasam-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kopek-yasam-css',
        HC_PLUGIN_URL . 'modules/kopek-yasam-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kopek-yasam">
        <h3>Köpek Yaşam Süresi Tahmini</h3>
        <div class="hc-form-group">
            <label for="hc-kys-size">Irk Boyutu:</label>
            <select id="hc-kys-size">
                <option value="15">Küçük Irk (Örn: Terrier, Poodle)</option>
                <option value="13">Orta Irk (Örn: Beagle, Bulldog)</option>
                <option value="11">Büyük Irk (Örn: Golden Retriever, GSD)</option>
                <option value="9">Dev Irk (Örn: Great Dane, Mastiff)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKopekYasamHesapla()">Tahmin Et</button>
        <div class="hc-result" id="hc-kopek-yasam-result">
            <strong>Tahmini Yaşam Süresi:</strong>
            <div id="hc-kys-res-val" class="hc-result-value">-</div>
            <span>Yıl</span>
            <p style="margin-top:10px; font-size:0.8rem; opacity:0.8;">Düzenli veteriner kontrolü ve sağlıklı beslenme bu süreyi uzatabilir.</p>
        </div>
    </div>
    <?php
}
