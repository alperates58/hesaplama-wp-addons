function hcPrandtlHesapla() {
    const cp = parseFloat(document.getElementById('hc-pr-cp').value);
    const mu = parseFloat(document.getElementById('hc-pr-mu').value);
    const k = parseFloat(document.getElementById('hc-pr-k').value);

    if (isNaN(cp) || isNaN(mu) || isNaN(k) || k <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const pr = (cp * mu) / k;

    document.getElementById('hc-pr-res-total').innerText = pr.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-pr-result').classList.add('visible');
}
