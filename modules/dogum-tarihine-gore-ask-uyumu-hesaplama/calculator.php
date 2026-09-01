<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_tarihine_gore_ask_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ask-uyum-dt',
        HC_PLUGIN_URL . 'modules/dogum-tarihine-gore-ask-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ask-uyum-dt-css',
        HC_PLUGIN_URL . 'modules/dogum-tarihine-gore-ask-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ask-dt">
        <div class="hc-header">
            <h3>Doğum Tarihine Göre Aşk Uyumu Hesaplama</h3>
            <p class="hc-subtitle">Her iki partnerin doğum tarihlerini girerek Güneş, Ay, Venüs konumları ve Numerolojik Yaşam Yolu sayılarıyla tam kapsamlı aşk uyumunuzu öğrenin.</p>
        </div>

        <div class="hc-adt-persons-grid">
            <div class="hc-adt-person-box">
                <div class="hc-adt-pbadge">👤 1. Kişi (Siz)</div>
                <div class="hc-form-group">
                    <label for="hc-adt-date1">Doğum Tarihi *</label>
                    <input type="date" id="hc-adt-date1" value="1995-05-15" class="hc-input" required>
                </div>
            </div>

            <div class="hc-adt-person-box">
                <div class="hc-adt-pbadge hc-badge-p2">❤️ 2. Kişi (Partner)</div>
                <div class="hc-form-group">
                    <label for="hc-adt-date2">Doğum Tarihi *</label>
                    <input type="date" id="hc-adt-date2" value="1996-09-20" class="hc-input" required>
                </div>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcAskDtUyumHesapla()">💘 Aşk ve Yıldız Uyumunu Hesapla</button>

        <div class="hc-result" id="hc-adt-result">
            <div class="hc-adt-hero" id="hc-adt-hero"></div>

            <div class="hc-adt-section">
                <h4 class="hc-adt-sec-title">📊 4 Temel Aşk ve Çekim Boyutu</h4>
                <div class="hc-adt-dim-grid" id="hc-adt-dim-grid"></div>
            </div>

            <div class="hc-adt-section">
                <h4 class="hc-adt-sec-title">📖 Kapsamlı Astrolojik & Numerolojik Aşk Yorumu</h4>
                <div class="hc-result-content" id="hc-adt-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
