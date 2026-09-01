<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogumda_retro_gezegen_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dogumda-retro-gezegen-hesaplama',
        HC_PLUGIN_URL . 'modules/dogumda-retro-gezegen-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dogumda-retro-gezegen-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dogumda-retro-gezegen-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-birth-retro">
        <div class="hc-header">
            <h3>Doğum Haritası Retro (Geri Hareketteki) Gezegenler Hesaplama</h3>
            <p class="hc-subtitle">Doğduğunuz anda hangi gezegenlerin geri harekette (retrograde) olduğunu, karmik borçlarınızı ve içselleştirilmiş yeteneklerinizi analiz edin.</p>
        </div>

        <div class="hc-form-grid-2">
            <div class="hc-form-group">
                <label for="hc-br-birth">Doğum Tarihi *</label>
                <input type="date" id="hc-br-birth" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-br-time">Doğum Saati (Opsiyonel)</label>
                <input type="time" id="hc-br-time" value="12:00" class="hc-input">
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcDogumdaRetroHesapla()">℞ Doğum Retrolarımı Tespit Et</button>

        <div class="hc-result" id="hc-birth-retro-result">
            <div class="hc-br-summary-card" id="hc-br-summary">
                <!-- Retro sayısı ve genel profil buraya -->
            </div>

            <div class="hc-br-table-container">
                <h4 class="hc-br-section-title">🪐 8 Gezegenin Hareket Durumu ve Konumları</h4>
                <div class="hc-br-grid" id="hc-br-grid">
                    <!-- Gezegen durum kutuları buraya -->
                </div>
            </div>

            <div class="hc-br-report-card">
                <h4 class="hc-br-section-title">📜 Tespit Edilen Retroların Karmik ve Psikolojik Anlamları</h4>
                <div id="hc-br-details">
                    <!-- Retro detayları buraya -->
                </div>
            </div>
        </div>
    </div>
    <?php
}
