<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_atom_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-atom-hesaplama',
        HC_PLUGIN_URL . 'modules/atom-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-atom-hesaplama-css',
        HC_PLUGIN_URL . 'modules/atom-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-atom-hesaplama">
        <div class="hc-header">
            <h3>Atom & İyon Hesaplama</h3>
            <p>Atomun temel özelliklerini girerek tanecik sayılarını bulun.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label for="hc-atom-z">Atom Numarası (Z - Proton)</label>
                <input type="number" id="hc-atom-z" placeholder="Örn: 11 (Na)" step="1">
            </div>

            <div class="hc-form-group">
                <label for="hc-atom-a">Kütle Numarası (A)</label>
                <input type="number" id="hc-atom-a" placeholder="Örn: 23" step="1">
            </div>

            <div class="hc-form-group full-width">
                <label for="hc-atom-q">İyon Yükü (±)</label>
                <input type="number" id="hc-atom-q" placeholder="Nötr için 0" value="0" step="1">
            </div>
        </div>

        <button class="hc-btn" onclick="hcAtomHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-atom-result">
            <div class="hc-atom-summary">
                <div class="hc-atom-viz">
                    <span class="hc-a-num" id="hc-viz-a">23</span>
                    <span class="hc-q-num" id="hc-viz-q">0</span>
                    <span class="hc-symbol">X</span>
                    <span class="hc-z-num" id="hc-viz-z">11</span>
                </div>
                <div class="hc-particle-list">
                    <div class="hc-particle-item">
                        <span>Proton:</span>
                        <strong id="hc-res-p">11</strong>
                    </div>
                    <div class="hc-particle-item">
                        <span>Nötron:</span>
                        <strong id="hc-res-n">12</strong>
                    </div>
                    <div class="hc-particle-item">
                        <span>Elektron:</span>
                        <strong id="hc-res-e">11</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
