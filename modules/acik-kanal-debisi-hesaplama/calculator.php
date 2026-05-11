<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_acik_kanal_debisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-acik-kanal-debi',
        HC_PLUGIN_URL . 'modules/acik-kanal-debisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-acik-kanal-debi-css',
        HC_PLUGIN_URL . 'modules/acik-kanal-debisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-acik-kanal-debi">
        <h3>Açık Kanal Debisi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-debi-alan">Kesit Alanı (A)</label>
            <input type="number" id="hc-debi-alan" placeholder="m²" step="0.01">
        </div>

        <div class="hc-form-group">
            <label for="hc-debi-cevre">Islak Çevre (P)</label>
            <input type="number" id="hc-debi-cevre" placeholder="Metre (m)" step="0.01">
        </div>

        <div class="hc-form-group">
            <label for="hc-debi-egim">Kanal Eğimi (S)</label>
            <input type="number" id="hc-debi-egim" placeholder="m/m (örn: 0.001)" step="0.0001">
        </div>

        <div class="hc-form-group">
            <label for="hc-debi-n">Manning Pürüzlülük Katsayısı (n)</label>
            <select id="hc-debi-n">
                <option value="0.012">Beton (Düzgün) - 0.012</option>
                <option value="0.015">Beton (Pürüzlü) - 0.015</option>
                <option value="0.025">Toprak Kanal (Düz) - 0.025</option>
                <option value="0.035">Toprak Kanal (Otlu) - 0.035</option>
                <option value="0.040">Dere Yatağı - 0.040</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcAcikKanalDebisiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-acik-kanal-result">
            <div class="hc-result-item">
                <span>Debi (Q):</span>
                <strong class="hc-result-value" id="hc-acik-res-q">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Akış Hızı (v):</span>
                <span id="hc-acik-res-v">-</span>
            </div>
            <div class="hc-result-note" id="hc-acik-res-note"></div>
        </div>
    </div>
    <?php
}
