<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ram_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ram',
        HC_PLUGIN_URL . 'modules/ram-ihtiyaci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ram">
        <h3>RAM İhtiyacı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ram-users">Eşzamanlı Kullanıcı Sayısı</label>
            <input type="number" id="hc-ram-users" placeholder="Adet" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ram-per-user">Kullanıcı Başına RAM (MB)</label>
            <input type="number" id="hc-ram-per-user" placeholder="MB" step="1" value="128">
            <small>Hafif uygulama: 64MB, Orta: 128-256MB, Ağır: 512MB+</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-ram-os">İşletim Sistemi Taban RAM (GB)</label>
            <input type="number" id="hc-ram-os" placeholder="GB" step="0.1" value="2">
        </div>

        <button class="hc-btn" onclick="hcRamHesapla()">RAM İhtiyacını Hesapla</button>

        <div class="hc-result" id="hc-ram-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Minimum Gereken RAM:</span>
                <span class="hc-result-value" id="hc-ram-res-total">--</span>
                <span class="hc-result-unit">GB</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Önerilen RAM (Emniyet Paylı):</span>
                <span id="hc-ram-res-rec">--</span>
                <span class="hc-result-unit">GB</span>
            </div>
        </div>
    </div>
    <?php
}
