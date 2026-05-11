function hcOhmGucHesapla() {
    const v = parseFloat(document.getElementById('hc-og-v').value);
    const i = parseFloat(document.getElementById('hc-og-i').value);

    if (isNaN(v) || isNaN(i)) {
        alert('Lütfen gerilim ve akım değerlerini girin.');
        return;
    }

    const p = v * i;

    document.getElementById('hc-og-res-total').innerText = p.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-og-result').classList.add('visible');
}
