<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ortalama_atomik_kutle_hesaplayici( $atts ) {
    wp_enqueue_script(
        'hc-ortalama-atomik-kutle-hesaplayici',
        HC_PLUGIN_URL . 'modules/ortalama-atomik-kutle-hesaplayici/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ortalama-atomik-kutle-hesaplayici-css',
        HC_PLUGIN_URL . 'modules/ortalama-atomik-kutle-hesaplayici/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ortalama-atomik-kutle-hesaplayici">
        <div class="hc-header">
            <h3>Ortalama Atomik Kütle Hesaplayıcı</h3>
            <p>İzotopların kütlelerini ve yüzde bolluklarını girin.</p>
        </div>
        
        <div class="hc-isotope-list">
            <div class="hc-isotope-item">
                <label>İzotop 1</label>
                <div class="hc-input-group">
                    <input type="number" id="hc-iso-m1" placeholder="Kütle (amu)" step="0.0001">
                    <input type="number" id="hc-iso-p1" placeholder="Bolluk (%)" step="0.01">
                </div>
            </div>

            <div class="hc-isotope-item">
                <label>İzotop 2</label>
                <div class="hc-input-group">
                    <input type="number" id="hc-iso-m2" placeholder="Kütle (amu)" step="0.0001">
                    <input type="number" id="hc-iso-p2" placeholder="Bolluk (%)" step="0.01">
                </div>
            </div>

            <div class="hc-isotope-item">
                <label>İzotop 3 (Opsiyonel)</label>
                <div class="hc-input-group">
                    <input type="number" id="hc-iso-m3" placeholder="Kütle (amu)" step="0.0001">
                    <input type="number" id="hc-iso-p3" placeholder="Bolluk (%)" step="0.01">
                </div>
            </div>
        </div>

        <button class="hc-btn" onclick="hcOrtalamaAtomikKutleHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-atom-mass-result">
            <div class="hc-res-label">Ortalama Atom Kütlesi</div>
            <div class="hc-res-main">
                <span id="hc-res-avg-mass">-</span>
                <small>amu</small>
            </div>
            <div id="hc-p-warn" class="hc-warn-note" style="display:none;">
                ⚠️ Toplam bolluk %100 değil! (<span id="hc-total-p">0</span>%)
            </div>
        </div>
    </div>
    <?php
}
