<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ornekleme_hatasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ornekleme-hatasi-hesaplama',
        HC_PLUGIN_URL . 'modules/ornekleme-hatasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ornekleme-hatasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ornekleme-hatasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ornekleme-hatasi-hesaplama">
        <h3>Örnekleme Hatası Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-moe-n">Örneklem Büyüklüğü (n)</label>
            <input type="number" id="hc-moe-n" min="1" placeholder="Örn: 1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-moe-conf">Güven Düzeyi (%)</label>
            <select id="hc-moe-conf">
                <option value="1.645">90%</option>
                <option value="1.96" selected>95%</option>
                <option value="2.576">99%</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-moe-p">Tahmini Oran (p) [%]</label>
            <input type="number" id="hc-moe-p" value="50" min="0" max="100" placeholder="Örn: 50">
            <small>En muhafazakar tahmin için 50 bırakınız.</small>
        </div>
        <button class="hc-btn" onclick="hcHataPayiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ornekleme-hatasi-hesaplama-result">
            <span class="hc-label">Hata Payı (±):</span>
            <div class="hc-result-value" id="hc-moe-res-value">0</div>
            <div id="hc-moe-res-desc" style="margin-top:10px;"></div>
        </div>
    </div>
    <?php
}
