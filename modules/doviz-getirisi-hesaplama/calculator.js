function hcDovizGetiriHesapla() {
    const amount = parseFloat(document.getElementById('hc-cy-amount').value) || 0;
    const start = parseFloat(document.getElementById('hc-cy-start').value) || 0;
    const end = parseFloat(document.getElementById('hc-cy-end').value) || 0;

    if (start === 0) {
        alert('Alış kuru sıfır olamaz.');
        return;
    }

    const initialTL = amount * start;
    const currentTL = amount * end;
    const profit = currentTL - initialTL;
    const perc = (profit / initialTL) * 100;

    document.getElementById('hc-cy-res-profit').innerText = profit.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-cy-res-perc').innerText = '%' + perc.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    const percEl = document.getElementById('hc-cy-res-perc');
    percEl.style.color = profit >= 0 ? "#27ae60" : "#c0392b";

    document.getElementById('hc-curr-yield-result').classList.add('visible');
}
