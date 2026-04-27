<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_maas_hesaplama_2026( $atts ) {
    wp_enqueue_script(
        'hc-maas-hesaplama-2026',
        HC_PLUGIN_URL . 'modules/maas-hesaplama-2026/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-maas-hesaplama-2026-css',
        HC_PLUGIN_URL . 'modules/maas-hesaplama-2026/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-maas-hesaplama-2026">
        <h3>💼 Maaş Hesaplama 2026 (Brüt ↔ Net)</h3>

        <div class="hc-form-group">
            <label for="hc-maas-hesap-tur">Hesaplama Türü</label>
            <select id="hc-maas-hesap-tur">
                <option value="brutten">Brütten Nete</option>
                <option value="netten">Netten Brüte</option>
            </select>
        </div>

        <div class="hc-maas-hesaplama-2026-grid">
            <div class="hc-form-group">
                <label for="hc-maas-tutar">Tutar (TL)</label>
                <input type="number" id="hc-maas-tutar" min="0" step="0.01" placeholder="Örn: 50000" />
            </div>

            <div class="hc-form-group">
                <label for="hc-maas-kumulatif">Önceki Aylardan Kümülatif GV Matrahı (TL)</label>
                <input type="number" id="hc-maas-kumulatif" min="0" step="0.01" value="0" />
            </div>
        </div>

        <div class="hc-form-group">
            <label>
                <input type="checkbox" id="hc-maas-istisna" checked />
                Asgari ücret gelir/damga vergisi istisnasını uygula
            </label>
        </div>

        <button class="hc-btn" onclick="hcMaasHesapla2026()">Hesapla</button>

        <div class="hc-result" id="hc-maas-result">
            <div class="hc-maas-hesaplama-2026-value" id="hc-maas-ana-sonuc"></div>
            <div class="hc-maas-hesaplama-2026-grid hc-maas-hesaplama-2026-breakdown" id="hc-maas-detay"></div>
            <p class="hc-maas-hesaplama-2026-note">
                Hesaplama 2026 için: SGK işçi %14, işsizlik işçi %1, damga vergisi binde 7,59 ve 2026 ücret gelir vergisi dilimleri esas alınarak tahmini yapılır.
            </p>
        </div>
    </div>
    <?php
}
