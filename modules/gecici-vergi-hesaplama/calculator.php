<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gecici_vergi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gecici-vergi-hesaplama',
        HC_PLUGIN_URL . 'modules/gecici-vergi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gecici-vergi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gecici-vergi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gecici-vergi">
        <h3>Geçici Vergi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-gv-taxpayer">Mükellef Türü</label>
            <select id="hc-gv-taxpayer">
                <option value="corporate">Kurumlar Vergisi Mükellefi (%25)</option>
                <option value="individual">Gelir Vergisi Mükellefi (Artan Oranlı)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-gv-revenue">Dönem İçi Toplam Gelir (₺)</label>
            <input type="number" id="hc-gv-revenue" placeholder="Örn: 500.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-gv-expense">Dönem İçi Toplam Gider (₺)</label>
            <input type="number" id="hc-gv-expense" placeholder="Örn: 300.000">
        </div>
        <button class="hc-btn" onclick="hcGeciciVergiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-gv-result">
            <div class="hc-result-item">
                <span>Dönem Kârı (Matrah):</span>
                <strong id="hc-gv-res-profit">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Ödenecek Geçici Vergi:</span>
                <strong class="hc-result-value" id="hc-gv-res-tax">-</strong>
            </div>
            <p class="hc-small-text">Hesaplamaya önceki dönemlerde ödenen geçici vergiler dahil değildir.</p>
        </div>
    </div>
    <?php
}
