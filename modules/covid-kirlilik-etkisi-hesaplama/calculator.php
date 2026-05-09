<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_covid_kirlilik_etkisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-covid-poll',
        HC_PLUGIN_URL . 'modules/covid-kirlilik-etkisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-covid-poll-css',
        HC_PLUGIN_URL . 'modules/covid-kirlilik-etkisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-covid-poll">
        <h3>COVID Kirlilik Etkisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-covid-masks">Günlük Kullanılan Maske Sayısı</label>
            <input type="number" id="hc-covid-masks" placeholder="Örn: 2" min="0" value="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-covid-gloves">Günlük Kullanılan Eldiven Çifti</label>
            <input type="number" id="hc-covid-gloves" placeholder="Örn: 1" min="0" value="0">
        </div>
        <button class="hc-btn" onclick="hcCovidPollHesapla()">Kirlilik Etkisini Gör</button>
        <div class="hc-result" id="hc-covid-poll-result">
            <div class="hc-result-item">
                <span>Yıllık Plastik Atık:</span>
                <span class="hc-result-value" id="hc-res-covid-waste">0 kg</span>
            </div>
            <div class="hc-res-info">
                <p>Bu atıklar çoğunlukla polipropilen (plastik) içerir ve doğada çözünmesi yüzyıllar sürebilir.</p>
            </div>
        </div>
    </div>
    <?php
}
