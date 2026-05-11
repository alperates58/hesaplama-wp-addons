function hcRhgHesapla() {
    const revenue = parseFloat(document.getElementById('hc-rhg-revenue').value);
    const spend = parseFloat(document.getElementById('hc-rhg-spend').value);

    if (isNaN(revenue) || isNaN(spend) || spend <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const roas = revenue / spend;
    const percent = roas * 100;

    document.getElementById('hc-rhg-value').innerText = roas.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + 'x';
    document.getElementById('hc-rhg-percent').innerText = '%' + percent.toLocaleString('tr-TR', { minimumFractionDigits: 0 });

    document.getElementById('hc-rhg-result').classList.add('visible');
}
