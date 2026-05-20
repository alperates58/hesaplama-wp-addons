<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ai_model_egitim_maliyeti_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ai-model-egitim-maliyeti-tahmini-hesaplama',
        HC_PLUGIN_URL . 'modules/ai-model-egitim-maliyeti-tahmini-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-ai-model-egitim">
        <h3>AI Model Eğitim Maliyeti Tahmini Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-met-parametre">Model Parametre Boyutu (Milyar - B)</label>
            <input type="number" id="hc-met-parametre" min="0.1" step="0.1" value="7" />
            <small style="color:#666;font-size:12px;">Örn: Llama-3-8B için 8, Llama-3-70B için 70 girin.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-met-token">Eğitim Veri Kümesi Boyutu (Milyar Token - B)</label>
            <input type="number" id="hc-met-token" min="0.1" step="0.1" value="300" />
            <small style="color:#666;font-size:12px;">Modelin eğitiminde taranacak milyar kelime/token sayısı.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-met-gpu-tip">Kullanılacak GPU / Donanım</label>
            <select id="hc-met-gpu-tip" onchange="hcMetGpuDegisti()">
                <option value="H100">NVIDIA H100 SXM (Saniyede ~1.000 TFLOPS FP16/BF16)</option>
                <option value="A100">NVIDIA A100 SXM (Saniyede ~312 TFLOPS FP16/BF16)</option>
                <option value="L40S">NVIDIA L40S (Saniyede ~366 TFLOPS FP16/BF16)</option>
                <option value="RTX4090">NVIDIA RTX 4090 (Saniyede ~83 TFLOPS FP16/BF16)</option>
                <option value="custom">Özel GPU (TFLOPS belirt)...</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-met-custom-tflops-gr" style="display: none;">
            <label for="hc-met-custom-tflops">Özel GPU TFLOPS Değeri (FP16/BF16 dense)</label>
            <input type="number" id="hc-met-custom-tflops" min="1" value="100" />
        </div>

        <div class="hc-form-group">
            <label for="hc-met-gpu-fiyat">GPU Saatlik Kira Ücreti ($ / Saat / adet)</label>
            <input type="number" id="hc-met-gpu-fiyat" min="0.05" step="0.01" value="2.20" />
            <small style="color:#666;font-size:12px;">1 adet GPU'nun saatlik bulut kiralama bedeli (örn: H100 için ~$2.20, A100 için ~$1.20).</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-met-mfu">Küme Donanım Verimliliği - MFU (%)</label>
            <input type="number" id="hc-met-mfu" min="1" max="100" value="40" />
            <small style="color:#666;font-size:12px;">Model eğitiminde iletişim ve bellek gecikmeleri nedeniyle GPU'lar tam hızda çalışmaz. Tipik MFU %35 - %50 arasındadır.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-met-dolar">Dolar Kuru (USD/TRY)</label>
            <input type="number" id="hc-met-dolar" min="1" step="0.01" value="36.00" />
        </div>

        <button class="hc-btn" onclick="hcAiModelEgitimMaliyetiTahminiHesapla()">Eğitim Maliyeti Hesapla</button>

        <div class="hc-result" id="hc-ai-model-egitim-result">
            <table>
                <tr>
                    <td>Toplam FLOPs Gereksinimi</td>
                    <td><strong id="hc-met-res-flops">-</strong></td>
                </tr>
                <tr>
                    <td>Tahmini Toplam GPU Saati (GPU Hours)</td>
                    <td><strong id="hc-met-res-gpu-saat">-</strong></td>
                </tr>
                <tr>
                    <td>100 GPU ile Tahmini Eğitim Süresi</td>
                    <td><strong id="hc-met-res-sure-100">-</strong></td>
                </tr>
                <tr>
                    <td>Tahmini Eğitim Maliyeti ($)</td>
                    <td><strong id="hc-met-res-maliyet-usd" style="color: var(--hc-front-blue);">-</strong></td>
                </tr>
                <tr>
                    <td>Tahmini Eğitim Maliyeti (₺)</td>
                    <td><strong class="hc-result-value" id="hc-met-res-maliyet-try" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
