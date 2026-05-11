function hcThermalEqHesapla() {
    const m1 = parseFloat(document.getElementById('hc-te-m1').value);
    const c1 = parseFloat(document.getElementById('hc-te-c1').value);
    const t1 = parseFloat(document.getElementById('hc-te-t1').value);
    
    const m2 = parseFloat(document.getElementById('hc-te-m2').value);
    const c2 = parseFloat(document.getElementById('hc-te-c2').value);
    const t2 = parseFloat(document.getElementById('hc-te-t2').value);

    if (isNaN(m1) || isNaN(c1) || isNaN(t1) || isNaN(m2) || isNaN(c2) || isNaN(t2)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Tson = (m1*c1*T1 + m2*c2*T2) / (m1*c1 + m2*c2)
    const tSon = (m1 * c1 * t1 + m2 * c2 * t2) / (m1 * c1 + m2 * c2);

    document.getElementById('hc-te-res-val').innerText = tSon.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' °C';
    
    document.getElementById('hc-te-result').classList.add('visible');
}
