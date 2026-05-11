function hcReynoldsHesapla() {
    const rho = parseFloat(document.getElementById('hc-re-density').value);
    const v = parseFloat(document.getElementById('hc-re-velocity').value);
    const l = parseFloat(document.getElementById('hc-re-length').value);
    const mu = parseFloat(document.getElementById('hc-re-viscosity').value);

    if (isNaN(rho) || isNaN(v) || isNaN(l) || isNaN(mu) || mu <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const re = (rho * v * l) / mu;
    const resultDiv = document.getElementById('hc-re-result');
    const flowType = document.getElementById('hc-re-flow-type');

    document.getElementById('hc-re-res-total').innerText = re.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    if (re < 2300) {
        flowType.innerText = "Laminer Akış";
        flowType.style.color = "#2ecc71";
    } else if (re > 4000) {
        flowType.innerText = "Türbülanslı Akış";
        flowType.style.color = "#e74c3c";
    } else {
        flowType.innerText = "Geçiş Bölgesi";
        flowType.style.color = "#f39c12";
    }

    resultDiv.classList.add('visible');
}
