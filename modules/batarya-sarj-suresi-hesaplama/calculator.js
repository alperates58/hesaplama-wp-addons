function hcBataryaSarjHesapla() {
    const kapasite = parseFloat(document.getElementById('hc-bs-kapasite').value);
    const akim = parseFloat(document.getElementById('hc-bs-akim').value);
    const verim = parseFloat(document.getElementById('hc-bs-verim').value) / 100;

    if (isNaN(kapasite) || isNaN(akim) || isNaN(verim) || akim <= 0 || verim <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // t = (Kapasite / Akım) * (1 / Verim)
    const toplamSaat = (kapasite / akim) * (1 / verim);
    const tamSaat = Math.floor(toplamSaat);
    const dakikalar = Math.round((toplamSaat - tamSaat) * 60);

    document.getElementById('hc-bs-res-saat').innerText = tamSaat + ' saat ' + dakikalar + ' dakika';
    document.getElementById('hc-bs-res-decimal').innerText = toplamSaat.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' saat';
    
    document.getElementById('hc-bs-result').classList.add('visible');
}
