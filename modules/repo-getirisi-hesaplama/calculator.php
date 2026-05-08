<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_repo_getirisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-repo-getiri',
        HC_PLUGIN_URL . 'modules/repo-getirisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-repo-getiri-css',
        HC_PLUGIN_URL . 'modules/repo-getirisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-repo-getirisi-hesaplama">
        <h3>Repo Getirisi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-rg-p">Yatırım Tutarı (TL)</label>
            <input type="number" id="hc-rg-p" placeholder="Anapara">
        </div>

        <div class="hc-form-group">
            <label for="hc-rg-r">Yıllık Repo Oranı (%)</label>
            <input type="number" id="hc-rg-r" value="42">
        </div>

        <div class="hc-form-group">
            <label for="hc-rg-d">Vade (Gün)</label>
            <input type="number" id="hc-rg-d" value="7">
        </div>
        
        <button class="hc-btn" onclick="hcRepoGetirisiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-repo-result">
            <div class="hc-result-item">
                <span>Brüt Getiri:</span>
                <strong id="hc-rg-res-gross">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Stopaj Kesintisi (%15):</span>
                <strong id="hc-rg-res-tax">-</strong>
            </div>
            <div class="hc-result-value" id="hc-rg-res-net">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Net Repo Getirisi</p>
        </div>
    </div>
    <?php
}
