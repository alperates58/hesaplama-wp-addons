<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_byte_kb_mb_gb_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-byte-kb-mb-gb-donusturucu',
        HC_PLUGIN_URL . 'modules/byte-kb-mb-gb-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-byte-kb-mb-gb-donusturucu-css',
        HC_PLUGIN_URL . 'modules/byte-kb-mb-gb-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-byte-kb-mb-gb-donusturucu">
        <h3>Byte KB MB GB Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-bmg-deger">Değer</label>
            <input type="number" id="hc-bmg-deger" placeholder="Değer giriniz" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bmg-kaynak">Kaynak Birim</label>
            <select id="hc-bmg-kaynak">
                <option value="b">Byte (B)</option>
                <option value="kb">Kilobyte (KB)</option>
                <option value="mb">Megabyte (MB)</option>
                <option value="gb">Gigabyte (GB)</option>
                <option value="tb">Terabyte (TB)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcDigitalDonustur()">Dönüştür</button>
        
        <div class="hc-result" id="hc-byte-kb-mb-gb-donusturucu-result">
            <table>
                <thead>
                    <tr>
                        <th>Birim</th>
                        <th>Sonuç</th>
                    </tr>
                </thead>
                <tbody id="hc-bmg-results-body">
                </tbody>
            </table>
        </div>
    </div>
    <?php
}
