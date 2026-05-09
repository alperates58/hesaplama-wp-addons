function hcTitrasyonHesapla() {
    const ma = parseFloat(document.getElementById('hc-tr-as-m').value);
    const va = parseFloat(document.getElementById('hc-tr-as-v').value);
    const na = parseFloat(document.getElementById('hc-tr-as-n').value);
    const mb = parseFloat(document.getElementById('hc-tr-bz-m').value);
    const vb = parseFloat(document.getElementById('hc-tr-bz-v').value);
    const nb = parseFloat(document.getElementById('hc-tr-bz-n').value);

    let result = 0;
    let text = "";

    if (isNaN(ma) && !isNaN(va) && !isNaN(na) && !isNaN(mb) && !isNaN(vb) && !isNaN(nb)) {
        // Ma = (Mb * Vb * nb) / (Va * na)
        result = (mb * vb * nb) / (va * na);
        text = "Asit Derişimi (Ma): " + result.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + " M";
    } else if (!isNaN(ma) && !isNaN(va) && !isNaN(na) && isNaN(mb) && !isNaN(vb) && !isNaN(nb)) {
        // Mb = (Ma * Va * na) / (Vb * nb)
        result = (ma * va * na) / (vb * nb);
        text = "Baz Derişimi (Mb): " + result.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + " M";
    } else {
        alert('Lütfen bilinmeyen tek bir derişim alanını boş bırakın ve diğerlerini doldurun.');
        return;
    }

    document.getElementById('hc-tr-val').innerText = text;
    document.getElementById('hc-tr-result').classList.add('visible');
}
