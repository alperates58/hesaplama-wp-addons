function hcKokHesapla() {
    const x = parseFloat(document.getElementById('hc-root-val').value);
    const n = parseInt(document.getElementById('hc-root-deg').value);

    if (isNaN(x) || isNaN(n)) {
        alert('Lütfen geçerli bir sayı ve kök derecesi giriniz.');
        return;
    }

    if (n === 0) {
        alert('Kök derecesi 0 olamaz.');
        return;
    }

    if (x < 0 && n % 2 === 0) {
        alert('Negatif bir sayının çift dereceden kökü tanımsızdır.');
        return;
    }

    let result;
    if (x < 0) {
        result = -Math.pow(-x, 1 / n);
    } else {
        result = Math.pow(x, 1 / n);
    }

    document.getElementById('hc-res-root-val').innerText = result.toLocaleString('tr-TR', { 
        maximumFractionDigits: 6 
    });
    
    let nLabel = n === 2 ? 'Karekök' : (n === 3 ? 'Küp Kök' : `${n}. Dereceden Kök`);
    document.getElementById('hc-res-root-desc').innerText = nLabel;

    document.getElementById('hc-root-result').classList.add('visible');
    document.getElementById('hc-root-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
