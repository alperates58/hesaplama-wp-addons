<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cin_astrolojisi_uyumu( $atts ) {
    wp_enqueue_script(
        'hc-cin-comp',
        HC_PLUGIN_URL . 'modules/cin-astrolojisi-uyumu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cin-comp-css',
        HC_PLUGIN_URL . 'modules/cin-astrolojisi-uyumu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cin-astrolojisi-uyumu">
        <div class="hc-header">
            <h3>Çin Astrolojisi Uyumu Hesaplama</h3>
            <p class="hc-subtitle">Çin Zodyak burçlarınızı seçerek veya doğum tarihinizi girerek San He (Üçlü Uyum), Liu He (Gizli Dost) ve Elementel enerji rezonansınızı keşfedin.</p>
        </div>

        <div class="hc-ca-grid">
            <div class="hc-form-group">
                <label for="hc-cin-sel1">1. Kişi Çin Burcu *</label>
                <select id="hc-cin-sel1" class="hc-input">
                    <option value="Fare">🐀 Fare (Zeki & Çekici)</option>
                    <option value="Öküz">🐂 Öküz (Sabırlı & Güvenilir)</option>
                    <option value="Kaplan">🐅 Kaplan (Cesur & Tutkulu)</option>
                    <option value="Tavşan">🐇 Tavşan (Zarif & Barışçıl)</option>
                    <option value="Ejderha" selected>🐉 Ejderha (Karizmatik & Lider)</option>
                    <option value="Yılan">🐍 Yılan (Bilge & Gizemli)</option>
                    <option value="At">🐎 At (Özgür & Dinamik)</option>
                    <option value="Keçi">🐐 Keçi (Sanatçı & Şefkatli)</option>
                    <option value="Maymun">🐒 Maymun (Kurnaz & Eğlenceli)</option>
                    <option value="Horoz">🐓 Horoz (Çalışkan & Dürüst)</option>
                    <option value="Köpek">🐕 Köpek (Sadık & Koruyucu)</option>
                    <option value="Domuz">🐖 Domuz (Cömert & Samimi)</option>
                </select>
            </div>

            <div class="hc-form-group">
                <label for="hc-cin-sel2">2. Kişi Çin Burcu *</label>
                <select id="hc-cin-sel2" class="hc-input">
                    <option value="Fare">🐀 Fare (Zeki & Çekici)</option>
                    <option value="Öküz">🐂 Öküz (Sabırlı & Güvenilir)</option>
                    <option value="Kaplan">🐅 Kaplan (Cesur & Tutkulu)</option>
                    <option value="Tavşan">🐇 Tavşan (Zarif & Barışçıl)</option>
                    <option value="Ejderha">🐉 Ejderha (Karizmatik & Lider)</option>
                    <option value="Yılan">🐍 Yılan (Bilge & Gizemli)</option>
                    <option value="At">🐎 At (Özgür & Dinamik)</option>
                    <option value="Keçi">🐐 Keçi (Sanatçı & Şefkatli)</option>
                    <option value="Maymun" selected>🐒 Maymun (Kurnaz & Eğlenceli)</option>
                    <option value="Horoz">🐓 Horoz (Çalışkan & Dürüst)</option>
                    <option value="Köpek">🐕 Köpek (Sadık & Koruyucu)</option>
                    <option value="Domuz">🐖 Domuz (Cömert & Samimi)</option>
                </select>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcCinUyumuHesapla()">🔮 Çin Astrolojisi Uyumunu Hesapla</button>

        <div class="hc-result" id="hc-cin-u-result">
            <div class="hc-ca-hero" id="hc-ca-hero"></div>

            <div class="hc-ca-section">
                <h4 class="hc-ca-sec-title">📊 4 Çin Zodyak Boyutu</h4>
                <div class="hc-ca-dim-grid" id="hc-ca-dim-grid"></div>
            </div>

            <div class="hc-ca-section">
                <h4 class="hc-ca-sec-title">📖 Detaylı Doğu Astrolojisi Analizi</h4>
                <div class="hc-result-desc" id="hc-cin-u-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
