function hcRateChangeHesapla() {
    const start = parseFloat(document.getElementById('hc-rc-start').value) || 0;
    const end = parseFloat(document.getElementById('hc-rc-end').value) || 0;

    if (start === 0) {
        alert('Eski kur sıfır olamaz.');
        return;
    }

    const diff = ((end - start) / start) * 100;

    document.getElementById('hc-rc-res-val').innerText = '%' + Math.abs(diff).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    
    const textEl = document.getElementById('hc-rc-text');
    if (diff > 0) {
        textEl.innerText = "Değer Artışı";
        textEl.style.color = "#27ae60";
    } else if (diff < 0) {
        textEl.innerText = "Değer Azalışı";
        textEl.style.color = "#c0392b";
    } else {
        textEl.innerText = "Değişim Yok";
        textEl.style.color = "#2c3e50";
    }

    document.getElementById('hc-rate-change-result').classList.add('visible');
}
