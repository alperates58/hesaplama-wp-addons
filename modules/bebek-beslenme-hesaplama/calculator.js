function hcBebekBeslenmeHesapla() {
    const kilo = parseFloat(document.getElementById('hc-bb-kilo').value);
    const ogunSayisi = parseInt(document.getElementById('hc-bb-ogun').value);

    if (isNaN(kilo) || kilo <= 0) {
        alert('Lütfen bebeğinizin ağırlığını giriniz.');
        return;
    }

    // Standard: 150ml per kg
    const gunlukToplam = kilo * 150;
    const ogunBasi = gunlukToplam / ogunSayisi;
    
    // Sagma miktari is usually slightly more or same as one feeding
    const sagmaMiktari = ogunBasi;

    document.getElementById('hc-res-bb-toplam').innerText = Math.round(gunlukToplam) + ' ml';
    document.getElementById('hc-res-bb-ogun').innerText = Math.round(ogunBasi) + ' ml';
    document.getElementById('hc-res-bb-sagma').innerText = Math.round(sagmaMiktari) + ' ml';

    document.getElementById('hc-bebek-beslenme-result').classList.add('visible');
    
    if (window.innerWidth < 480) {
        document.getElementById('hc-bebek-beslenme-result').scrollIntoView({ behavior: 'smooth' });
    }
}
