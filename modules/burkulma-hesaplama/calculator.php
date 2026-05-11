<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burkulma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burkulma',
        HC_PLUGIN_URL . 'modules/burkulma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-burkulma">
        <h3>Kritik Burkulma Yükü (Euler) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Elastisite Modülü (E, GPa)</label>
            <input type="number" id="hc-bur-e" placeholder="Örn: 210 (Çelik)" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Atalet Momenti (I, cm⁴)</label>
            <input type="number" id="hc-bur-i" placeholder="Örn: 1000" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Eleman Uzunluğu (L, metre)</label>
            <input type="number" id="hc-bur-l" placeholder="m" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Uç Koşulları (K Katsayısı)</label>
            <select id="hc-bur-k">
                <option value="1.0">İki ucu mafsallı (K=1.0)</option>
                <option value="0.5">İki ucu ankastre (K=0.5)</option>
                <option value="0.7">Bir ucu ankastre, diğeri mafsallı (K=0.7)</option>
                <option value="2.0">Bir ucu ankastre, diğeri serbest (K=2.0)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcBurkulmaHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-bur-result">
            <span>Kritik Burkulma Yükü (P<sub>cr</sub>):</span>
            <div class="hc-result-value" id="hc-bur-res-kn">0 kN</div>
            <div id="hc-bur-res-kg" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 kg (yaklaşık)</div>
        </div>
    </div>
    <?php
}
