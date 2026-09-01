<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ay_dugumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ay-dugumu-hesaplama',
        HC_PLUGIN_URL . 'modules/ay-dugumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ay-dugumu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ay-dugumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ay-dugumu-hesaplama">
        <div class="hc-header">
            <h3>Ay Düğümleri ve Karmik Yaşam Amacı Hesaplama</h3>
            <p class="hc-subtitle">Kuzey ve Güney Ay Düğümlerinizi (KAD & GAD) hesaplayarak ruhunuzun geçmiş yaşam alışkanlıklarını ve bu hayattaki kadersel tekamül yönünüzü keşfedin.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-node-date">Doğum Tarihi *</label>
            <input type="date" id="hc-node-date" value="1995-05-15" class="hc-input" required>
        </div>

        <button type="button" class="hc-btn" onclick="hcAyDugumuHesapla()">☊ Ay Düğümlerini Hesapla</button>

        <div class="hc-result" id="hc-ay-dugumu-result">
            <div class="hc-node-dual-grid">
                <div class="hc-node-card hc-node-kad">
                    <div class="hc-node-icon">☊</div>
                    <div class="hc-node-badge">Kuzey Ay Düğümü (KAD)</div>
                    <div class="hc-node-sign" id="hc-node-north-sign">-</div>
                    <div class="hc-node-deg" id="hc-node-north-deg">-</div>
                    <div class="hc-node-role">Geliştirilecek Ruhsal Hedef</div>
                </div>

                <div class="hc-node-card hc-node-gad">
                    <div class="hc-node-icon">☋</div>
                    <div class="hc-node-badge">Güney Ay Düğümü (GAD)</div>
                    <div class="hc-node-sign" id="hc-node-south-sign">-</div>
                    <div class="hc-node-deg" id="hc-node-south-deg">-</div>
                    <div class="hc-node-role">Aşılması Gereken Konfor Alanı</div>
                </div>
            </div>

            <div class="hc-node-report-card">
                <h4 class="hc-node-report-title">🧭 Kadersel Tekamül ve Ruhun Yol Haritası</h4>
                <div id="hc-node-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
