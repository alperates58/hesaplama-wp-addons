<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_itme_ve_cizgisel_momentum_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-itme-ve-cizgisel-momentum-hesaplama',
        HC_PLUGIN_URL . 'modules/itme-ve-cizgisel-momentum-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-itme-ve-cizgisel-momentum-hesaplama-css',
        HC_PLUGIN_URL . 'modules/itme-ve-cizgisel-momentum-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-itme-ve-cizgisel-momentum-hesaplama">
        <h3>İtme ve Çizgisel Momentum Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-icm-tip">Hesaplanacak Özellik</label>
            <select id="hc-icm-tip" onchange="hcIcmTipDegisti()">
                <option value="momentum" selected>Çizgisel Momentum (p = m · v)</option>
                <option value="itme-kuvvet">Kuvvet ve Zamandan İtme (I = F · Δt)</option>
                <option value="itme-hiz">Hız Değişiminden İtme (I = m · Δv)</option>
            </select>
        </div>
        
        <div id="hc-icm-girdiler">
            <!-- Dinamik girdiler JS ile yerleşecek -->
        </div>
        
        <button class="hc-btn" onclick="hcItmeVeCizgiselMomentumHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-itme-ve-cizgisel-momentum-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof hcIcmTipDegisti === 'function') {
                hcIcmTipDegisti();
            }
        });
    </script>
    <?php
}
