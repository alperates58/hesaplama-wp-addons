function hcBBHHesapla() {
    const innerD = parseFloat(document.getElementById('hc-bbh-inner').value);
    const thick = parseFloat(document.getElementById('hc-bbh-thick').value);
    const length = parseFloat(document.getElementById('hc-bbh-length').value);

    if (isNaN(innerD) || isNaN(thick) || isNaN(length) || innerD <= 0 || thick <= 0 || length <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const r_inner = innerD / 200; // m
    const r_outer = (innerD + 2 * thick) / 200; // m
    
    const waterVolume = Math.PI * Math.pow(r_inner, 2) * length;
    const concreteVolume = (Math.PI * Math.pow(r_outer, 2) * length) - waterVolume;

    document.getElementById('hc-bbh-concrete').innerText = concreteVolume.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' m³';
    document.getElementById('hc-bbh-water').innerText = (waterVolume * 1000).toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' Litre';
    
    document.getElementById('hc-bbh-result').classList.add('visible');
}
