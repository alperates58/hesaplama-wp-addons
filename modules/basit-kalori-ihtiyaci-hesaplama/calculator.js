function hcBasitKaloriHesapla() {
    const kilo = parseFloat(document.getElementById('hc-bk-kilo').value);
    const katsayi = parseFloat(document.getElementById('hc-bk-hedef').value);

    if (!kilo) {
        alert('Lütfen kilonuzu girin.');
        return;
    }

    const sonuc = kilo * katsayi;
    const aralikUst = kilo * (katsayi + 4);

    document.getElementById('hc-bk-value').innerText = 
        Math.round(sonuc).toLocaleString('tr-TR') + ' - ' + 
        Math.round(aralikUst).toLocaleString('tr-TR') + ' kcal';

    document.getElementById('hc-basit-kalori-result').classList.add('visible');
}
