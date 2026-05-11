function hcCatActivityHesapla() {
    const prod = parseFloat(document.getElementById('hc-ca-prod').value);
    const cat = parseFloat(document.getElementById('hc-ca-cat').value);
    const time = parseFloat(document.getElementById('hc-ca-time').value);

    if (isNaN(prod) || isNaN(cat) || isNaN(time) || cat <= 0 || time <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // TOF = prod / (cat * time)
    const tof = prod / (cat * time);

    document.getElementById('hc-ca-res-val').innerText = tof.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' h⁻¹';
    
    document.getElementById('hc-ca-result').classList.add('visible');
}
