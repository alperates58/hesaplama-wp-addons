<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cikolata_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-choco-qty',
        HC_PLUGIN_URL . 'modules/cikolata-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-choco-qty-css',
        HC_PLUGIN_URL . 'modules/cikolata-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-choco-qty">
        <h3>Çikolata Miktarı Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-cq-type">Kullanım Amacı</label>
            <select id="hc-cq-type">
                <option value="mold">Kalıp Çikolata (Tablet)</option>
                <option value="coating">Kaplama (Meyve/Kek)</option>
                <option value="ganache">Ganaj (Pasta Dolgusu)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-cq-count">Adet / Birim (gr veya kalıp sayısı)</label>
            <input type="number" id="hc-cq-count" value="10" min="1">
        </div>
        <button class="hc-btn" onclick="hcChocoQtyHesapla()">Miktarı Hesapla</button>
        <div class="hc-result" id="hc-choco-qty-result">
            <div class="hc-result-item">
                <span>Gereken Çikolata:</span>
                <span class="hc-result-value" id="hc-res-cq-total">0 gr</span>
            </div>
            <p class="hc-cq-note">Tablet çikolata için standart 80-100gr'lık paketler baz alınmıştır.</p>
        </div>
    </div>
    <?php
}
