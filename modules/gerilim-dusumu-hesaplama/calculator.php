<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gerilim_dusumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gerilim-dusumu-hesaplama',
        HC_PLUGIN_URL . 'modules/gerilim-dusumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gerilim-dusumu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gerilim-dusumu-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gerilim-dusumu-hesaplama">
        <div class="hc-header">
            <h3>Gerilim Düşümü Hesaplama</h3>
            <p>Elektrik tesisatı parametrelerini girerek gerilim kaybını hesaplayın.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Nominal Gerilim (V)</label>
                <input type="number" id="hc-gd-volt" value="230" step="1">
            </div>
            <div class="hc-form-group">
                <label>Akım (Amper)</label>
                <input type="number" id="hc-gd-current" placeholder="Örn: 16" step="0.1">
            </div>
            <div class="hc-form-group">
                <label>Mesafe (Metre)</label>
                <input type="number" id="hc-gd-length" placeholder="Örn: 50" step="1">
            </div>
            <div class="hc-form-group">
                <label>Kablo Kesiti (mm²)</label>
                <select id="hc-gd-cross">
                    <option value="1.5">1.5 mm²</option>
                    <option value="2.5" selected>2.5 mm²</option>
                    <option value="4">4 mm²</option>
                    <option value="6">6 mm²</option>
                    <option value="10">10 mm²</option>
                    <option value="16">16 mm²</option>
                    <option value="25">25 mm²</option>
                </select>
            </div>
            <div class="hc-form-group full-width">
                <label>İletken Tipi</label>
                <div class="hc-radio-group">
                    <label><input type="radio" name="hc-gd-metal" value="bakir" checked> Bakır</label>
                    <label><input type="radio" name="hc-gd-metal" value="alu"> Alüminyum</label>
                </div>
            </div>
        </div>

        <button class="hc-btn" onclick="hcGdHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-gd-result">
            <div class="hc-res-summary">
                <div class="hc-res-item">
                    <span class="hc-res-label">Gerilim Düşümü</span>
                    <strong id="hc-res-v-drop">0 V</strong>
                </div>
                <div class="hc-res-item">
                    <span class="hc-res-label">Yüzde Kayıp</span>
                    <strong id="hc-res-p-drop">0%</strong>
                </div>
            </div>
            <div class="hc-res-final">
                Hattın Sonundaki Gerilim: <span id="hc-res-v-final">0 V</span>
            </div>
            <div id="hc-res-status" class="hc-gd-status"></div>
        </div>
    </div>
    <?php
}
