# Hesaplama Suite — Agent Talimatları

## Proje Özeti

Bu repo, **hesaplamaa.com** için geliştirilmiş bir WordPress eklentisidir.
Her hesap makinesi `modules/` altında bağımsız bir modül olarak yaşar.
Eklenti admin panelinde GitHub'dan tek tıkla güncellenir.

---

## Kullanıcı Sana Bir URL Verdiğinde

Kullanıcı bir hesap makinesi sayfasının URL'ini paylaştığında şu adımları izle:

### 1. Sayfayı Analiz Et
- URL'deki hesap makinesinin **giriş alanlarını** belirle
- **Hesaplama formülünü / mantığını** çıkart
- **Çıktı formatını** (sonuç tipi, birimler, yorumlar) anla
- Sayfa içeriğini okuyamazsan (403 vb.) web search veya genel bilgini kullan

### 2. Modül Slug'ı Belirle
- URL'den veya içerikten Türkçe, kısa bir slug türet
- Format: `kucuk-harf-tire-ile` (örn: `beden-kitle-indeksi`, `kredi-hesaplama`)
- Klasör: `modules/{slug}/`

### 3. Dört Dosya Oluştur

#### `modules/{slug}/meta.json`
```json
{
  "name": "Hesap Makinesi Adı (Türkçe)",
  "desc": "Ne hesapladığını bir cümleyle açıkla.",
  "shortcode": "[hc_{slug_alt_cizgi}]"
}
```
> slug'daki tireleri alt çizgiye çevir: `beden-kitle-indeksi` → `hc_beden_kitle_indeksi`

#### `modules/{slug}/calculator.php`
```php
<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_{slug_alt_cizgi}( $atts ) {
    wp_enqueue_script(
        'hc-{slug}',
        HC_PLUGIN_URL . 'modules/{slug}/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-{slug}-css',
        HC_PLUGIN_URL . 'modules/{slug}/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-{slug}">
        <h3>Hesap Makinesi Başlığı</h3>
        <!-- Form alanları buraya -->
        <button class="hc-btn" onclick="hc{FonksiyonAdi}Hesapla()">Hesapla</button>
        <div class="hc-result" id="hc-{slug}-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
```

#### `modules/{slug}/calculator.js`
- Tüm hesaplama mantığı saf JavaScript ile istemci tarafında çalışır (sunucu isteği yok)
- Ana fonksiyon adı: `hc{FonksiyonAdi}Hesapla()`
- Girdi validasyonu yap, eksik alan varsa `alert()` ile uyar
- Sonucu `.hc-result` div'ine yaz, `visible` class'ı ekle
- Sayıları Türkçe formatla: `n.toLocaleString('tr-TR')`

#### `modules/{slug}/calculator.css`
- Modüle özel stiller (genel stiller `assets/style.css`'te)
- Class prefix: `.hc-{slug}-` kullan
- Responsive: `@media (max-width: 480px)` ekle

### 4. Stil Kuralları

Global CSS sınıfları (`assets/style.css`'ten miras alır):
```
.hc-calculator      → ana wrapper
.hc-form-group      → her input grubu
.hc-btn             → hesapla butonu
.hc-result          → sonuç kutusu (başta display:none)
.hc-result.visible  → sonuç görünür hali
.hc-result-value    → büyük sonuç değeri
```

### 5. Commit ve Gönder

```bash
git add modules/{slug}/
git commit -m "feat: {Hesap Makinesi Adı} modülü eklendi

Shortcode: [hc_{slug_alt_cizgi}]
Kaynak: {URL}"
```

**Araç türüne göre:**

| Araç | Sonraki adım |
|------|-------------|
| **Claude Code** (web/desktop) | `git push origin main` ile direkt push yap |
| **Codex** | Push yapma. Commit'i yap, ardından arayüzdeki **"PR oluştur"** butonuna bas. Kullanıcı PR'ı merge edecek. |

> Codex'te remote tanımlı olmayabilir. `git push` başarısız olursa PR oluştur yeterli.

---

## Proje Dosya Yapısı

```
hesaplama-wp-addons/
├── hesaplama-suite.php              ← Ana eklenti (dokunma)
├── includes/
│   ├── class-github-updater.php     ← GitHub güncelleme motoru
│   ├── class-calculator-loader.php  ← Modül yükleyici
│   └── class-ai-provider.php        ← AI API bağlantısı
├── admin/
│   ├── class-admin-page.php         ← WP admin sekmeleri
│   ├── class-ai-writer.php          ← Yazı oluşturucu
│   ├── class-post-metabox.php       ← Post editör metabox
│   ├── admin.js / admin.css
│   └── metabox.js / metabox.css
├── assets/
│   ├── style.css                    ← Global frontend stiller
│   └── main.js                      ← Global frontend JS
└── modules/
    ├── kredi-karti-asgari-odeme/    ← Örnek modül
    │   ├── meta.json
    │   ├── calculator.php
    │   ├── calculator.js
    │   └── calculator.css (opsiyonel)
    └── ask-uyumu/                   ← Örnek modül
```

---

## Mevcut Modüller

| Slug | Shortcode | Açıklama |
|------|-----------|----------|
| `kredi-karti-asgari-odeme` | `[hc_kredi_karti_asgari_odeme]` | Kredi kartı asgari ödeme & faiz hesabı |
| `ask-uyumu` | `[hc_ask_uyumu]` | Burç & numeroloji aşk uyumu |

---

## Önemli Kurallar

- **Mevcut modüllere kesinlikle dokunma.** `modules/` altındaki mevcut klasörler değiştirilemez. Sadece yeni klasör ekle.
- **Sunucuya istek atmayan** (client-side) hesaplamalar yaz — PHP sadece HTML render eder
- **Türkçe** etiket, placeholder ve hata mesajları kullan
- **`HC_VERSION`** sabitini değiştirme — sadece modül ekle
- **`hesaplama-suite.php`** ana dosyasına dokunma
- `assets/style.css` global stilleri değiştirme, modüle özel CSS'i kendi dosyasına yaz
- Her modül tamamen bağımsız çalışmalı, diğer modüllere bağımlılık olmamalı
- Formülleri ve hesaplama mantığını yorumsuz, temiz kod olarak yaz

---

## Referans: Basit Modül Örneği

Kullanıcı `https://example.com/bmi-hesaplama` verirse:

**`modules/beden-kitle-indeksi/meta.json`**
```json
{
  "name": "Beden Kitle İndeksi (BMI)",
  "desc": "Boy ve kiloya göre BMI hesaplar, kategori ve yorum verir.",
  "shortcode": "[hc_beden_kitle_indeksi]"
}
```

**`modules/beden-kitle-indeksi/calculator.js`** (özet)
```javascript
function hcBedenKitleIndeksiHesapla() {
    var boy  = parseFloat(document.getElementById('hc-bki-boy').value);
    var kilo = parseFloat(document.getElementById('hc-bki-kilo').value);
    if (!boy || !kilo) { alert('Lütfen tüm alanları doldurun.'); return; }
    var bmi = kilo / ((boy / 100) * (boy / 100));
    // ... sonucu göster
    document.getElementById('hc-bki-result').classList.add('visible');
}
```
