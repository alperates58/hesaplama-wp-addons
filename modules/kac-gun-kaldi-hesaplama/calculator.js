function hcKacGunKaldiHesapla() {
    const dVal = document.getElementById('hc-kgk-date').value;
    if (!dVal) { alert('Lütfen tarih seçin.'); return; }

    const d = new Date(dVal);
    const now = new Date();
    
    if (d < now) {
        document.getElementById('hc-kgk-val').innerText = "Tarih geçmişte kaldı.";
    } else {
        const diffTime = Math.abs(d - now);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        document.getElementById('hc-kgk-val').innerText = diffDays.toLocaleString('tr-TR') + " gün kaldı";
    }

    document.getElementById('hc-kgk-result').classList.add('visible');
}
