<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gelir_vergisi_hesaplama_2026( $atts ) {
    wp_enqueue_script(
        'hc-gelir-vergisi-hesaplama-2026',
        HC_PLUGIN_URL . 'modules/gelir-vergisi-hesaplama-2026/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gelir-vergisi-hesaplama-2026-css',
        HC_PLUGIN_URL . 'modules/gelir-vergisi-hesaplama-2026/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gelir-vergisi-2026">
        <div class="hc-header">
            <h3>Gelir Vergisi Hesaplama (2026 Tarifesi)</h3>
            <p class="hc-subtitle">Yıllık kümülatif gelir vergisi matrahınız üzerinden 2026 yılı vergi dilimleri (%15 - %40), dilim bazlı vergi tutarları ve efektif vergi oranınızı hesaplayın.</p>
        </div>

        <div class="hc-dual-row">
            <div class="hc-form-group">
                <label for="hc-gv-type">Gelir Türü *</label>
                <select id="hc-gv-type" class="hc-input">
                    <option value="wage">Ücret Geliri (Maaş & Hizmet Erbabı)</option>
                    <option value="non-wage">Ücret Dışı Gelirler (Kira, Ticari Kazanç, Serbest Meslek)</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-gv-matrah">Yıllık Toplam Vergi Matrahı (₺) *</label>
                <input type="number" id="hc-gv-matrah" placeholder="Örn: 650000" min="0" value="650000" class="hc-input" required>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcGelirVergisi2026Hesapla()">📊 Gelir Vergisi Dilimlerimi Hesapla</button>

        <div class="hc-result" id="hc-gv-result">
            <div class="hc-num-hero" id="hc-gv-hero"></div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">📑 2026 Gelir Vergisi Dilim Bazlı Hesaplama Tablosu</h4>
                <div class="hc-gv-table-box" id="hc-gv-table-box"></div>
            </div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">📖 2026 Gelir Vergisi Mevzuatı & Dilim Bilgileri</h4>
                <div class="hc-result-content" id="hc-gv-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
