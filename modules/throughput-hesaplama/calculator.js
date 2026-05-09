function hcThroughputHesapla() {
    const data = parseFloat(document.getElementById('hc-th-data').value) || 0;
    const time = parseFloat(document.getElementById('hc-th-time').value) || 1;

    const tp = data / time;

    document.getElementById('hc-res-th-val').innerText = tp.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Birim/sn';
    document.getElementById('hc-throughput-calc-result').classList.add('visible');
}
