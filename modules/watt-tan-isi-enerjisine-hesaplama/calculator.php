<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_watt_tan_isi_enerjisine_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-watt-tan-isi-enerjisine-hesaplama',
        HC_PLUGIN_URL . 'modules/watt-tan-isi-enerjisine-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-watt-tan-isi-enerjisine-hesaplama-css',
        HC_PLUGIN_URL . 'modules/watt-tan-isi-enerjisine-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-watt-tan-isi-enerjisine-hesaplama">
        <div class="hc-cal-header">
            <h3>Watt'tan Isı Enerjisine Hesaplama</h3>
            <p>Elektriksel veya mekanik güç düzeyinin (Watt), verimlilik çarpanı hesaba katılarak belirli bir çalışma süresi sonunda ne kadarlık bir ısı enerjisi ürettiğini hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-wti-power">Güç (Watt - W)</label>
            <input type="number" id="hc-wti-power" class="hc-input" placeholder="örn. 2000" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-wti-time">Süre</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-wti-time-val" class="hc-input" placeholder="Miktar" step="any" min="0" value="1">
                <select id="hc-wti-time-unit" class="hc-select" style="max-width: 120px;">
                    <option value="s">Saniye</option>
                    <option value="m">Dakika</option>
                    <option value="h">Saat</option>
                </select>
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-wti-eff">Cihaz / Isıtıcı Verimliliği (%)</label>
            <input type="number" id="hc-wti-eff" class="hc-input" value="100" min="1" max="100">
            <span style="font-size: 11px; color: #777;">Elektrikli ısıtıcılar genellikle %100'e yakın verimle çalışır.</span>
        </div>

        <button class="hc-btn" onclick="hcWattTanIsiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-watt-tan-isi-enerjisine-hesaplama-result">
            <div class="hc-result-title">Açığa Çıkan Isı Enerjisi</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Isı Enerjisi (Joule - J):</span>
                <span class="hc-result-value" id="hc-wti-res-j">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Isı Enerjisi (Kilokalori - kcal):</span>
                <span class="hc-result-value" id="hc-wti-res-kcal">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Isı Enerjisi (BTU):</span>
                <span class="hc-result-value" id="hc-wti-res-btu">-</span>
            </div>
            <div class="hc-result-desc" id="hc-wti-desc"></div>
        </div>
    </div>
    <?php
}
