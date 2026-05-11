function hcDisliOraniHesapla() {
    const giris = parseFloat(document.getElementById('hc-do-giris').value);
    const cikis = parseFloat(document.getElementById('hc-do-cikis').value);

    if (isNaN(giris) || isNaN(cikis) || giris <= 0) {
        alert('Lütfen geçerli diş sayıları girin.');
        return;
    }

    // Oran = Cikis / Giris
    const oran = cikis / giris;

    document.getElementById('hc-do-res-oran').innerText = oran.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' : 1';
    document.getElementById('hc-do-res-decimal').innerText = 'Ondalık Değer: ' + oran.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    
    document.getElementById('hc-do-result').classList.add('visible');
}
