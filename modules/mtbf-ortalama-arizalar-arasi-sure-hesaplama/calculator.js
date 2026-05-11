function hcMtbfHesapla() {
    const uptime = parseFloat(document.getElementById('hc-mtbf-uptime').value);
    const count = parseInt(document.getElementById('hc-mtbf-count').value);

    if (isNaN(uptime) || isNaN(count) || count <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const mtbf = uptime / count;

    document.getElementById('hc-mtbf-res-total').innerText = mtbf.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-mtbf-result').classList.add('visible');
}
