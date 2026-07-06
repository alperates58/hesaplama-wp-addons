# Değişen Dosyalar Raporu (Changed Files Report)

Bu rapor, Faz 1 kapsamında Hesaplama Suite eklentisinde yapılan tüm dosya değişikliklerini ve bunların sistem üzerindeki etkilerini açıklar.

---

## 📁 1. Yeni Oluşturulan Dosyalar (Registry & Sözlük İskeletleri)
* **[formula-dictionary.json](file:///c:/Users/alper.ates.LIDER/Desktop/hesaplama-wp-addons/assets/data/formula-dictionary.json):** Merkezi formül/katsayı veri deposu.
* **[source-registry.json](file:///c:/Users/alper.ates.LIDER/Desktop/hesaplama-wp-addons/assets/data/source-registry.json):** Katsayı referans kaynaklarının kayıt defteri.
* **[module-registry.json](file:///c:/Users/alper.ates.LIDER/Desktop/hesaplama-wp-addons/assets/data/module-registry.json):** Modül entegrasyonlarının ve özelliklerinin kayıt defteri.
* **[category-disclaimers.json](file:///c:/Users/alper.ates.LIDER/Desktop/hesaplama-wp-addons/assets/data/category-disclaimers.json):** Kategori bazlı sorumluluk reddi uyarıları (disclaimers) şablonları.

---

## 🛠️ 2. Değiştirilen Kod Dosyaları
* **[class-calculator-loader.php](file:///c:/Users/alper.ates.LIDER/Desktop/hesaplama-wp-addons/includes/class-calculator-loader.php):**
  * Modül kayıt defterini okuma ve entegrasyon doğrulaması yapısı eklendi.
  * Registry'de yer almayan modüller için hata vermeden geriye uyumlu çalışma (fallback) ve log uyarısı eklendi.
  * PHP'deki sözlük ve disclaimer verilerini JS ortamına senkron aktarmak için inline script enjeksiyonu (`wp_add_inline_script`) eklendi.
  * Disclaimer gerektiren modüllerin altına otomatik placeholder container (`.hc-disclaimer-box`) basma mantığı entegre edildi.
* **[main.js](file:///c:/Users/alper.ates.LIDER/Desktop/hesaplama-wp-addons/assets/main.js):**
  * Katsayıları güvenli okumayı sağlayan global `window.hcGetFormulaConstant(key, defaultValue)` helper fonksiyonu tanımlandı.
  * `.hc-disclaimer-box` elementlerini bulup localize verilerle dolduran ve görünür kılan `initCategoryDisclaimers()` fonksiyonu entegre edildi.
  * `assets/style.css` dosyasına müdahale etmemek amacıyla, disclaimer kutularının CSS stilleri dinamik head style enjeksiyonuyla JS tarafında tanımlandı.

---

## 📊 3. Sistem Etki Analizi

| Sistem Bileşeni | Değişiklik Durumu | Etki Derecesi | Açıklama / Garanti |
| :--- | :---: | :---: | :--- |
| **WordPress Dashboard** | Etkilenmedi | **Sıfır Etki** | Dashboard rotaları, admin menüleri veya PHP admin sınıflarına dokunulmamıştır. |
| **GitHub Update Akışı** | Etkilenmedi | **Sıfır Etki** | Update motoruna (`class-github-updater.php`) veya eklenti versiyon sabitlerine dokunulmamıştır. |
| **Shortcode / Modül Yükleme** | Değiştirildi (Geriye Uyumlu) | **Sıfır Risk** | Shortcode kayıt mekanizması korunmuş; kayıt dışı modüller için fallback devrededir. |
| **Modül Kodları (calculator.js/php)**| Etkilenmedi | **Sıfır Etki** | 2.939 modülün hiçbirinin PHP/JS dosyasına dokunulmamıştır. |
