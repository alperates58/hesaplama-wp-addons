function hcDisTicaretDengesiHesapla() {
    const exports = parseFloat(document.getElementById('hc-dtd-export').value) || 0;
    const imports = parseFloat(document.getElementById('hc-dtd-import').value) || 0;

    const balance = exports - imports;
    const ratio = imports !== 0 ? (exports / imports) * 100 : 0;
    const volume = exports + imports;

    const balanceElem = document.getElementById('hc-dtd-balance');
    balanceElem.innerText = balance.toLocaleString('tr-TR') + ' $';
    balanceElem.style.color = balance >= 0 ? 'green' : 'red';

    document.getElementById('hc-dtd-ratio').innerText = '%' + ratio.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('hc-dtd-volume').innerText = volume.toLocaleString('tr-TR') + ' $';

    document.getElementById('hc-dtd-result').classList.add('visible');
}
