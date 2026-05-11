<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hash_carpisma_olasiligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hash-collision',
        HC_PLUGIN_URL . 'modules/hash-carpisma-olasiligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hash-collision">
        <h3>Hash Çarpışma Olasılığı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Giriş Sayısı (Veri Adedi)</label>
            <input type="number" id="hc-hco-n" placeholder="Örn: 1000000" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Hash Algoritması (Bit Uzunluğu)</label>
            <select id="hc-hco-bits">
                <option value="32">32-bit (CRC32)</option>
                <option value="64">64-bit</option>
                <option value="128">128-bit (MD5)</option>
                <option value="160">160-bit (SHA-1)</option>
                <option value="256">256-bit (SHA-256)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcHashCollisionHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-hco-result">
            <span>Çarpışma Olasılığı (P):</span>
            <div class="hc-result-value" id="hc-hco-res-val">0</div>
            <div id="hc-hco-res-desc" style="margin-top:5px; font-size:0.9em; opacity:0.8;">-</div>
        </div>
    </div>
    <?php
}
