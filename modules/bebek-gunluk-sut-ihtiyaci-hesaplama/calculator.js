function hcBebekSutHesapla() {
    const kilo = parseFloat(document.getElementById('hc-bsi-kilo').value);
    if (isNaN(kilo)) { alert('Lütfen ağırlığı giriniz.'); return; }
    
    const toplam = kilo * 150;
    document.getElementById('hc-res-bsi-toplam').innerText = Math.round(toplam) + ' ml';
    document.getElementById('hc-bebek-sut-result').classList.add('visible');
}
