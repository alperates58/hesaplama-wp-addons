function hcKacGunOlduHesapla() {
    const dVal = document.getElementById('hc-kgo-date').value;
    if (!dVal) { alert('Lütfen tarih seçin.'); return; }

    const d = new Date(dVal);
    const now = new Date();
    
    if (d > now) {
        document.getElementById('hc-kgo-val').innerText = "Tarih henüz gelmedi.";
    } else {
        const diffTime = Math.abs(now - d);
        const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
        document.getElementById('hc-kgo-val').innerText = diffDays.toLocaleString('tr-TR') + " gün oldu";
    }

    document.getElementById('hc-kgo-result').classList.add('visible');
}
