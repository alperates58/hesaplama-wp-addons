function hcCPHesapla() {
    const ksp = parseFloat(document.getElementById('hc-cp-ksp').value);
    const cat = parseFloat(document.getElementById('hc-cp-cat').value);
    const ani = parseFloat(document.getElementById('hc-cp-ani').value);

    if (isNaN(ksp) || isNaN(cat) || isNaN(ani)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Qsp = [M+] * [X-] (Assuming 1:1 stoichiometry for simplicity)
    const qsp = cat * ani;

    document.getElementById('hc-cp-val').innerText = qsp.toExponential(4);
    
    const desc = document.getElementById('hc-cp-desc');
    if (qsp > ksp) {
        desc.innerText = "Çökelme gerçekleşir (Doymuş üstü).";
        desc.style.color = "#F44336";
    } else if (qsp < ksp) {
        desc.innerText = "Çökelme gerçekleşmez (Doymamış).";
        desc.style.color = "#4CAF50";
    } else {
        desc.innerText = "Çözelti tam doymuş haldedir (Dengede).";
        desc.style.color = "#FFC107";
    }

    document.getElementById('hc-cp-result').classList.add('visible');
}
