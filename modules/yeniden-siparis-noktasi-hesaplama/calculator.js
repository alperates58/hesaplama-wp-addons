function hcReorderPointHesapla() {
    const lead = parseInt(document.getElementById('hc-rop-lead').value) || 1;
    const usage = parseInt(document.getElementById('hc-rop-usage').value) || 1;
    const safety = parseInt(document.getElementById('hc-rop-safety').value) || 0;

    const rop = (lead * usage) + safety;

    document.getElementById('hc-res-rop-val').innerText = rop.toLocaleString('tr-TR') + ' Adet';
    document.getElementById('hc-reorder-point-result').classList.add('visible');
}
