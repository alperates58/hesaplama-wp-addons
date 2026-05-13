function hcRelFreqHesapla() {
    const freq = parseFloat(document.getElementById('hc-rf-freq').value);
    const total = parseFloat(document.getElementById('hc-rf-total').value);

    if (isNaN(freq) || isNaN(total) || total <= 0 || freq < 0) {
        alert('Lütfen geçerli değerler girin (Toplam sayı 0\'dan büyük, frekans 0 veya daha fazla olmalıdır).');
        return;
    }

    const relFreq = freq / total;
    
    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
    const percent = (val) => '%' + (val * 100).toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    document.getElementById('hc-res-rf-dec').innerText = fmt(relFreq);
    document.getElementById('hc-res-rf-pct').innerText = percent(relFreq);

    document.getElementById('hc-bagil-frekans-hesaplama-result').classList.add('visible');
}
