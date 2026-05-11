<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bit_byte_donusumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bit-byte',
        HC_PLUGIN_URL . 'modules/bit-byte-donusumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-bit-byte">
        <h3>Bit / Byte Dönüşümü Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-bb-val" placeholder="Örn: 1024" step="0.0001">
        </div>
        
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-bb-from">
                <option value="1">Bit (b)</option>
                <option value="8">Byte (B)</option>
                <option value="8192">Kilobyte (KB)</option>
                <option value="8388608">Megabyte (MB)</option>
                <option value="8589934592">Gigabyte (GB)</option>
                <option value="8796093022208">Terabyte (TB)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcBitByteHesapla()">Dönüştür</button>
        
        <div class="hc-result" id="hc-bb-result">
            <span>Dönüşüm Sonuçları:</span>
            <div id="hc-bb-res-list" style="display: flex; flex-direction: column; gap: 8px; margin-top: 15px;">
                <!-- JS will fill this -->
            </div>
        </div>
    </div>
    <?php
}
