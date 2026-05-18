<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_volan_enerji_depolama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-volan-enerji-depolama-hesaplama',
        HC_PLUGIN_URL . 'modules/volan-enerji-depolama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-volan-enerji-depolama-hesaplama-css',
        HC_PLUGIN_URL . 'modules/volan-enerji-depolama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-volan-enerji-depolama-hesaplama">
        <div class="hc-cal-header">
            <h3>Volan (Flywheel) Enerji Depolama Hesaplama</h3>
            <p>Mekanik bir enerji depolama sistemi olan volanın geometrisi, kütlesi ve dönüş hızına (RPM) bağlı olarak içinde biriken rotasyonel kinetik enerjiyi hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-vle-type">Volan Geometrisi / Tipi</label>
            <select id="hc-vle-type" class="hc-select">
                <option value="disk">Dolu Silindir / Disk (I = 0.5 * m * r²)</option>
                <option value="rim">İnce Çeperli Halka / Çember (I = m * r²)</option>
                <option value="hollow">Kalın Çeperli Boş Silindir (R₁ = 0.5 * R₂)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-vle-m">Volan Kütlesi (m - kilogram - kg)</label>
            <input type="number" id="hc-vle-m" class="hc-input" placeholder="örn. 50" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-vle-r">Dış Yarıçap (r - metre - m veya cm)</label>
            <input type="number" id="hc-vle-r" class="hc-input" placeholder="örn. 0.3 (yani 30 cm)" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-vle-rpm">Dönüş Hızı (RPM - Devir / Dakika)</label>
            <input type="number" id="hc-vle-rpm" class="hc-input" placeholder="örn. 3000" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcVolanEnerjiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-volan-enerji-depolama-hesaplama-result">
            <div class="hc-result-title">Depolanan Kinetik Enerji</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Depolanan Enerji (Joule):</span>
                <span class="hc-result-value" id="hc-vle-res-j">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Depolanan Enerji (Watt-saat - Wh):</span>
                <span class="hc-result-value" id="hc-vle-res-wh">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Eylemsizlik Momenti (I):</span>
                <span class="hc-result-value" id="hc-vle-res-i">-</span>
            </div>
            <div class="hc-result-desc" id="hc-vle-desc"></div>
        </div>
    </div>
    <?php
}
