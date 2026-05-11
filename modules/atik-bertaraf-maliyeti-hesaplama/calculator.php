<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_atik_bertaraf_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-waste-js',
        HC_PLUGIN_URL . 'modules/atik-bertaraf-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-waste-css',
        HC_PLUGIN_URL . 'modules/atik-bertaraf-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-waste">
        <h3>Atık Bertaraf Maliyeti Hesaplama (2026)</h3>
        
        <div class="hc-form-group">
            <label for="hc-at-tip">Atık Türü</label>
            <select id="hc-at-tip">
                <option value="500">Evsel / Belediye Atıkları</option>
                <option value="1200">Endüstriyel Atıklar (Tehlikesiz)</option>
                <option value="5000">Tehlikeli Atıklar</option>
                <option value="8000">Tıbbi Atıklar</option>
                <option value="300">İnşaat / Hafriyat Atıkları</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-at-miktar">Atık Miktarı (Ton)</label>
            <input type="number" id="hc-at-miktar" placeholder="Ton" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-at-mesafe">Nakliye Mesafesi (km)</label>
            <input type="number" id="hc-at-mesafe" placeholder="km" step="1">
        </div>

        <button class="hc-btn" onclick="hcAtikBertarafHesapla()">Maliyeti Hesapla</button>

        <div class="hc-result" id="hc-waste-result">
            <div class="hc-result-item">
                <span>Toplam Tahmini Maliyet:</span>
                <strong class="hc-result-value" id="hc-at-res-total">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Bertaraf Bedeli:</span>
                <span id="hc-at-res-bertaraf">-</span>
            </div>
            <div class="hc-result-item">
                <span>Nakliye Bedeli:</span>
                <span id="hc-at-res-nakliye">-</span>
            </div>
            <div class="hc-result-note" id="hc-at-res-note"></div>
        </div>
    </div>
    <?php
}
