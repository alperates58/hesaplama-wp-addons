<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_karbon_dengeleme_icin_gerekli_agac_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-karbon-dengeleme-icin-gerekli-agac-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/karbon-dengeleme-icin-gerekli-agac-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-karbon-dengeleme-icin-gerekli-agac-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/karbon-dengeleme-icin-gerekli-agac-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tree-calc">
        <h3>Gerekli Ağaç Sayısı</h3>
        <div class="hc-form-group">
            <label for="hc-tc-co2">Dengelenmek İstenen Karbon (kg CO₂e)</label>
            <input type="number" id="hc-tc-co2" placeholder="Örn: 2000">
        </div>
        <div class="hc-form-group">
            <label for="hc-tc-type">Ağaç Türü Verimi</label>
            <select id="hc-tc-type">
                <option value="20" selected>Ortalama Yetişkin Ağaç (20 kg/yıl)</option>
                <option value="12">Genç Fidan (12 kg/yıl)</option>
                <option value="40">Hızlı Büyüyen Türler (40 kg/yıl)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKarbonDengelemeİçinGerekliAğaçSayısıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tc-result">
            <div class="hc-result-label">Gerekli Ağaç Sayısı:</div>
            <div class="hc-result-value" id="hc-tc-val">-</div>
            <p style="font-size:0.85em; margin-top:10px; color:#666;">*Bir ağacın yıllık ortalama karbon emilim kapasitesi baz alınmıştır.</p>
        </div>
    </div>
    <?php
}
