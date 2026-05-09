<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mol_kesri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mol-kesri-hesaplama',
        HC_PLUGIN_URL . 'modules/mol-kesri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mol-kesri-hesaplama-css',
        HC_PLUGIN_URL . 'modules/mol-kesri-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mol-kesri-hesaplama">
        <div class="hc-header">
            <h3>Mol Kesri Hesaplama</h3>
            <p>Bileşenlerin mol sayılarını girerek mol kesri (X) değerlerini bulun.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label for="hc-mol-a">Bileşen A Molü (n<sub>A</sub>)</label>
                <input type="number" id="hc-mol-a" placeholder="Örn: 2" step="0.01">
            </div>

            <div class="hc-form-group">
                <label for="hc-mol-b">Bileşen B Molü (n<sub>B</sub>)</label>
                <input type="number" id="hc-mol-b" placeholder="Örn: 3" step="0.01">
            </div>

            <div class="hc-form-group">
                <label for="hc-mol-c">Bileşen C Molü (İsteğe Bağlı)</label>
                <input type="number" id="hc-mol-c" placeholder="Örn: 0" step="0.01">
            </div>
        </div>

        <button class="hc-btn" onclick="hcMolKesriHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-mol-kesri-result">
            <div class="hc-res-title">Sonuçlar</div>
            <div class="hc-res-table">
                <div class="hc-res-row">
                    <span>X<sub>A</sub> (A'nın Mol Kesri):</span>
                    <strong id="hc-res-xa">-</strong>
                </div>
                <div class="hc-res-row">
                    <span>X<sub>B</sub> (B'nin Mol Kesri):</span>
                    <strong id="hc-res-xb">-</strong>
                </div>
                <div class="hc-res-row" id="hc-res-row-c" style="display:none;">
                    <span>X<sub>C</sub> (C'nin Mol Kesri):</span>
                    <strong id="hc-res-xc">-</strong>
                </div>
            </div>
            <div class="hc-info-note">Toplam mol kesri her zaman 1'dir.</div>
        </div>
    </div>
    <?php
}
