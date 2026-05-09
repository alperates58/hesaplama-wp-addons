<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_alel_frekansi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-alel-frekansi-hesaplama',
        HC_PLUGIN_URL . 'modules/alel-frekansi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-alel-frekansi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/alel-frekansi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-alel-frekansi-hesaplama">
        <h3>Alel Frekansı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-alel-aa">Baskın Homozigot (AA) Sayısı</label>
            <input type="number" id="hc-alel-aa" placeholder="Örn: 50" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-alel-Aa">Heterozigot (Aa) Sayısı</label>
            <input type="number" id="hc-alel-Aa" placeholder="Örn: 20" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-alel-aa-rec">Çekinik Homozigot (aa) Sayısı</label>
            <input type="number" id="hc-alel-aa-rec" placeholder="Örn: 30" min="0">
        </div>
        <button class="hc-btn" onclick="hcAlelFrekansiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-alel-result">
            <div class="hc-alel-grid">
                <div class="hc-alel-item">
                    <span class="hc-result-label">p (A) Frekansı:</span>
                    <span class="hc-result-value" id="hc-alel-p">-</span>
                </div>
                <div class="hc-alel-item">
                    <span class="hc-result-label">q (a) Frekansı:</span>
                    <span class="hc-result-value" id="hc-alel-q">-</span>
                </div>
            </div>
            <div class="hc-result-note" id="hc-alel-note"></div>
        </div>
    </div>
    <?php
}
