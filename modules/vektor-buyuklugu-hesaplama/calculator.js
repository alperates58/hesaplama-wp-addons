function hcVecMagHesapla() {
    const x = parseFloat(document.getElementById('hc-vm-x').value) || 0;
    const y = parseFloat(document.getElementById('hc-vm-y').value) || 0;
    const z = parseFloat(document.getElementById('hc-vm-z').value) || 0;

    const mag = Math.sqrt(x*x + y*y + z*z);

    document.getElementById('hc-vm-res-val').innerText = mag.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-vektor-buyuklugu-result').classList.add('visible');
}
