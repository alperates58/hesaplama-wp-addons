function hcSutSagmaHesapla() {
    const kilo = parseFloat(document.getElementById('hc-ssm-kilo').value);
    const aralik = parseFloat(document.getElementById('hc-ssm-aralik').value);
    if (isNaN(kilo) || isNaN(aralik)) { alert('Lütfen bilgileri giriniz.'); return; }
    
    const gunluk = kilo * 150;
    const seansSayisi = 24 / aralik;
    const miktar = gunluk / seansSayisi;
    
    document.getElementById('hc-res-ssm-miktar').innerText = Math.round(miktar) + ' ml';
    document.getElementById('hc-sut-sagma-result').classList.add('visible');
}
