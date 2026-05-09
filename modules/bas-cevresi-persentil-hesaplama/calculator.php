<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bas_cevresi_persentil_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bas-cevresi-p',
        HC_PLUGIN_URL . 'modules/bas-cevresi-persentil-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-bas-cevresi-p">
        <h3>Baş Çevresi Persentil Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bcp-cinsiyet">Cinsiyet</label>
            <select id="hc-bcp-cinsiyet">
                <option value="erkek">Erkek</option>
                <option value="kadin">Kız</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-bcp-ay">Bebek Kaç Aylık?</label>
            <input type="number" id="hc-bcp-ay" placeholder="Örn: 12" min="0" max="60">
        </div>
        <div class="hc-form-group">
            <label for="hc-bcp-bas">Baş Çevresi (cm)</label>
            <input type="number" id="hc-bcp-bas" placeholder="Örn: 46" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcBasCevresiPersentilHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bas-cevresi-p-result">
            <div style="text-align: center;">
                <span style="font-size: 14px; color: var(--hc-front-muted);">Baş Çevresi Persentili</span>
                <div class="hc-result-value" id="hc-res-bcp-p">-</div>
            </div>
        </div>
    </div>
    <?php
}
