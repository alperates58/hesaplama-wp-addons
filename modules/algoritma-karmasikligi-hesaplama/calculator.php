<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_algoritma_karmasikligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-algo-comp',
        HC_PLUGIN_URL . 'modules/algoritma-karmasikligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-algo-comp-css',
        HC_PLUGIN_URL . 'modules/algoritma-karmasikligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-algo-comp">
        <h3>Algoritma Karmaşıklığı (Big O) Analizi</h3>
        
        <div class="hc-form-group">
            <label>Algoritma Yapısı</label>
            <select id="hc-algo-yapi">
                <option value="constant">Tekil İşlem (Erişim, Atama)</option>
                <option value="linear">Tek Döngü (for i=0 to N)</option>
                <option value="quadratic">İç İçe İki Döngü (Nested Loop)</option>
                <option value="cubic">İç İçe Üç Döngü</option>
                <option value="logarithmic">Yarıya Bölerek İlerleme (Binary Search)</option>
                <option value="linearithmic">Böl ve Yönet (Merge/Quick Sort)</option>
                <option value="exponential">Her Adımda İkiye Katlanma (Recursive Fibonacci)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-algo-n">Veri Boyutu (N)</label>
            <input type="number" id="hc-algo-n" placeholder="İşlem yapılacak öğe sayısı" step="1" value="1000">
        </div>

        <button class="hc-btn" onclick="hcAlgoritmaKarmasikligiAnalizEt()">Analiz Et</button>

        <div class="hc-result" id="hc-algo-result">
            <div class="hc-result-item">
                <span>Zaman Karmaşıklığı:</span>
                <strong class="hc-result-value" id="hc-algo-res-bigo">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Tahmini İşlem Sayısı:</span>
                <span id="hc-algo-res-ops">-</span>
            </div>
            <div class="hc-result-note" id="hc-algo-res-note"></div>
        </div>
    </div>
    <?php
}
