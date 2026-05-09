<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_standart_icki_miktari( $atts ) {
    wp_enqueue_script(
        'hc-standart-icki-miktari',
        HC_PLUGIN_URL . 'modules/standart-icki-miktari/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-standart-icki-miktari-css',
        HC_PLUGIN_URL . 'modules/standart-icki-miktari/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-standart-icki-miktari">
        <h3>Standart İçki Miktarı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sim-tip">İçecek Türü</label>
            <select id="hc-sim-tip">
                <option value="bira">Bira (330ml - %5)</option>
                <option value="bira50">Bira (500ml - %5)</option>
                <option value="sarap">Şarap (150ml - %12)</option>
                <option value="sert">Sert İçki (45ml - %40) - Rakı, Votka, Viski</option>
                <option value="ozel">Özel Miktar...</option>
            </select>
        </div>

        <div id="hc-sim-ozel-group" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-sim-hacim">Miktar (ml)</label>
                <input type="number" id="hc-sim-hacim" placeholder="Örn: 500">
            </div>
            <div class="hc-form-group">
                <label for="hc-sim-oran">Alkol Oranı (%)</label>
                <input type="number" id="hc-sim-oran" placeholder="Örn: 5" step="0.1">
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-sim-adet">Kaç Tane / Kadeh İçildi?</label>
            <input type="number" id="hc-sim-adet" value="1" min="1">
        </div>
        
        <button class="hc-btn" onclick="hcStandartIckiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-standart-icki-miktari-result">
            <div style="text-align: center;">
                <span style="display: block; font-size: 14px; color: var(--hc-front-muted);">Toplam Standart İçki</span>
                <span class="hc-result-value" id="hc-sim-res-toplam">0</span>
            </div>
            
            <div style="margin-top: 20px; padding: 15px; background: rgba(21, 94, 239, 0.05); border-radius: 12px; font-size: 13px; line-height: 1.5;">
                <strong>Standart İçki Nedir?</strong><br>
                Dünya Sağlık Örgütü (WHO) standartlarına göre 1 standart içki, yaklaşık 10-12 gram saf alkol içerir. Bu araç 10g saf alkolü 1 standart içki olarak kabul eder.
            </div>
        </div>
    </div>

    <script>
    document.getElementById('hc-sim-tip').addEventListener('change', function() {
        document.getElementById('hc-sim-ozel-group').style.display = this.value === 'ozel' ? 'block' : 'none';
    });
    </script>
    <?php
}
