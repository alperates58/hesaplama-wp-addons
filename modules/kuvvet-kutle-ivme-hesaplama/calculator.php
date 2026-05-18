<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kuvvet_kutle_ivme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kuvvet-kutle-ivme-hesaplama',
        HC_PLUGIN_URL . 'modules/kuvvet-kutle-ivme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kuvvet-kutle-ivme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kuvvet-kutle-ivme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fma">
        <h3>Kuvvet Kütle İvme Hesaplayıcı (F = m &times; a)</h3>
        
        <div class="hc-form-group">
            <label for="hc-fma-find">Hesaplanacak Bilinmeyen Değer</label>
            <select id="hc-fma-find" onchange="hcFmaFindChange()">
                <option value="F">Kuvvet (F)</option>
                <option value="m">Kütle (m)</option>
                <option value="a">İvme (a)</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-fma-f-group" style="display: none;">
            <label for="hc-fma-f">Kuvvet (F - Newton)</label>
            <input type="number" id="hc-fma-f" placeholder="Örn: 50" value="50">
        </div>

        <div class="hc-form-group" id="hc-fma-m-group">
            <label for="hc-fma-m">Kütle (m - kg)</label>
            <input type="number" id="hc-fma-m" placeholder="Örn: 10" value="10">
        </div>

        <div class="hc-form-group" id="hc-fma-a-group">
            <label for="hc-fma-a">İvme (a - m/s²)</label>
            <input type="number" id="hc-fma-a" placeholder="Örn: 5" value="5">
        </div>

        <button class="hc-btn" onclick="hcKuvvetKütleİvmeHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-kuvvet-kutle-ivme-result">
            <div class="hc-result-label" id="hc-fma-result-label">Sonuç:</div>
            <div class="hc-result-value" id="hc-fma-val">-</div>
            
            <div style="margin-top: 15px; font-size: 13px; color: var(--hc-front-muted);">
                <strong>F</strong> = Kuvvet (Newton) | <strong>m</strong> = Kütle (Kilogram) | <strong>a</strong> = İvme (m/s²)
            </div>
        </div>
    </div>
    <?php
}
