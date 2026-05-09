function hcBebekMamaHesapla() {
    const kilo = parseFloat(document.getElementById('hc-bmm-kilo').value);
    const ogun = parseInt(document.getElementById('hc-bmm-ogun').value);
    if (isNaN(kilo) || isNaN(ogun)) { alert('Lütfen bilgileri giriniz.'); return; }
    
    const gunluk = kilo * 150; // Standard 150ml/kg
    const ogunBasi = gunluk / ogun;
    
    document.getElementById('hc-res-bmm-miktar').innerText = Math.round(ogunBasi) + ' ml';
    document.getElementById('hc-bebek-mama-result').classList.add('visible');
}
