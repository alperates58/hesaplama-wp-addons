function hcEmzirmeKaloriHesapla() {
    const tdee = parseFloat(document.getElementById('hc-lc-tdee').value);
    const extra = parseFloat(document.getElementById('hc-lc-ay').value);

    if (!tdee) {
        alert('Lütfen normal günlük kalori ihtiyacınızı girin.');
        return;
    }

    const total = tdee + extra;

    document.getElementById('hc-lc-extra').innerText = '+' + extra.toLocaleString('tr-TR') + ' kcal';
    document.getElementById('hc-lc-total').innerText = Math.round(total).toLocaleString('tr-TR') + ' kcal';

    document.getElementById('hc-emzirme-result').classList.add('visible');
}
