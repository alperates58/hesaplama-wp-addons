<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_sonrasi_depresyon_skoru( $atts ) {
    wp_enqueue_script(
        'hc-epds',
        HC_PLUGIN_URL . 'modules/dogum-sonrasi-depresyon-skoru/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-dogum-sonrasi-depresyon-skoru">
        <h3>Doğum Sonrası Depresyon Tarama Skoru Hesaplama</h3>
        <p style="font-size:0.9em; margin-bottom:20px;">Lütfen son 7 gün içindeki hislerinizi en iyi yansıtan seçeneği işaretleyin.</p>
        
        <?php
        $questions = [
            "Gülebildim ve olayların komik tarafını görebildim.",
            "Geleceğe zevkle bakabildim.",
            "Bir şeyler kötü gittiğinde gereksiz yere kendimi suçladım.",
            "Sebepsiz yere kendimi endişeli ve kaygılı hissettim.",
            "Sebepsiz yere korktum ve panikledim.",
            "Olaylar karşısında baş edemeyecek kadar bunaldım.",
            "Mutsuzluktan dolayı uyumakta zorluk çektim.",
            "Kendimi üzgün ve berbat hissettim.",
            "Mutsuzluktan dolayı ağladım.",
            "Kendime zarar verme düşüncesi aklıma geldi."
        ];
        
        foreach ($questions as $i => $q): ?>
        <div class="hc-form-group">
            <label><?php echo ($i+1) . ". " . $q; ?></label>
            <select class="hc-epds-q" id="hc-epds-q-<?php echo $i; ?>">
                <option value="0">Hiçbir zaman / Eskisi kadar</option>
                <option value="1">Pek fazla değil / Biraz az</option>
                <option value="2">Bazen / Oldukça fazla</option>
                <option value="3">Çoğu zaman / Her zaman</option>
            </select>
        </div>
        <?php endforeach; ?>

        <button class="hc-btn" onclick="hcEpdsHesapla()">Skoru Hesapla</button>
        
        <div class="hc-result" id="hc-epds-result">
            <div class="hc-result-value" id="hc-epds-score">0</div>
            <p id="hc-epds-yorum"></p>
            <div class="hc-info-box" style="margin-top:15px; font-size:0.9em; color:#d9534f; border:1px solid #d9534f; padding:10px;">
                <strong>Önemli:</strong> 10. soruya "Hiçbir zaman" dışında bir cevap verdiyseniz veya toplam skorunuz yüksekse, lütfen vakit kaybetmeden bir uzmana başvurun.
            </div>
        </div>
    </div>
    <?php
}
