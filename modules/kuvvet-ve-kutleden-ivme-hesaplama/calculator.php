<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kuvvet_ve_kutleden_ivme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kuvvet-ve-kutleden-ivme-hesaplama',
        HC_PLUGIN_URL . 'modules/kuvvet-ve-kutleden-ivme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kuvvet-ve-kutleden-ivme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kuvvet-ve-kutleden-ivme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-f-m-a">
        <h3>Kuvvet ve Kütleden İvme Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-fma-force">Net Uygulanan Kuvvet (F - Newton)</label>
            <input type="number" id="hc-fma-force" placeholder="Örn: 100" value="100">
        </div>

        <div class="hc-form-group">
            <label for="hc-fma-mass">Cismin Kütlesi (m - kg)</label>
            <input type="number" id="hc-fma-mass" placeholder="Örn: 20" value="20">
        </div>

        <button class="hc-btn" onclick="hcKuvvetVeKütledenİvmeHesapla()">İvmeyi Hesapla</button>

        <div class="hc-result" id="hc-kuvvet-ve-kutleden-ivme-result">
            <div class="hc-result-label">Kazanılan İvme (a):</div>
            <div class="hc-result-value" id="hc-fma-accel-val">-</div>
            
            <div style="margin-top: 15px; font-size: 13px; color: var(--hc-front-muted);">
                <strong>Formül:</strong> a = F / m <br>
                Burada <strong>a</strong> ivme (m/s²), <strong>F</strong> net kuvvet (Newton) ve <strong>m</strong> kütledir (kg).
            </div>
        </div>
    </div>
    <?php
}
