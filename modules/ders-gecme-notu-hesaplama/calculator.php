<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_ders_gecme_notu_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-ders-gecme-notu-hesaplama', HC_PLUGIN_URL . 'modules/ders-gecme-notu-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-ders-gecme-notu-hesaplama-css', HC_PLUGIN_URL . 'modules/ders-gecme-notu-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-ders-gecme-notu-hesaplama">
        <h3>Ders Geçme Notu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dgn-tur">Eğitim Kademesi</label>
            <select id="hc-dgn-tur" onchange="hcDersGecmeGuncelle()">
                <option value="lise">Lise (MEB)</option>
                <option value="universite">Üniversite</option>
            </select>
        </div>
        <div id="hc-dgn-lise-grup">
            <div class="hc-form-group">
                <label for="hc-dgn-donem1">1. Dönem Puanı (0-100)</label>
                <input type="number" id="hc-dgn-donem1" placeholder="örn. 55" min="0" max="100" step="0.1" />
            </div>
            <div class="hc-form-group">
                <label for="hc-dgn-donem2">2. Dönem Puanı (0-100)</label>
                <input type="number" id="hc-dgn-donem2" placeholder="örn. 72" min="0" max="100" step="0.1" />
            </div>
        </div>
        <div id="hc-dgn-uni-grup" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-dgn-vize">Vize Notu (0-100)</label>
                <input type="number" id="hc-dgn-vize" placeholder="örn. 70" min="0" max="100" step="0.1" />
            </div>
            <div class="hc-form-group">
                <label for="hc-dgn-final">Final Notu (0-100)</label>
                <input type="number" id="hc-dgn-final" placeholder="örn. 80" min="0" max="100" step="0.1" />
            </div>
            <div class="hc-form-group">
                <label for="hc-dgn-vize-oran">Vize Katkı Oranı (%)</label>
                <input type="number" id="hc-dgn-vize-oran" placeholder="örn. 40" min="0" max="100" step="5" value="40" />
            </div>
        </div>
        <button class="hc-btn" onclick="hcDersGecmeNotuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ders-gecme-notu-hesaplama-result"></div>
    </div>
    <?php
}
