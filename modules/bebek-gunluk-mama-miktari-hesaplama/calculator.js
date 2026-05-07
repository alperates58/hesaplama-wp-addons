function hcBebekGunlukMamaHesapla() {
    const kilo = parseFloat(document.getElementById('hc-bgm-kilo').value);
    if (isNaN(kilo)) { alert('Lütfen ağırlığı giriniz.'); return; }
    
    const toplam = kilo * 150;
    document.getElementById('hc-res-bgm-toplam').innerText = Math.round(toplam) + ' ml';
    document.getElementById('hc-bebek-gunluk-mama-result').classList.add('visible');
}
