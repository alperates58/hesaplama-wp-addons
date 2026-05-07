<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_avogadro_sabiti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-avogadro-sabiti-hesaplama',
        HC_PLUGIN_URL . 'modules/avogadro-sabiti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-avogadro-sabiti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/avogadro-sabiti-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-avogadro-sabiti-hesaplama">
        <div class="hc-header">
            <h3>Avogadro Sabiti Hesaplama</h3>
            <p>Mol sayısı ve tanecik sayısı arasındaki dönüşümü 6,022x10<sup>23</sup> sabitiyle gerçekleştirin.</p>
        </div>
        
        <div class="hc-tabs">
            <button class="hc-tab-btn active" onclick="hcSwitchAvogadroTab(this, 'm2p')">Mol ➔ Tanecik</button>
            <button class="hc-tab-btn" onclick="hcSwitchAvogadroTab(this, 'p2m')">Tanecik ➔ Mol</button>
        </div>

        <div id="hc-av-m2p" class="hc-av-panel">
            <div class="hc-form-group">
                <label for="hc-av-mols">Mol Sayısı (n)</label>
                <input type="number" id="hc-av-mols" placeholder="Örn: 1" step="0.0001">
            </div>
            <button class="hc-btn" onclick="hcAvogadroHesapla('m2p')">Hesapla</button>
        </div>

        <div id="hc-av-p2m" class="hc-av-panel" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-av-particles">Tanecik Sayısı (Adet)</label>
                <div class="hc-particle-input">
                    <input type="number" id="hc-av-part-val" placeholder="Örn: 6.022" step="0.001">
                    <span>× 10</span>
                    <input type="number" id="hc-av-part-exp" placeholder="23" value="23">
                </div>
            </div>
            <button class="hc-btn" onclick="hcAvogadroHesapla('p2m')">Hesapla</button>
        </div>

        <div class="hc-result" id="hc-avogadro-result">
            <div class="hc-res-label" id="hc-av-res-label">Sonuç</div>
            <div class="hc-res-main">
                <span id="hc-res-av-val">-</span>
            </div>
            <div class="hc-formula-box">
                N = n × 6,02214076 × 10<sup>23</sup>
            </div>
        </div>
    </div>
    <?php
}
