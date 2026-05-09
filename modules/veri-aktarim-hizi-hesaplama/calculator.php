<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_veri_aktarim_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-veri-aktarim-hizi-hesaplama',
        HC_PLUGIN_URL . 'modules/veri-aktarim-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-veri-aktarim-hizi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/veri-aktarim-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-veri-aktarim-hizi-hesaplama">
        <h3>Veri Aktarım Hızı Dönüştürme</h3>
        <div class="hc-form-group">
            <label for="hc-vah-deger">Değer</label>
            <input type="number" id="hc-vah-deger" placeholder="Değer giriniz" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-vah-kaynak">Kaynak Birim</label>
            <select id="hc-vah-kaynak">
                <option value="bps">bps (Bit/s)</option>
                <option value="kbps">Kbps (Kilobit/s)</option>
                <option value="mbps" selected>Mbps (Megabit/s)</option>
                <option value="gbps">Gbps (Gigabit/s)</option>
                <option value="bs">B/s (Byte/s)</option>
                <option value="kbs">KB/s (Kilobyte/s)</option>
                <option value="mbs">MB/s (Megabyte/s)</option>
                <option value="gbs">GB/s (Gigabyte/s)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcVahDonustur()">Dönüştür</button>
        
        <div class="hc-result" id="hc-veri-aktarim-hizi-hesaplama-result">
            <table>
                <thead>
                    <tr>
                        <th>Birim</th>
                        <th>Sonuç</th>
                    </tr>
                </thead>
                <tbody id="hc-vah-results-body">
                </tbody>
            </table>
        </div>
    </div>
    <?php
}
