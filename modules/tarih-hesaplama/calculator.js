function hcTarihHesapla() {
    const d1Val = document.getElementById('hc-th-date1').value;
    const d2Val = document.getElementById('hc-th-date2').value;

    if (!d1Val || !d2Val) { alert('Lütfen her iki tarihi de seçin.'); return; }

    const d1 = new Date(d1Val);
    const d2 = new Date(d2Val);
    
    const diffTime = Math.abs(d2 - d1);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    document.getElementById('hc-th-val').innerText = diffDays.toLocaleString('tr-TR') + " gün";
    document.getElementById('hc-th-result').classList.add('visible');
}
