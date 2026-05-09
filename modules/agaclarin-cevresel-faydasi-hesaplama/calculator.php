<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_agaclarin_cevresel_faydasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-agac-fayda',
        HC_PLUGIN_URL . 'modules/agaclarin-cevresel-faydasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-agac-fayda-css',
        HC_PLUGIN_URL . 'modules/agaclarin-cevresel-faydasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-agac-fayda">
        <h3>Ağaçların Çevresel Faydası Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-benefit-tree-count">Ağaç Sayısı</label>
            <input type="number" id="hc-benefit-tree-count" placeholder="Örn: 5" min="1" value="1">
        </div>
        <button class="hc-btn" onclick="hcAgacFaydaHesapla()">Faydaları Hesapla</button>
        <div class="hc-result" id="hc-agac-fayda-result">
            <div class="hc-benefit-grid">
                <div class="hc-benefit-card">
                    <span class="hc-icon">O₂</span>
                    <h4>Oksijen Üretimi</h4>
                    <p id="hc-res-oxygen">0 kişi/gün</p>
                    <small>Günlük kaç kişinin oksijen ihtiyacını karşıladığı.</small>
                </div>
                <div class="hc-benefit-card">
                    <span class="hc-icon">❄️</span>
                    <h4>Soğutma Etkisi</h4>
                    <p id="hc-res-cooling">0 kWh</p>
                    <small>Yıllık tasarruf edilen klima enerjisi eşdeğeri.</small>
                </div>
                <div class="hc-benefit-card">
                    <span class="hc-icon">💧</span>
                    <h4>Su Tutma</h4>
                    <p id="hc-res-water">0 Litre</p>
                    <small>Yıllık yüzey akışını önleme ve su filtreleme.</small>
                </div>
            </div>
        </div>
    </div>
    <?php
}
