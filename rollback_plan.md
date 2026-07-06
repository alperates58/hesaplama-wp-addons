# Geri Dönüş Planı (Rollback Plan)

Faz 1 güncellemesi sırasında herhangi bir beklenmedik problem oluşması (örneğin WordPress admin panelinde bir yavaşlama, JS çakışması veya sunucu hatası) durumunda eski davranışa tamamen geri dönmek için uygulanacak adımlar aşağıda belirtilmiştir.

---

## ↩️ 1. Hızlı Geri Alma (Git Revert)
Değişiklikler henüz commit edilmediği için, Git üzerinden working directory'yi Faz 1 öncesi temiz haline getirmek son derece kolaydır. Terminalde sırasıyla aşağıdaki komutları çalıştırmanız yeterlidir:

```bash
# Değiştirilen dosyaları orijinal haline getirin:
git checkout -- assets/main.js includes/class-calculator-loader.php

# Yeni oluşturulan veri klasörünü silin:
Remove-Item -Recurse -Force assets/data
```

Bu iki komut çalıştırıldıktan sonra sistem **Faz 1 öncesindeki orijinal haline** 1 saniye içinde geri dönecektir.

---

## 🛠️ 2. Manuel Geri Alma (Git Olmadan)
Git terminal erişimi bulunmuyorsa, FTP veya File Manager üzerinden aşağıdaki manuel işlemler yapılabilir:

1. **`includes/class-calculator-loader.php`** dosyasını açın.
2. Aşağıdaki fonksiyon ve özellikleri silin:
   - `private $module_registry` özelliği
   - `private function load_module_registry()` metodu
   - `register_shortcodes()`, `maybe_register_single_tag()`, `render_shortcode()` ve `enqueue_assets()` fonksiyonlarındaki eklenen satırları temizleyin (Değişikliklerin detayları için [changed_files_report.md](file:///c:/Users/alper.ates.LIDER/Desktop/hesaplama-wp-addons/changed_files_report.md) dosyasına bakınız).
3. **`assets/main.js`** dosyasını açıp sonuna eklenen `window.hcGetFormulaConstant` ve `initCategoryDisclaimers` fonksiyonlarını silin.
4. **`assets/data/`** klasörünü tamamen silin.

---

## ⚙️ 3. Geçici Devre Dışı Bırakma (Kill Switch)
Mevcut Faz 1 kodlarını silmeden sadece merkezi yapıyı devre dışı bırakmak isterseniz:
1. `assets/data/module-registry.json` dosyasının adını `module-registry.json.disabled` yapın veya dosya içeriğini temizleyin (`{ "modules": [] }`).
2. Bu durumda, fallback sistemi devreye girecek ve loader otomatik olarak eski glob tarama yöntemine geri dönecektir. JS tarafında da herhangi bir veri localize edilmeyecektir.
