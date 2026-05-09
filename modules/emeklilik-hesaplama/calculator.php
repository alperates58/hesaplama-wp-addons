<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_emeklilik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-emeklilik-hesaplama',
        HC_PLUGIN_URL . 'modules/emeklilik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-emeklilik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/emeklilik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-emeklilik-hesaplama">
        <h3>Emeklilik Hesaplama (2026)</h3>
        
        <div class="hc-form-group">
            <label for="hc-emk-gender">Cinsiyet</label>
            <select id="hc-emk-gender">
                <option value="male">Erkek</option>
                <option value="female">Kadın</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-emk-birth">Doğum Tarihi</label>
            <input type="date" id="hc-emk-birth">
        </div>

        <div class="hc-form-group">
            <label for="hc-emk-start">Sigorta Başlangıç Tarihi</label>
            <input type="date" id="hc-emk-start">
        </div>

        <div class="hc-form-group">
            <label for="hc-emk-days">Mevcut Prim Gün Sayısı</label>
            <input type="number" id="hc-emk-days" placeholder="Örn: 5000">
        </div>

        <div class="hc-form-group">
            <label for="hc-emk-type">Sigorta Türü</label>
            <select id="hc-emk-type">
                <option value="ssk">SSK (4A)</option>
                <option value="bagkur">Bağ-Kur (4B)</option>
                <option value="emekli-sandigi">Emekli Sandığı (4C)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcEmeklilikHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-emeklilik-result">
            <div class="hc-result-item">
                <span>Durum:</span>
                <strong id="hc-res-status">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Gerekli Yaş:</span>
                <strong id="hc-res-age-req">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Gerekli Prim Gün:</span>
                <strong id="hc-res-days-req">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Kalan Prim Gün:</span>
                <strong id="hc-res-days-left">-</strong>
            </div>
            <div class="hc-result-value" id="hc-res-date">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Tahmini Emeklilik Tarihi</p>
        </div>
    </div>
    <?php
}
