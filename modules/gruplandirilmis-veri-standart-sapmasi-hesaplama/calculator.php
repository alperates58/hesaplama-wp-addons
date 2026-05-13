<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gruplandirilmis_veri_standart_sapmasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gruplandirilmis-veri-standart-sapmasi-hesaplama',
        HC_PLUGIN_URL . 'modules/gruplandirilmis-veri-standart-sapmasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gruplandirilmis-veri-standart-sapmasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gruplandirilmis-veri-standart-sapmasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-grouped-std">
        <h3>Gruplandırılmış Veri Standart Sapması</h3>
        <p style="font-size: 0.9em; color: #666; margin-bottom: 15px;">Aralıkları "Alt-Üst" formatında ve frekansları girin.</p>
        <div id="hc-grouped-rows">
            <div class="hc-grouped-row">
                <input type="text" class="hc-input hc-grouped-range" placeholder="Aralık (Örn: 10-20)">
                <input type="number" class="hc-input hc-grouped-freq" placeholder="Frekans">
            </div>
            <div class="hc-grouped-row">
                <input type="text" class="hc-input hc-grouped-range" placeholder="Aralık (Örn: 20-30)">
                <input type="number" class="hc-input hc-grouped-freq" placeholder="Frekans">
            </div>
        </div>
        <div style="margin-bottom: 15px;">
            <button class="hc-btn hc-btn-secondary" onclick="hcAddGroupedRow()" style="background: #7f8c8d; padding: 5px 10px; font-size: 0.8em;">+ Satır Ekle</button>
        </div>
        <button class="hc-btn" onclick="hcGroupedStdHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-gruplandirilmis-veri-standart-sapmasi-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Toplam Frekans (n):</span>
                    <strong id="hc-res-grp-n">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Aritmetik Ortalama:</span>
                    <strong id="hc-res-grp-mean">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Varyans:</span>
                    <strong id="hc-res-grp-var">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Standart Sapma:</span>
                    <strong id="hc-res-grp-std">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
