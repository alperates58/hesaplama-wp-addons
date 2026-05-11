<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_damitma_kolonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-distillation',
        HC_PLUGIN_URL . 'modules/damitma-kolonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-distillation">
        <h3>Damıtma Kolonu (Minimum Kademe) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Üst Ürün Mol Kesri (x<sub>D</sub>, hafif bileşen)</label>
            <input type="number" id="hc-dk-xd" placeholder="Örn: 0.95" step="0.001">
        </div>
        
        <div class="hc-form-group">
            <label>Alt Ürün Mol Kesri (x<sub>W</sub>, hafif bileşen)</label>
            <input type="number" id="hc-dk-xw" placeholder="Örn: 0.05" step="0.001">
        </div>
        
        <div class="hc-form-group">
            <label>Bağıl Uçuculuk (α)</label>
            <input type="number" id="hc-dk-alpha" placeholder="Örn: 2.5" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcDamitmaHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-dk-result">
            <span>Minimum Teorik Kademe Sayısı (N<sub>min</sub>):</span>
            <div class="hc-result-value" id="hc-dk-res-val">0</div>
            <small>Not: Fenske denklemi kullanılmıştır. Toplam geri akış (Total Reflux) durumu için geçerlidir.</small>
        </div>
    </div>
    <?php
}
