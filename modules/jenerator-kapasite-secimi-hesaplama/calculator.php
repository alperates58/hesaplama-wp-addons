<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_jenerator_kapasite_secimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gen-sizing',
        HC_PLUGIN_URL . 'modules/jenerator-kapasite-secimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gen-sizing-css',
        HC_PLUGIN_URL . 'modules/jenerator-kapasite-secimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gen-sizing">
        <h3>Jeneratör Kapasite Seçimi</h3>
        
        <div id="hc-gs-loads">
            <div class="hc-gs-row">
                <input type="text" placeholder="Cihaz Adı" class="hc-gs-name" value="Aydınlatma">
                <input type="number" placeholder="Watt" class="hc-gs-watt" value="500">
                <select class="hc-gs-type">
                    <option value="1">Rezistif (Lamba, Isıtıcı)</option>
                    <option value="3">Endüktif (Motor, Klima)</option>
                </select>
            </div>
        </div>

        <button class="hc-btn-secondary" onclick="hcGSEkle()">+ Cihaz Ekle</button>
        <button class="hc-btn" onclick="hcJenKapasiteHesapla()">Kapasite Öner</button>

        <div class="hc-result" id="hc-gs-result">
            <div class="hc-result-item">
                <span>Toplam Çalışma Yükü:</span>
                <span class="hc-result-value" id="hc-res-gs-load">-</span>
            </div>
            <div class="hc-result-item">
                <span>Demeraj (Kalkış) Yükü:</span>
                <span class="hc-result-value" id="hc-res-gs-start">-</span>
            </div>
            <div class="hc-result-item">
                <span>Önerilen Jeneratör:</span>
                <span class="hc-result-value highlight" id="hc-res-gs-rec">-</span>
            </div>
            <div class="hc-result-note">
                * Güç faktörü (cos φ) 0.8 olarak baz alınmıştır.
            </div>
        </div>
    </div>
    <?php
}
