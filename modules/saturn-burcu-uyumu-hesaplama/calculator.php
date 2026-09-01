<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_saturn_burcu_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-saturn-uyum',
        HC_PLUGIN_URL . 'modules/saturn-burcu-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-saturn-uyum-css',
        HC_PLUGIN_URL . 'modules/saturn-burcu-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-saturn-uyum">
        <div class="hc-header">
            <h3>Satürn Burcu Uyumu Hesaplama (Sadakat ve Kalıcılık Uyumu)</h3>
            <p class="hc-subtitle">Doğum tarihlerinizi girerek Satürn burçlarınızı otomatik tespit edin; uzun vadeli güven, sadakat, sorumluluk ve evlilik dayanıklılığınızı öğrenin.</p>
        </div>

        <div class="hc-sat-persons-grid">
            <div class="hc-sat-person-box">
                <div class="hc-sat-pbadge">👤 1. Kişi (Siz)</div>
                <div class="hc-form-group">
                    <label for="hc-sat-d1">Doğum Tarihi *</label>
                    <input type="date" id="hc-sat-d1" value="1995-05-15" class="hc-input" required>
                </div>
            </div>

            <div class="hc-sat-person-box">
                <div class="hc-sat-pbadge hc-badge-p2">❤️ 2. Kişi (Partner)</div>
                <div class="hc-form-group">
                    <label for="hc-sat-d2">Doğum Tarihi *</label>
                    <input type="date" id="hc-sat-d2" value="1996-09-20" class="hc-input" required>
                </div>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcSaturnUyumHesapla()">🪐 Satürn ve Sadakat Uyumunu Hesapla</button>

        <div class="hc-result" id="hc-su-result">
            <div class="hc-sat-hero" id="hc-sat-hero"></div>

            <div class="hc-sat-section">
                <h4 class="hc-sat-sec-title">📊 4 Kalıcılık ve Sadakat Boyutu</h4>
                <div class="hc-sat-dim-grid" id="hc-sat-dim-grid"></div>
            </div>

            <div class="hc-sat-section">
                <h4 class="hc-sat-sec-title">📖 Satürn - Satürn Sinastri Analizi</h4>
                <div class="hc-result-content" id="hc-su-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
