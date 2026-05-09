function hcShuntResHesapla() {
    const rg = parseFloat(document.getElementById('hc-sr-rg').value) || 1;
    const igMa = parseFloat(document.getElementById('hc-sr-ig').value) || 0.1;
    const i = parseFloat(document.getElementById('hc-sr-i').value) || 1;

    const ig = igMa / 1000;
    
    if (i <= ig) {
        alert('İstenen akım tam sapma akımından büyük olmalıdır.');
        return;
    }

    const rs = rg / ((i / ig) - 1);

    document.getElementById('hc-res-sr-val').innerText = rs.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' Ω';
    document.getElementById('hc-shunt-res-result').classList.add('visible');
}
