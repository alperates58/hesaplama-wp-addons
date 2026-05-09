function hcBAMHesapla() {
    const n = parseInt(document.getElementById('hc-bam-n').value);
    const z = parseInt(document.getElementById('hc-bam-z').value);

    if (isNaN(n) || isNaN(z) || n < 1 || z < 1) {
        alert('Lütfen geçerli pozitif tam sayılar giriniz.');
        return;
    }

    const a0 = 0.529; // Ångström
    const e0 = -13.6; // eV

    const radius = a0 * (Math.pow(n, 2) / z);
    const energy = e0 * (Math.pow(z, 2) / Math.pow(n, 2));

    document.getElementById('hc-bam-radius').innerText = radius.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' Å';
    document.getElementById('hc-bam-energy').innerText = energy.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' eV';
    
    document.getElementById('hc-bam-result').classList.add('visible');
}
