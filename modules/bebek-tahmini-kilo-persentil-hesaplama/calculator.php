<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bebek_tahmini_kilo_persentil( $atts ) {
    wp_enqueue_script(
        'hc-bebek-tahmini-kilo',
        HC_PLUGIN_URL . 'modules/bebek-tahmini-kilo-persentil-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-bebek-tahmini-kilo">
        <h3>Bebek Tahmini Kilo Persentil Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-btk-cinsiyet">Cinsiyet</label>
            <select id="hc-btk-cinsiyet">
                <option value="erkek">Erkek</option>
                <option value="kadin">Kız</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-btk-ay">Bebek Kaç Aylık?</label>
            <input type="number" id="hc-btk-ay" placeholder="Örn: 6" min="0" max="36">
        </div>
        <div class="hc-form-group">
            <label for="hc-btk-kilo">Mevcut Kilo (kg)</label>
            <input type="number" id="hc-btk-kilo" placeholder="Örn: 7.5" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcBebekTahminiKiloHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bebek-tahmini-kilo-result">
            <div style="text-align: center;">
                <span style="font-size: 14px; color: var(--hc-front-muted);">Tahmini Kilo Persentili</span>
                <div class="hc-result-value" id="hc-res-btk-p">-</div>
            </div>
            <div id="hc-btk-yorum" style="margin-top: 15px; padding: 12px; border-radius: 10px; font-size: 14px;"></div>
        </div>
    </div>
    <?php
}
