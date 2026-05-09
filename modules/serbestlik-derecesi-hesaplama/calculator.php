<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_serbestlik_derecesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-df-calc',
        HC_PLUGIN_URL . 'modules/serbestlik-derecesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-df-calc-css',
        HC_PLUGIN_URL . 'modules/serbestlik-derecesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-df-calc">
        <h3>Serbestlik Derecesi (df)</h3>
        <div class="hc-form-group">
            <label for="hc-df-n">Örneklem Boyutu (n)</label>
            <input type="number" id="hc-df-n" value="30" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-df-type">Analiz Türü</label>
            <select id="hc-df-type">
                <option value="single">Tek Örneklem (n-1)</option>
                <option value="two">İki Bağımsız Örneklem (n1+n2-2)</option>
                <option value="contingency">Kontenjans Tablosu (r-1)*(c-1)</option>
            </select>
        </div>
        <div id="hc-df-extra" style="display:none">
            <div class="hc-form-group">
                <label for="hc-df-n2">İkinci Örneklem Boyutu (n2)</label>
                <input type="number" id="hc-df-n2" value="30" min="1">
            </div>
        </div>
        <button class="hc-btn" onclick="hcDFHesapla()">df Değerini Bul</button>
        <div class="hc-result" id="hc-df-calc-result">
            <div class="hc-result-item">
                <span>Serbestlik Derecesi:</span>
                <span class="hc-result-value" id="hc-res-df-val">0</span>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('hc-df-type').addEventListener('change', function() {
            document.getElementById('hc-df-extra').style.display = (this.value === 'two') ? 'block' : 'none';
        });
    </script>
    <?php
}
