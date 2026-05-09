function hcVonMisesHesapla() {
    const s1 = parseFloat(document.getElementById('hc-vm-s1').value) || 0;
    const s2 = parseFloat(document.getElementById('hc-vm-s2').value) || 0;
    const s3 = parseFloat(document.getElementById('hc-vm-s3').value) || 0;

    const val = Math.sqrt((Math.pow(s1 - s2, 2) + Math.pow(s2 - s3, 2) + Math.pow(s3 - s1, 2)) / 2);

    document.getElementById('hc-res-vm-val').innerText = val.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' MPa';
    document.getElementById('hc-von-mises-result').classList.add('visible');
}
