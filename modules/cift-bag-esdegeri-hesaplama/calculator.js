function hcDBEHesapla() {
    const c = parseInt(document.getElementById('hc-db-c').value) || 0;
    const h = parseInt(document.getElementById('hc-db-h').value) || 0;
    const n = parseInt(document.getElementById('hc-db-n').value) || 0;
    const x = parseInt(document.getElementById('hc-db-x').value) || 0;

    // DBE = C + 1 - H/2 - X/2 + N/2
    const dbe = c + 1 - (h / 2) - (x / 2) + (n / 2);

    document.getElementById('hc-db-val').innerText = dbe.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-db-result').classList.add('visible');
}
