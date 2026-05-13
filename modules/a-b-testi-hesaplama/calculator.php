<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_a_b_testi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-a-b-testi-hesaplama',
        HC_PLUGIN_URL . 'modules/a-b-testi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-a-b-testi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/a-b-testi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ab-calc">
        <h3>A/B Testi Hesaplama</h3>
        <div class="hc-ab-grid">
            <div class="hc-ab-col">
                <h4>Versiyon A (Kontrol)</h4>
                <div class="hc-form-group">
                    <label>Ziyaretçi Sayısı:</label>
                    <input type="number" id="hc-ab-vis-a" class="hc-input" placeholder="Örn: 1000">
                </div>
                <div class="hc-form-group">
                    <label>Dönüşüm Sayısı:</label>
                    <input type="number" id="hc-ab-conv-a" class="hc-input" placeholder="Örn: 50">
                </div>
            </div>
            <div class="hc-ab-col">
                <h4>Versiyon B (Varyant)</h4>
                <div class="hc-form-group">
                    <label>Ziyaretçi Sayısı:</label>
                    <input type="number" id="hc-ab-vis-b" class="hc-input" placeholder="Örn: 1000">
                </div>
                <div class="hc-form-group">
                    <label>Dönüşüm Sayısı:</label>
                    <input type="number" id="hc-ab-conv-b" class="hc-input" placeholder="Örn: 65">
                </div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcABTestHesapla()">Test Et</button>
        <div class="hc-result" id="hc-a-b-testi-hesaplama-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>A Dönüşüm Oranı:</span>
                    <strong id="hc-res-ab-cra">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>B Dönüşüm Oranı:</span>
                    <strong id="hc-res-ab-crb">-</strong>
                </div>
            </div>
            <div class="hc-ab-summary">
                <div class="hc-ab-lift">İyileşme (Lift): <strong id="hc-res-ab-lift">-</strong></div>
                <div class="hc-ab-sig">Güven Düzeyi: <strong id="hc-res-ab-conf">-</strong></div>
                <p id="hc-res-ab-desc" style="margin-top:10px; font-weight:bold;"></p>
            </div>
        </div>
    </div>
    <?php
}
