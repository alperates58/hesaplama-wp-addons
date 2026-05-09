<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sarj_dongusu_omru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cycle-life',
        HC_PLUGIN_URL . 'modules/sarj-dongusu-omru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cycle-life-css',
        HC_PLUGIN_URL . 'modules/sarj-dongusu-omru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cycle-life">
        <h3>Pil Döngü Ömrü Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-cl-total">Nominal Döngü Ömrü (Cycle)</label>
            <input type="number" id="hc-cl-total" placeholder="Örn: 3000" value="3000" step="10">
            <small>Katalog verisi (Genellikle %80 DoD için).</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-cl-dod">Ortalama Deşarj Derinliği (DoD %)</label>
            <input type="number" id="hc-cl-dod" value="80" step="1">
            <small>Pili her seferinde ne kadar bitiriyorsunuz?</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-cl-freq">Günlük Döngü Sayısı</label>
            <input type="number" id="hc-cl-freq" value="1" step="0.1">
        </div>

        <button class="hc-btn" onclick="hcDonguHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-cl-result">
            <div class="hc-result-item">
                <span>Tahmini Toplam Ömür:</span>
                <span class="hc-result-value highlight" id="hc-res-cl-years">-</span>
            </div>
            <div class="hc-result-item">
                <span>Tahmini Toplam Döngü:</span>
                <span class="hc-result-value" id="hc-res-cl-total">-</span>
            </div>
            <div class="hc-result-note">
                * Deşarj derinliği azaldıkça pilin çevrim ömrü logaritmik olarak artar.
            </div>
        </div>
    </div>
    <?php
}
