function hcBOIHesapla() {
    const d1 = parseFloat(document.getElementById('hc-boi-d1').value);
    const d2 = parseFloat(document.getElementById('hc-boi-d2').value);
    const f = parseFloat(document.getElementById('hc-boi-f').value);

    if (isNaN(d1) || isNaN(d2) || isNaN(f)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (f <= 0) {
        alert('Seyreltme faktörü 0 olamaz.');
        return;
    }

    // P = 1 / Seyreltme Faktörü (Genellikle P formülde 0-1 arası bir değerdir)
    // Eğer kullanıcı 'f' olarak 100 giriyorsa, P = 1/100 olmalı.
    // Ancak kullanıcı arayüzünde 'f' direkt çarpım faktörü olarak istenebilir.
    // Standart formül: (D1 - D2) / P. P = Örnek Hacmi / Toplam Hacim.
    // Biz 'f'yi Toplam Hacim / Örnek Hacmi olarak alalım.
    const boi = (d1 - d2) * f;

    document.getElementById('hc-boi-val').innerText = boi.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' mg/L';
    document.getElementById('hc-boi-result').classList.add('visible');
}
