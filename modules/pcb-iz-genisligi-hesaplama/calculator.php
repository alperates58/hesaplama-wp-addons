<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pcb_iz_genisligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pcb-iz',
        HC_PLUGIN_URL . 'modules/pcb-iz-genisligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pcb-iz-css',
        HC_PLUGIN_URL . 'modules/pcb-iz-genisligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pcb-iz">
        <h3>PCB İz Genişliği (IPC-2221)</h3>
        
        <div class="hc-form-group">
            <label for="hc-pcb-current">Akım (Amper - A)</label>
            <input type="number" id="hc-pcb-current" placeholder="A" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-pcb-temp">Sıcaklık Artışı (°C)</label>
            <input type="number" id="hc-pcb-temp" placeholder="ΔT" step="any" value="10">
        </div>

        <div class="hc-form-group">
            <label for="hc-pcb-thick">Bakır Kalınlığı (oz/ft² veya µm)</label>
            <select id="hc-pcb-thick-type" onchange="hcPcbUpdateThick()">
                <option value="1">1 oz/ft² (35 µm)</option>
                <option value="0.5">0.5 oz/ft² (17.5 µm)</option>
                <option value="2">2 oz/ft² (70 µm)</option>
                <option value="custom">Özel (µm)</option>
            </select>
            <input type="number" id="hc-pcb-thick-val" placeholder="µm" style="display:none; margin-top:10px;">
        </div>

        <div class="hc-form-group">
            <label>İz Konumu</label>
            <div class="hc-radio-group">
                <label><input type="radio" name="hc-pcb-layer" value="external" checked> Dış Katman</label>
                <label><input type="radio" name="hc-pcb-layer" value="internal"> İç Katman</label>
            </div>
        </div>

        <button class="hc-btn" onclick="hcPcbHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-pcb-result">
            <div class="hc-result-card hc-highlight">
                <span class="hc-result-label">Minimum İz Genişliği</span>
                <span class="hc-result-value" id="hc-pcb-res-width">--</span>
                <span class="hc-result-unit">mm</span>
            </div>
            <div class="hc-result-details">
                <p>Kesit Alanı: <span id="hc-pcb-res-area">--</span> mm²</p>
                <p>Direnç (10mm için): <span id="hc-pcb-res-resistance">--</span> Ω</p>
            </div>
        </div>
    </div>
    <?php
}
