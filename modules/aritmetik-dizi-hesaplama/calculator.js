function hcAritmetikDiziHesapla() {
    const a1 = parseFloat(document.getElementById('hc-as-a1').value);
    const d = parseFloat(document.getElementById('hc-as-d').value);
    const n = parseInt(document.getElementById('hc-as-n').value);

    if (isNaN(a1) || isNaN(d) || isNaN(n)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (n <= 0) {
        alert('Terim sayısı (n) 0\'dan büyük olmalıdır.');
        return;
    }

    // an = a1 + (n - 1) * d
    const an = a1 + (n - 1) * d;
    
    // Sn = n * (a1 + an) / 2
    const sn = n * (a1 + an) / 2;

    document.getElementById('hc-res-as-an').innerText = an.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-res-as-sn').innerText = sn.toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    document.getElementById('hc-as-result').classList.add('visible');
}
