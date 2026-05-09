function hcHYHesapla() {
    const solute = parseFloat(document.getElementById('hc-hy-solute').value);
    const total = parseFloat(document.getElementById('hc-hy-total').value);

    if (isNaN(solute) || isNaN(total)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    if (total === 0) {
        alert('Toplam hacim 0 olamaz.');
        return;
    }

    const perc = (solute / total) * 100;

    document.getElementById('hc-hy-val').innerText = '%' + perc.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-hy-result').classList.add('visible');
}
