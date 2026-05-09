function hcDataTransferHesapla() {
    const sizeGB = parseFloat(document.getElementById('hc-dt-size').value) || 0;
    const speedMbps = parseFloat(document.getElementById('hc-dt-speed').value) || 1;

    // 1 GB = 1024 MB = 8192 Mbit
    const sizeMbit = sizeGB * 8 * 1024;
    const seconds = sizeMbit / speedMbps;

    const h = Math.floor(seconds / 3600);
    const m = Math.floor((seconds % 3600) / 60);
    const s = Math.round(seconds % 60);

    let resText = '';
    if (h > 0) resText += h + ' saat ';
    if (m > 0 || h > 0) resText += m + ' dk ';
    resText += s + ' sn';

    document.getElementById('hc-res-dt-val').innerText = resText;
    document.getElementById('hc-data-transfer-result').classList.add('visible');
}
